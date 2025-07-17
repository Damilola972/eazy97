@extends('layouts.app')

@section('content')
<div class="min-h-screen flex items-center justify-center bg-gray-900">
    <div class="w-full max-w-xl bg-gray-800 text-white rounded-lg shadow-lg p-8">
        <h2 class="text-2xl font-bold mb-4 text-center">Verify Your Email</h2>

        <p class="text-sm text-gray-300 mb-6">
            {{ __('Thanks for signing up! Before getting started, please verify your email address by clicking the link we sent to your inbox. If you didn\'t receive it, you can request another one below.') }}
        </p>

        @if (session('status') == 'verification-link-sent')
            <div class="mb-4 p-3 rounded-md bg-green-600 bg-opacity-20 text-green-400 border border-green-500">
                {{ __('A new verification link has been sent to the email address you provided during registration.') }}
            </div>
        @endif

        <div class="flex flex-col sm:flex-row justify-between gap-4">
            <form method="POST" action="{{ route('verification.send') }}">
                @csrf
                <button type="submit"
                    class="w-full bg-indigo-600 hover:bg-indigo-700 text-white font-medium py-2 px-4 rounded-md transition duration-150">
                    {{ __('Resend Verification Email') }}
                </button>
            </form>

            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit"
                    class="w-full bg-red-600 hover:bg-red-700 text-white font-medium py-2 px-4 rounded-md transition duration-150">
                    {{ __('Log Out') }}
                </button>
            </form>
        </div>
    </div>
</div>
@endsection

