@extends('layouts.app')

@section('title', 'Login')

@section('content')
<div class="flex items-center justify-center min-h-screen bg-gray-100 dark:bg-gray-900 px-4">
    <div class="w-full max-w-md p-8 bg-white rounded-xl shadow-lg dark:bg-gray-800 transition-all duration-300">
        <h2 class="mb-6 text-2xl font-bold text-center text-gray-800 dark:text-white">
            Welcome Back 👋
        </h2>

        @if (session('status'))
            <div class="p-3 mb-4 text-sm text-green-700 bg-green-100 rounded dark:bg-green-900 dark:text-green-300">
                {{ session('status') }}
            </div>
        @endif

        <form method="POST" action="{{ route('login') }}" class="space-y-6">
            @csrf

            {{-- Email --}}
            <div class="relative">
                  <i class="fa-solid fa-envelope absolute w-5 h-5 top-3.5 left-3 text-indigo-500 dark:text-indigo-400"></i>

                <input type="email" name="email" id="email" value="{{ old('email') }}" required placeholder=" "
                    class="peer w-full px-4 py-3 pl-10 pt-5 text-sm font-medium text-gray-800 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 dark:bg-gray-700 dark:text-white dark:border-gray-600" />
                <label for="email"
                    class="absolute left-10 top-1 text-gray-500 dark:text-gray-400 transition-all 
                    text-sm peer-placeholder-shown:top-3.5 peer-placeholder-shown:text-base 
                    peer-focus:top-1 peer-focus:text-xs peer-focus:text-indigo-600">
                    Email Address
                </label>
                @error('email')
                    <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                @enderror
            </div>

            {{-- Password --}}
            <div class="relative">
                  <i class="fa-solid fa-lock absolute w-5 h-5 top-3.5 left-3 text-indigo-500 dark:text-indigo-400"></i>

                <input type="password" name="password" id="password" required placeholder=" "
                    class="peer w-full px-4 py-3 pl-10 pt-5 text-sm font-medium text-gray-800 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 dark:bg-gray-700 dark:text-white dark:border-gray-600" />
                <label for="password"
                    class="absolute left-10 top-1 text-gray-500 dark:text-gray-400 transition-all 
                    text-sm peer-placeholder-shown:top-3.5 peer-placeholder-shown:text-base 
                    peer-focus:top-1 peer-focus:text-xs peer-focus:text-indigo-600">
                    Password
                </label>
                @error('password')
                    <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                @enderror
            </div>

            {{-- Remember + Forgot --}}
            <div class="flex items-center justify-between">
                <label for="remember_me" class="inline-flex items-center">
                    <input id="remember_me" type="checkbox" name="remember"
                        class="w-4 h-4 text-indigo-600 border-gray-300 rounded dark:bg-gray-800 dark:border-gray-600 focus:ring-indigo-500">
                    <span class="ml-2 text-sm text-gray-600 dark:text-gray-400">Remember me</span>
                </label>
                @if (Route::has('password.request'))
                    <a href="{{ route('password.request') }}"
                        class="text-sm text-indigo-600 hover:underline dark:text-indigo-400">
                        Forgot password?
                    </a>
                @endif
            </div>

            {{-- Submit --}}
            <button type="submit"
                class="w-full px-4 py-2 font-semibold text-white bg-indigo-600 rounded hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-400 transition">
                Log in
            </button>

            {{-- Register link --}}
            <div class="mt-4 text-sm text-center text-gray-600 dark:text-gray-400">
                New here?
                <a href="{{ route('register') }}" class="text-indigo-600 hover:underline dark:text-indigo-400">
                    Create an account
                </a>
            </div>
        </form>
    </div>
</div>
@endsection 