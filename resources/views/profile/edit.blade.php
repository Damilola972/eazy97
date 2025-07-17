@extends('layouts.app')

@section('title', 'Edit Profile')

@section('content')
<div class="min-h-screen bg-white dark:bg-gray-900 text-gray-800 dark:text-gray-100">
    <div class="flex">
        <!-- Main Content -->
        <main class="flex-1 p-6">
            <h1 class="text-2xl font-bold mb-8">Edit Profile</h1>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                {{-- Upload Profile Picture --}}
                <div class="bg-white dark:bg-gray-800 p-6 rounded-lg shadow-md">
                    <h2 class="text-lg font-semibold mb-4">Upload Profile Picture</h2>
                    @include('profile.partials.update-profile-picture-form')
                </div>

                {{-- Update Name & Email --}}
                <div class="bg-white dark:bg-gray-800 p-6 rounded-lg shadow-md">
                    <h2 class="text-lg font-semibold mb-4">Update Information</h2>
                    @include('profile.partials.update-profile-information-form')
                </div>

                {{-- Update Password --}}
                <div class="bg-white dark:bg-gray-800 p-6 rounded-lg shadow-md">
                    <h2 class="text-lg font-semibold mb-4">Change Password</h2>
                    @include('profile.partials.update-password-form')
                </div>

                {{-- Delete Account --}}
                <div class="bg-white dark:bg-gray-800 p-6 rounded-lg shadow-md border border-red-500">
                    <h2 class="text-lg font-semibold mb-4 text-red-500">Delete Account</h2>
                    @include('profile.partials.delete-user-form')
                </div>
            </div>
        </main>
    </div>
</div>
@endsection