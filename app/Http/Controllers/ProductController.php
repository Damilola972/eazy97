<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Product;
use App\Models\CartItem;

class ProductController extends Controller
{
    /**
     * Show the product upload form
     */
    public function create()
    {
        return view('admin.products.create');
    }

    /**
     * Handle product upload
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0',
            'image' => 'required|image|mimes:jpg,jpeg,png,gif|max:2048',
        ]);

        // Save image to storage
        $path = $request->file('image')->store('products', 'public');

        // Create product record
        Product::create([
            'name' => $validated['name'],
            'description' => $validated['description'] ?? '',
            'price' => $validated['price'],
            'stock' => $validated['stock'],
            'image' => $path,
        ]);

        return redirect()->route('admin.products.create')->with('success', 'Product uploaded successfully!');
    }

    public function browse()
{
    $products = \App\Models\Product::all();
    return view('products.browse', compact('products'));
}
    /**
     * Add product to cart (persistent, database version)
     */
    public function addToCart(Request $request, $id)
    {
        $user = Auth::user();

        $cartItem = CartItem::where('user_id', $user->id)
                            ->where('product_id', $id)
                            ->first();

        if ($cartItem) {
            $cartItem->quantity += 1;
            $cartItem->save();
        } else {
            CartItem::create([
                'user_id' => $user->id,
                'product_id' => $id,
                'quantity' => 1,
            ]);
        }

        return back()->with('status', 'Product added to cart!');
    }
}