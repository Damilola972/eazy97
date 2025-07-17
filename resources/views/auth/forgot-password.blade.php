@extends('layouts.app')

@section('content')

{{-- Inline autofill + input text visibility fix --}}
<style>
    input,
    input:-webkit-autofill,
    input:-webkit-autofill:hover, 
    input:-webkit-autofill:focus,
    input:-webkit-autofill:active {
        -webkit-text-fill-color: #ffffff !important; /* Tailwind text-white */
        transition: background-color 9999s ease-in-out 0s;
        box-shadow: 0 0 0px 1000px #374151 inset !important; /* Tailwind's bg-gray-700 */
        background-color: #374151 !important;
        color: #ffffff !important;
        caret-color: #ffffff !important;
    }
</style>

<div class="min-h-screen flex items-center justify-center bg-gray-900">
    <div class="w-full max-w-md bg-gray-800 rounded-lg p-8 shadow-lg">
        <h2 class="text-2xl text-white font-bold mb-6 text-center">Forgot your password?</h2>

        @if (session('status'))
            <div class="mb-4 text-green-400 text-sm">
                {{ session('status') }}
            </div>
        @endif

        <form method="POST" action="{{ route('password.email') }}">
            @csrf

            <div class="mb-4">
                <label for="email" class="block text-sm font-medium text-gray-300">Email Address</label>
                <input id="email" type="email" name="email" required autofocus autocomplete="email"
                    class="mt-1 block w-full bg-gray-700 text-white border border-gray-600 rounded-md p-2 focus:ring-indigo-500 focus:border-indigo-500">
                @error('email')
                    <p class="text-red-400 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="flex justify-end">
                <button type="submit"
                    class="bg-indigo-600 hover:bg-indigo-700 text-white px-4 py-2 rounded-md transition">
                    Send Reset Link
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
