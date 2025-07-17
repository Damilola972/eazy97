@extends('layouts.app')

@section('title', 'Browse Products')

@section('content')
<div class="min-h-screen bg-gray-50 dark:bg-gray-900 p-6">
    <h1 class="text-3xl font-bold text-center text-indigo-600 mb-8">🛍 Browse Products</h1>

    <!-- Search bar -->
    <div class="max-w-md mx-auto mb-8">
        <input type="text" id="searchInput" placeholder="Search by product name..."
               class="w-full px-4 py-2 border rounded-lg shadow-sm dark:bg-gray-800 dark:text-white" />
    </div>

    <!-- Product Grid -->
    <div class="grid gap-6 grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4">
        @foreach ($products as $product)
        <div class="bg-white dark:bg-gray-800 rounded-xl shadow-sm hover:shadow-md transition overflow-hidden">
            <div class="p-4 flex flex-col items-center">
                @if ($product->image)
                    <img src="{{ asset('storage/' . $product->image) }}"
                         alt="{{ $product->name }}"
                         class="w-24 h-24 sm:w-20 sm:h-20 md:w-16 md:h-16 lg:w-14 lg:h-14 object-cover rounded-lg mb-3 border dark:border-gray-700">
                @else
                    <div class="w-24 h-24 sm:w-20 sm:h-20 md:w-16 md:h-16 lg:w-14 lg:h-14 flex items-center justify-center bg-gray-200 text-gray-600 rounded-lg mb-3 text-sm border dark:bg-gray-700 dark:text-white dark:border-gray-600">
                        No Image
                    </div>
                @endif

                <h2 class="text-sm md:text-base font-semibold text-indigo-600 text-center">{{ $product->name }}</h2>
                <p class="text-xs md:text-sm text-gray-500 dark:text-gray-300 text-center">{{ Str::limit($product->description, 50) }}</p>
                <p class="text-sm font-bold text-center">₦{{ number_format($product->price) }}</p>

                <span class="mt-2 inline-block px-3 py-1 text-xs font-semibold {{ $product->stock > 0 ? 'bg-green-100 text-green-700' : 'bg-red-100 text-red-700' }} rounded-full">
                    {{ $product->stock > 0 ? 'In Stock' : 'Out of Stock' }}
                </span>

                <a href="{{ route('checkout.show', $product->id) }}"
                   class="mt-3 inline-block w-full text-center bg-indigo-600 hover:bg-indigo-700 text-white py-2 rounded-md text-xs md:text-sm transition">
                    Checkout
                </a>
            </div>
        </div>
        @endforeach
    </div>
</div>

<script>
    const searchInput = document.getElementById("searchInput");
    searchInput.addEventListener("input", function () {
        const filter = this.value.toLowerCase();
        const cards = document.querySelectorAll(".grid > div");

        cards.forEach(card => {
            const name = card.querySelector("h2").textContent.toLowerCase();
            card.style.display = name.includes(filter) ? "block" : "none";
        });
    });
</script>
@endsection