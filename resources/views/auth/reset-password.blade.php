@extends('layouts.app')

@section('content')

{{-- Autofill visibility fix styling --}}
<style>
    input,
    input:-webkit-autofill,
    input:-webkit-autofill:hover, 
    input:-webkit-autofill:focus,
    input:-webkit-autofill:active {
        -webkit-text-fill-color: #ffffff !important;
        transition: background-color 9999s ease-in-out 0s;
        box-shadow: 0 0 0px 1000px #374151 inset !important;
        background-color: #374151 !important;
        color: #ffffff !important;
        caret-color: #ffffff !important;
    }
</style>

<div class="min-h-screen flex items-center justify-center bg-gray-900">
    <div class="w-full max-w-md bg-gray-800 rounded-lg p-8 shadow-lg">
        <h2 class="text-2xl text-white font-bold mb-6 text-center">Reset Password</h2>

        <form method="POST" action="{{ route('password.store') }}">
            @csrf
       
            <!-- ✅ Secure token from URL -->
            <input type="hidden" name="token" value="{{ request()->route('token') }}">
            <!-- ✅ Email fallback -->
            <input type="hidden" name="email" value="{{ request()->email }}">

            <div class="mb-4">
                <label for="password" class="block text-sm font-medium text-gray-300">New Password</label>
                <input id="password" type="password" name="password" required
                    class="mt-1 block w-full bg-gray-700 text-white border border-gray-600 rounded-md p-2 focus:ring-indigo-500 focus:border-indigo-500">
                @error('password')
                    <p class="text-red-400 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-6">
                <label for="password_confirmation" class="block text-sm font-medium text-gray-300">Confirm Password</label>
                <input id="password_confirmation" type="password" name="password_confirmation" required
                    class="mt-1 block w-full bg-gray-700 text-white border border-gray-600 rounded-md p-2 focus:ring-indigo-500 focus:border-indigo-500">
            </div>

            <div class="flex justify-end">
                <button type="submit"
                    class="bg-indigo-600 hover:bg-indigo-700 text-white px-4 py-2 rounded-md transition">
                    Reset Password
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
