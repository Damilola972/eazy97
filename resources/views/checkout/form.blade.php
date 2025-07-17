@extends('layouts.app')

@section('title', 'Checkout')

@section('content')
<div class="min-h-screen bg-gradient-to-br from-indigo-100 to-white dark:from-gray-900 dark:to-gray-800 text-gray-800 dark:text-gray-100 p-6">
    <div class="max-w-xl mx-auto bg-white dark:bg-gray-900 shadow-lg rounded-2xl p-8">
        <h1 class="text-3xl font-bold mb-6 text-indigo-600 text-center">🧾 Checkout</h1>

        <form id="checkout-form" method="POST" action="{{ route('checkout.process') }}" class="space-y-5">
            @csrf

            <input type="hidden" name="product_id" value="{{ $product->id }}">

            <div>
                <label class="font-semibold">Product</label>
                <input type="text" value="{{ $product->name }}" class="w-full bg-gray-100 dark:bg-gray-800 rounded-lg px-4 py-2 mt-1" disabled>
            </div>

            <div>
                <label class="font-semibold">Quantity</label>
                <input type="number" name="quantity" id="quantity" value="1" min="1" max="{{ $product->stock }}" class="w-full px-4 py-2 rounded-lg border dark:bg-gray-800 mt-1">
                <small class="text-gray-500">Available: {{ $product->stock }}</small>
            </div>

            <div>
                <label class="font-semibold">Price (₦)</label>
                <input type="text" id="price" value="{{ $product->price }}" class="w-full bg-gray-100 dark:bg-gray-800 rounded-lg px-4 py-2 mt-1" disabled>
            </div>

            <div>
                <label class="font-semibold">Currency</label>
                <select name="currency" id="currency" class="w-full px-4 py-2 rounded-lg border dark:bg-gray-800 mt-1">
                    <option value="NGN">NGN (₦)</option>
                    <option value="USD">USD ($)</option>
                    <option value="EUR">EUR (€)</option>
                </select>
            </div>

            <div>
                <label class="font-semibold">Total</label>
                <input type="text" id="total" class="w-full bg-gray-100 dark:bg-gray-800 rounded-lg px-4 py-2 mt-1" disabled>
            </div>

            <div>
                <label class="font-semibold">Full Name</label>
                <input type="text" name="full_name" class="w-full px-4 py-2 rounded-lg border dark:bg-gray-800 mt-1" required>
            </div>

            <div>
                <label class="font-semibold">Email</label>
                <input type="email" name="email" id="email" class="w-full px-4 py-2 rounded-lg border dark:bg-gray-800 mt-1" required>
            </div>

            <div>
                <label class="font-semibold">Phone</label>
                <input type="text" name="phone" class="w-full px-4 py-2 rounded-lg border dark:bg-gray-800 mt-1" required>
            </div>

            <div>
                <label class="font-semibold">Address</label>
                <textarea name="address" class="w-full px-4 py-2 rounded-lg border dark:bg-gray-800 mt-1" rows="3" required></textarea>
            </div>

            <button type="button" id="pay-btn" class="w-full bg-indigo-600 hover:bg-indigo-700 text-white font-semibold py-3 px-4 rounded-lg shadow-md">
                Proceed to Pay
            </button>
        </form>
    </div>
</div>

<!-- Paystack Script -->
<script src="https://js.paystack.co/v1/inline.js"></script>

<script>
    const quantityInput = document.getElementById('quantity');
    const price = {{ $product->price }};
    const totalInput = document.getElementById('total');
    const currencySelect = document.getElementById('currency');

    function updateTotal() {
        const qty = Math.max(1, parseInt(quantityInput.value) || 1);
        const currency = currencySelect.value;
        let rate = 1;

        if (currency === 'USD') rate = 0.0012;
        if (currency === 'EUR') rate = 0.0011;

        const total = qty * price * rate;
        totalInput.value = currency + ' ' + total.toFixed(2);
    }

    quantityInput.addEventListener('input', updateTotal);
    currencySelect.addEventListener('change', updateTotal);
    window.addEventListener('DOMContentLoaded', updateTotal);

    document.getElementById('pay-btn').addEventListener('click', function () {
        const email = document.getElementById('email').value;
        const currency = currencySelect.value;
        const quantity = Math.max(1, parseInt(quantityInput.value) || 1);
        let amount = price * quantity;

        if (currency === 'USD') amount *= 0.0012;
        if (currency === 'EUR') amount *= 0.0011;

        const handler = PaystackPop.setup({
          key: "{{ $paystackKey }}",
            email: email,
            amount: Math.round(amount * 100), // convert to kobo
            currency: currency,
            channels: ['card'],
            callback: function (response) {
                const form = document.getElementById('checkout-form');
                const refInput = document.createElement('input');
                refInput.type = 'hidden';
                refInput.name = 'reference';
                refInput.value = response.reference;
                form.appendChild(refInput);
                form.submit();
            },
          onClose: function () {
    const form = document.getElementById('checkout-form');

    // Fake reference to identify it as user-cancelled
    const refInput = document.createElement('input');
    refInput.type = 'hidden';
    refInput.name = 'reference';
    refInput.value = 'cancelled_' + Date.now(); // unique fallback ref
    form.appendChild(refInput);

    // Add an extra flag to detect in controller
    const statusInput = document.createElement('input');
    statusInput.type = 'hidden';
    statusInput.name = 'payment_status';
    statusInput.value = 'failed';
    form.appendChild(statusInput);

    form.submit(); // Now it will go to the controller
}
        });

        handler.openIframe();
    });
</script>
@endsection