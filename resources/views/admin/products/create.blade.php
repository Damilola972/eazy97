@extends('layouts.app')

@section('title', 'Upload Product')

@section('content')
<div class="min-h-screen bg-white dark:bg-gray-900 text-gray-800 dark:text-gray-100 p-6 flex items-center justify-center">

    <div class="w-full max-w-2xl bg-white dark:bg-gray-800 rounded-2xl shadow-lg p-8 border border-indigo-200 dark:border-gray-700">
        <h2 class="text-3xl font-bold text-center text-indigo-600 dark:text-indigo-400 mb-6">
            <i class="fas fa-upload mr-2"></i> Upload New Product
        </h2>

        @if ($errors->any())
            <div class="bg-red-100 text-red-700 dark:bg-red-900 dark:text-red-300 p-4 rounded mb-4 text-sm">
                <ul class="list-disc list-inside">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('admin.products.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
            @csrf

            <!-- Product Name -->
            <div>
                <label for="name" class="block text-sm font-medium mb-1">Product Name</label>
                <input type="text" name="name" id="name" class="w-full rounded-md border border-gray-300 dark:border-gray-600 bg-transparent px-4 py-2 focus:outline-none focus:ring-2 focus:ring-indigo-500 dark:focus:ring-indigo-400" required>
            </div>

            <!-- Description -->
            <div>
                <label for="description" class="block text-sm font-medium mb-1">Description</label>
                <textarea name="description" id="description" rows="4" class="w-full rounded-md border border-gray-300 dark:border-gray-600 bg-transparent px-4 py-2 focus:outline-none focus:ring-2 focus:ring-indigo-500 dark:focus:ring-indigo-400" required></textarea>
            </div>
              <!-- Available-->
<div>
    <label for="stock" class="block text-sm font-medium text-gray-700">Stock (Available Quantity)</label>
    <input type="number" name="stock" id="stock" min="0" required
          class="w-full rounded-md border border-gray-300 dark:border-gray-600 bg-transparent px-4 py-2 focus:outline-none focus:ring-2 focus:ring-indigo-500 dark:focus:ring-indigo-400" >
</div>

            <!-- Price -->
            <div>
                <label for="price" class="block text-sm font-medium mb-1">Price (₦)</label>
                <input type="number" name="price" id="price" class="w-full rounded-md border border-gray-300 dark:border-gray-600 bg-transparent px-4 py-2 focus:outline-none focus:ring-2 focus:ring-indigo-500 dark:focus:ring-indigo-400" required step="0.01">
            </div>

            <!-- Product Image -->
            <div>
                <label for="image" class="block text-sm font-medium mb-1">Product Image</label>
                <input type="file" name="image" id="image" accept="image/*" class="block w-full text-sm text-gray-500 dark:text-gray-400 file:mr-4 file:py-2 file:px-4 file:rounded file:border-0 file:text-sm file:font-semibold file:bg-indigo-50 file:text-indigo-700 hover:file:bg-indigo-100" required>
            </div>

            <!-- Submit -->
            <div class="text-center">
                <button type="submit" class="inline-flex items-center gap-2 bg-indigo-600 text-white dark:bg-indigo-500 px-6 py-2 rounded-md hover:bg-indigo-700 dark:hover:bg-indigo-600 transition-all">
                    <i class="fas fa-save"></i> Submit Product
                </button>
            </div>
        </form>
    </div>
</div>
@endsection

