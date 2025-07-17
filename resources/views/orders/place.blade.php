@extends('layouts.app')

@section('title', 'Place Order')

@section('content')
<div class="min-h-screen bg-white dark:bg-gray-900 text-gray-800 dark:text-gray-100 p-4">
    <h1 class="text-xl font-bold mb-6">🛍 Review Your Cart</h1>

    @if ($cartItems->isEmpty())
        <div class="text-center text-gray-500 dark:text-gray-400 mt-10">
            Your cart is empty.
        </div>
    @else
        <div class="grid gap-4 md:grid-cols-2 lg:grid-cols-3">
            @foreach ($cartItems as $item)
                @php
                    $product = $item->product;
                    $quantity = $item->quantity;
                    $subtotal = $quantity * $product->price;
                @endphp

                <div class="bg-white dark:bg-gray-800 rounded-xl shadow-md p-3 flex flex-col justify-between w-full max-w-[350px] mx-auto">
                    <div class="flex items-start gap-3">
                        <img src="{{ asset('storage/' . $product->image) }}"
                             alt="{{ $product->name }}"
                             class="w-20 h-20 object-cover rounded-lg" />
                        <div class="flex-1 text-sm">
                            <h2 class="text-md font-semibold text-indigo-600 truncate">{{ $product->name }}</h2>
                            <p class="text-xs text-gray-500 dark:text-gray-400 line-clamp-2">{{ $product->description }}</p>
                            <span class="inline-block bg-indigo-100 dark:bg-indigo-700 text-indigo-600 dark:text-indigo-200 text-[11px] font-semibold px-2 py-0.5 rounded-full mt-1">
                                {{ $product->stock }} Available
                            </span>
                            <div class="mt-1 space-y-1 text-sm">
                                <p>Price: ₦{{ number_format($product->price, 2) }}</p>
                                <div class="flex items-center gap-3">
                                    <span class="text-gray-500 font-bold text-sm">Qty:</span>
                                    <div class="flex items-center gap-2">
                                        <button type="button"
                                                class="bg-gray-300 dark:bg-gray-700 px-3 py-1 rounded font-bold text-lg decrement-btn"
                                                data-product="{{ $product->id }}">−</button>
                                        <span class="font-semibold text-base quantity-text" id="qty-{{ $product->id }}">{{ $quantity }}</span>
                                        <input type="hidden" value="{{ $quantity }}" id="input-qty-{{ $product->id }}">
                                        <button type="button"
                                                class="bg-gray-300 dark:bg-gray-700 px-3 py-1 rounded font-bold text-lg increment-btn"
                                                data-product="{{ $product->id }}">+</button>
                                    </div>
                                </div>
                                <p class="font-semibold text-indigo-500">Subtotal: ₦{{ number_format($subtotal, 2) }}</p>
                            </div>
                        </div>
                    </div>

                    <!-- ✅ Updated Checkout Button (Links to /checkout/{product}?quantity={qty}) -->
                    <div class="mt-4 text-right">
                        <a href="{{ route('checkout.show', ['product' => $product->id]) }}?quantity={{ $quantity }}"
                           class="text-xs px-4 py-1 bg-indigo-600 hover:bg-indigo-700 text-white rounded-md transition inline-block">
                            Checkout
                        </a>
                    </div>
                </div>
            @endforeach
        </div>
    @endif
</div>

{{-- Simple JS for Quantity Control --}}
<script>
    document.addEventListener("DOMContentLoaded", function () {
        // Increment buttons
        document.querySelectorAll('.increment-btn').forEach(btn => {
            btn.addEventListener('click', function () {
                let productId = this.dataset.product;
                let qtySpan = document.getElementById('qty-' + productId);
                let input = document.getElementById('input-qty-' + productId);
                let currentQty = parseInt(qtySpan.textContent);
                currentQty++;
                qtySpan.textContent = currentQty;
                input.value = currentQty;
            });
        });

        // Decrement buttons
        document.querySelectorAll('.decrement-btn').forEach(btn => {
            btn.addEventListener('click', function () {
                let productId = this.dataset.product;
                let qtySpan = document.getElementById('qty-' + productId);
                let input = document.getElementById('input-qty-' + productId);
                let currentQty = parseInt(qtySpan.textContent);
                if (currentQty > 1) {
                    currentQty--;
                    qtySpan.textContent = currentQty;
                    input.value = currentQty;
                }
            });
        });
    });
</script>
@endsection