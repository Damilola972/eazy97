@extends('admin.layout')

@section('title', 'Edit Product')

@section('content')
<div class="bg-white rounded-xl shadow p-6 max-w-xl mx-auto">
    <h1 class="text-xl font-semibold text-indigo-700 mb-4">✏ Edit Product</h1>

    @if ($errors->any())
        <div class="mb-4 p-4 bg-red-100 text-red-700 rounded">
            <ul class="list-disc ml-5">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.products.update', $product->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="mb-4">
            <label class="block font-medium mb-1">Product Name</label>
            <input type="text" name="name" value="{{ old('name', $product->name) }}"
                   class="w-full px-4 py-2 border rounded-lg" required>
        </div>

        <div class="mb-4">
            <label class="block font-medium mb-1">Description</label>
            <textarea name="description" rows="4"
                      class="w-full px-4 py-2 border rounded-lg" required>{{ old('description', $product->description) }}</textarea>
        </div>

        <div class="mb-4">
            <label class="block font-medium mb-1">Price (₦)</label>
            <input type="number" name="price" value="{{ old('price', $product->price) }}"
                   class="w-full px-4 py-2 border rounded-lg" required>
        </div>

        <div class="mb-4">
            <label class="block font-medium mb-1">Stock Quantity</label>
            <input type="number" name="stock" value="{{ old('stock', $product->stock) }}"
                   class="w-full px-4 py-2 border rounded-lg" required>
        </div>

        <div class="mb-4">
            <label class="block font-medium mb-1">Product Image</label>
            <input type="file" name="image" class="block w-full text-sm text-gray-700">
            @if ($product->image)
                <div class="mt-2">
                    <img src="{{ asset('storage/' . $product->image) }}" alt="Product Image" class="w-24 h-24 object-cover rounded">
                </div>
            @endif
        </div>

        <button type="submit"
                class="bg-indigo-600 text-white px-6 py-2 rounded-lg hover:bg-indigo-700 transition">
            Update Product
        </button>
    </form>
</div>
@endsection