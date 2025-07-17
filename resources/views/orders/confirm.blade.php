@extends('layouts.app')

@section('title', 'Your Orders')

@section('content')
<div class="min-h-screen bg-gradient-to-br from-indigo-100 to-white dark:from-gray-900 dark:to-gray-800 p-6">
    <div class="max-w-4xl mx-auto">
        <h1 class="text-3xl font-bold text-center text-indigo-700 dark:text-indigo-400 mb-8">📦 Your Orders</h1>

        @if($orders->count())
            <div class="grid gap-6">
                @foreach($orders as $order)
                    @php
                        $item = json_decode($order->items, true)[0];
                    @endphp

                    <div class="bg-white dark:bg-gray-900 rounded-2xl shadow-md p-6 space-y-4">
                        <div class="flex justify-between items-center">
                            <h2 class="text-xl font-semibold text-indigo-700 dark:text-indigo-400">
                                {{ $item['name'] }}
                            </h2>
                            <span class="px-3 py-1 text-sm font-semibold rounded-full
                                {{ $order->status === 'delivered' ? 'bg-green-100 text-green-700' : 'bg-yellow-100 text-yellow-700' }}">
                                {{ ucfirst($order->status) }}
                            </span>
                        </div>

                        <div class="text-sm text-gray-600 dark:text-gray-300 space-y-1">
                            <p><span class="font-medium">Quantity:</span> {{ $item['quantity'] }}</p>
                            <p><span class="font-medium">Price:</span> ₦{{ number_format($item['price']) }}</p>
                            <p><span class="font-medium">Total:</span> ₦{{ number_format($order->total) }} ({{ $order->currency }})</p>
                            <p><span class="font-medium">Tracking ID:</span> {{ $order->tracking_id }}</p>
                            <p><span class="font-medium">Date:</span> {{ $order->created_at->format('F j, Y h:i A') }}</p>
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <div class="text-center text-gray-600 dark:text-gray-300">
                <p>You have not placed any orders yet.</p>
            </div>
        @endif
    </div>
</div>
@endsection