@extends('layouts.app')

@section('title', 'My Cart')

@section('content')
<div class="min-h-screen bg-gray-100 dark:bg-gray-900 p-6">
    <div class="max-w-4xl mx-auto bg-white dark:bg-gray-800 p-6 rounded-xl shadow-md">
        <h1 class="text-3xl font-bold mb-6 text-indigo-600">🛒 My Cart</h1>

        @if(session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif

        @if($cartItems->count())
            <table class="w-full text-left">
                <thead class="bg-gray-200 dark:bg-gray-700 text-gray-700 dark:text-gray-200">
                    <tr>
                        <th class="p-2">Product</th>
                        <th class="p-2">Quantity</th>
                        <th class="p-2">Price</th>
                        <th class="p-2">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($cartItems as $item)
                    <tr class="border-b dark:border-gray-600">
                        <td class="p-2">{{ $item->product->name ?? 'N/A' }}</td>
                        <td class="p-2">{{ $item->quantity }}</td>
                        <td class="p-2">₦{{ number_format($item->product->price * $item->quantity) }}</td>
                        <td class="p-2">
                            <form method="POST" action="{{ route('cart.destroy', $item->id) }}">
                                @csrf
                                @method('DELETE')
                                <button class="bg-red-500 hover:bg-red-600 text-white px-3 py-1 rounded">Remove</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

            <form method="POST" action="{{ route('cart.reset') }}" class="mt-6">
                @csrf
                @method('DELETE')
                <button class="bg-indigo-600 hover:bg-indigo-700 text-white font-semibold py-2 px-4 rounded-lg">
                    🧹 Reset Cart
                </button>
            </form>
        @else
            <p class="text-gray-600 dark:text-gray-400">Your cart is empty.</p>
        @endif
    </div>
</div>
@endsection 