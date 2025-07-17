@extends('admin.layout')

@section('title', 'Edit User')

@section('content')
<div class="max-w-2xl mx-auto p-6 bg-white rounded-xl shadow mt-6">
    <h2 class="text-2xl font-semibold text-gray-800 mb-4">🖊 Edit User</h2>

    <form action="{{ route('admin.users.update', $user->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-4">
            <label for="name" class="block text-sm font-medium text-gray-700">Full Name</label>
            <input type="text" name="name" id="name" value="{{ old('name', $user->name) }}"
                class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm px-3 py-2 focus:ring focus:ring-indigo-200" required>
        </div>

        <div class="mb-4">
            <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
            <input type="email" name="email" id="email" value="{{ old('email', $user->email) }}"
                class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm px-3 py-2 focus:ring focus:ring-indigo-200" required>
        </div>

        <div class="flex items-center justify-between mt-6">
            <a href="{{ route('admin.users') }}" class="text-sm text-gray-500 hover:underline">← Back to users</a>
            <button type="submit"
                class="bg-indigo-600 hover:bg-indigo-700 text-white px-5 py-2 rounded shadow-sm transition">
                Save Changes
            </button>
        </div>
    </form>
</div>
@endsection