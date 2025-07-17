<!-- resources/views/admin/products/index.blade.php -->
@extends('admin.layout')

@section('title', 'Manage Products')

@section('content')
<div class="p-6">
    <h1 class="text-2xl font-bold text-gray-800 mb-6">📦 Manage Products</h1>

    <div class="mb-4">
        <a href="{{ route('admin.products.create') }}" class="bg-indigo-600 hover:bg-indigo-700 text-white px-4 py-2 rounded shadow">
            ➕ Add Product
        </a>
    </div>

    <div class="overflow-x-auto bg-white rounded-xl shadow">
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-100">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Image</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Name</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Price</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Stock</th>
                    <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200">
                @foreach($products as $product)
                <tr>
                    <td class="px-6 py-4">
                        @if ($product->image)
                            <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" class="w-12 h-12 object-cover rounded">
                        @else
                            <span class="text-gray-400 text-xs">No Image</span>
                        @endif
                    </td>
                    <td class="px-6 py-4">{{ $product->name }}</td>
                    <td class="px-6 py-4">₦{{ number_format($product->price) }}</td>
                    <td class="px-6 py-4">{{ $product->stock }}</td>
                    <td class="px-6 py-4 text-right space-x-2">
                        <a href="{{ route('admin.products.edit', $product->id) }}" class="text-indigo-600 hover:text-indigo-900">Edit</a>
                        <form action="{{ route('admin.products.destroy', $product->id) }}" method="POST" class="inline-block" onsubmit="return confirm('Are you sure?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-600 hover:text-red-800">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection