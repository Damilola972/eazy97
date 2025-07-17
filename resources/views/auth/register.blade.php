@extends('layouts.app')

@section('title', 'Register')

@section('content')
<div class="min-h-screen flex items-center justify-center bg-gradient-to-br from-indigo-50 via-white to-indigo-100 dark:from-gray-900 dark:via-gray-800 dark:to-black text-gray-900 dark:text-gray-100 transition-all duration-500 ease-in-out">

  <!-- Dark mode toggle -->
  <div class="absolute top-5 right-5">
    <button onclick="document.documentElement.classList.toggle('dark')" class="bg-gray-200 dark:bg-gray-700 p-2 rounded-full transition shadow hover:scale-105">
      <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-gray-800 dark:text-yellow-400" viewBox="0 0 20 20" fill="currentColor">
        <path d="M10 2a1 1 0 011 1v1a1 1 0 01-2 0V3a1 1 0 011-1z" />
      </svg>
    </button>
  </div>

  <div class="w-full max-w-md bg-white dark:bg-gray-900 shadow-xl rounded-2xl p-8 border border-indigo-100 dark:border-gray-700">
    
    <!-- Stylish EasyStore Header -->
    <div class="flex items-center justify-center mb-6">
      <div class="flex items-center space-x-3 text-indigo-700 dark:text-indigo-400">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-indigo-500 dark:text-indigo-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8" />
        </svg>
        <span class="text-2xl font-bold tracking-tight">EasyStore</span>
      </div>
    </div>

    <h2 class="text-xl font-semibold text-center text-gray-800 dark:text-gray-200 mb-4">Create Your Account</h2>

    @if ($errors->any())
      <div class="bg-red-100 text-red-700 p-4 rounded mb-4 text-sm">
        <ul class="list-disc list-inside">
          @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
          @endforeach
        </ul>
      </div>
    @endif

    <form method="POST" action="{{ route('register') }}" class="space-y-6">
      @csrf

      @php
        $iconClass = 'absolute left-3 top-5 text-indigo-400 peer-focus:top-1 transition-all duration-200 ease-in-out';
        $inputClass = 'peer w-full bg-transparent border-b-2 border-gray-300 dark:border-gray-600 focus:outline-none focus:border-indigo-600 dark:focus:border-indigo-400 pt-6 pb-2 pl-10 placeholder-transparent text-base';
        $labelClass = 'absolute left-10 top-1 text-gray-500 dark:text-gray-400 text-sm transition-all duration-200 ease-in-out peer-placeholder-shown:top-5 peer-placeholder-shown:text-base peer-placeholder-shown:text-gray-400 peer-focus:top-1 peer-focus:text-sm peer-focus:text-indigo-600 dark:peer-focus:text-indigo-400';
      @endphp

      <!-- Name -->
      <div class="relative group mt-4">
        <input type="text" name="name" id="name" required class="{{ $inputClass }}" placeholder="Full Name" value="{{ old('name') }}" />
        <label for="name" class="{{ $labelClass }}">Full Name</label>
        <div class="{{ $iconClass }}">
          <i class="fas fa-user text-sm"></i>
        </div>
      </div>

      <!-- Email -->
      <div class="relative group mt-4">
        <input type="email" name="email" id="email" required class="{{ $inputClass }}" placeholder="Email Address" value="{{ old('email') }}" />
        <label for="email" class="{{ $labelClass }}">Email Address</label>
        <div class="{{ $iconClass }}">
          <i class="fas fa-envelope text-sm"></i>
        </div>
      </div>

      <!-- Password -->
      <div class="relative group mt-4">
        <input type="password" name="password" id="password" required class="{{ $inputClass }}" placeholder="Password" />
        <label for="password" class="{{ $labelClass }}">Password</label>
        <div class="{{ $iconClass }}">
          <i class="fas fa-lock text-sm"></i>
        </div>
      </div>

      <!-- Confirm Password -->
      <div class="relative group mt-4">
        <input type="password" name="password_confirmation" id="password_confirmation" required class="{{ $inputClass }}" placeholder="Confirm Password" />
        <label for="password_confirmation" class="{{ $labelClass }}">Confirm Password</label>
        <div class="{{ $iconClass }}">
          <i class="fas fa-check-circle text-sm"></i>
        </div>
      </div>

      <!-- Submit -->
      <button type="submit" class="w-full bg-indigo-600 dark:bg-indigo-500 text-white py-2 rounded-md hover:bg-indigo-700 dark:hover:bg-indigo-600 transition duration-300 shadow-md hover:shadow-xl">
        Register
      </button>

      <!-- Login -->
      <p class="mt-4 text-center text-sm text-gray-600 dark:text-gray-400">
        Already have an account?
        <a href="{{ route('login') }}" class="text-indigo-600 dark:text-indigo-400 hover:underline">Login</a>
      </p>
    </form>
  </div>
</div>
@endsection
