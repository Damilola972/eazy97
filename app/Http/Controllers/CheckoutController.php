<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Log;
use App\Models\Product;
use App\Models\Order;
use App\Mail\OrderSuccess;
use App\Mail\OrderFailed;

class CheckoutController extends Controller
{
    // Show the checkout form for a single product
    public function show(Product $product)
    {
        $paystackKey = config('services.paystack.public_key');

        return view('checkout.form', compact('product', 'paystackKey'));
    }

    // Process the form submission
    public function process(Request $request)
    {
        $validated = $request->validate([
            'product_id' => 'required|exists:products,id',
            'quantity'   => 'required|integer|min:1',
            'currency'   => 'required|string',
            'full_name'  => 'required|string|max:255',
            'email'      => 'required|email',
            'phone'      => 'required|string',
            'address'    => 'required|string',
            'reference'  => 'required|string', // Needed for Paystack verification
        ]);

        $product = Product::find($validated['product_id']);

        // Check available stock
        if ($product->stock < $validated['quantity']) {
            return back()->withErrors(['stock' => 'Only ' . $product->stock . ' items left in stock.']);
        }

        $amountNaira = $product->price * $validated['quantity'];

        // ✅ Detect if payment was cancelled via modal
        if ($request->input('payment_status') === 'failed') {
            Mail::to($validated['email'])->send(new OrderFailed([
                'product' => $product,
                'reason' => 'Payment was cancelled by the user.',
            ]));

            return back()->withErrors(['payment' => 'You cancelled the payment.']);
        }

        // ✅ Proceed to verify Paystack payment
        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . env('PAYSTACK_SECRET_KEY'),
        ])->get('https://api.paystack.co/transaction/verify/' . $validated['reference']);

        $paymentData = $response->json();

        \Log::info('PAYSTACK DEBUG', $paymentData);

        if (
            isset($paymentData['status'], $paymentData['data']['status']) &&
            $paymentData['status'] === true &&
            $paymentData['data']['status'] === 'success'
        ) {
            // ✅ Payment is successful
            $trackingId = strtoupper(Str::random(10));

            $order = Order::create([
                'user_id'     => Auth::check() ? Auth::id() : null,
                'fullname'    => $validated['full_name'],
                'email'       => $validated['email'],
                'phone'       => $validated['phone'],
                'address'     => $validated['address'],
                'items'       => json_encode([[
                    'product_id' => $product->id,
                    'name'       => $product->name,
                    'quantity'   => $validated['quantity'],
                    'price'      => $product->price,
                ]]),
                'total'       => $amountNaira,
                'currency'    => $validated['currency'],
                'tracking_id' => $trackingId,
                'status'      => 'pending',
            ]);

            // Deduct stock only after successful payment
            $product->stock -= $validated['quantity'];
            $product->save();

            Mail::to($validated['email'])->send(new OrderSuccess($order));

            return redirect()->route('checkout.success');
        } else {
            // ❌ Paystack verification failed
            Mail::to($validated['email'])->send(new OrderFailed([
                'product' => $product,
                'reason' => 'Payment verification failed or was declined.',
            ]));

            return back()->withErrors(['payment' => 'Payment verification failed. Please try again.']);
        }
    }
}