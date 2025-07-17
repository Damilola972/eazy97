@extends('layouts.app')

@section('title', 'Order Success')

@section('content')
<div class="min-h-screen flex items-center justify-center bg-green-50 dark:bg-gray-900 text-gray-800 dark:text-gray-100 p-6">
    <div class="bg-white dark:bg-gray-800 shadow-md rounded-xl p-6 text-center max-w-md w-full">
        <h2 class="text-2xl font-bold text-green-600 mb-4">✅ Order Successful</h2>
        <p class="mb-4">Thank you for your purchase! A confirmation email with your tracking ID has been sent.</p>
        <a href="{{ route('dashboard') }}" class="inline-block mt-4 px-5 py-2 bg-indigo-600 text-white rounded-lg hover:bg-indigo-700 transition">
            Back to Shop
        </a>
    </div>
</div>
@endsection