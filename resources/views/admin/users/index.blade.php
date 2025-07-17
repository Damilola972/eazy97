@extends('admin.layout')

@section('title', 'Manage Users')

@section('content')
<div class="p-6">
    <h1 class="text-2xl font-bold text-gray-800 mb-6">👤 Manage Users</h1>

    @if(session('success'))
        <div class="mb-4 text-green-600 bg-green-100 border border-green-300 px-4 py-2 rounded">
            {{ session('success') }}
        </div>
    @endif

    <div class="overflow-x-auto bg-white rounded-xl shadow">
        <table class="min-w-full text-sm text-left text-gray-600">
            <thead class="bg-gray-100 text-gray-700 uppercase text-xs tracking-wider">
                <tr>
                    <th class="px-6 py-3">Name</th>
                    <th class="px-6 py-3">Email</th>
                    <th class="px-6 py-3">Registered</th>
                    <th class="px-6 py-3 text-right">Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200">
                @foreach($users as $user)
                <tr class="hover:bg-gray-50">
                    <td class="px-6 py-4 font-medium text-gray-900">{{ $user->name }}</td>
                    <td class="px-6 py-4">{{ $user->email }}</td>
                    <td class="px-6 py-4">{{ $user->created_at->format('d M, Y') }}</td>
                    <td class="px-6 py-4 text-right space-x-2">
                        <a href="{{ route('admin.users.edit', $user->id) }}" class="inline-flex items-center bg-indigo-600 hover:bg-indigo-700 text-white text-xs font-medium px-4 py-2 rounded shadow">
                            <i class="fas fa-edit mr-1"></i> Edit
                        </a>

                        <form action="{{ route('admin.users.destroy', $user->id) }}" method="POST" onsubmit="return confirm('Delete this user?')" class="inline-block">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="inline-flex items-center bg-red-600 hover:bg-red-700 text-white text-xs font-medium px-4 py-2 rounded shadow">
                                <i class="fas fa-trash mr-1"></i> Delete
                            </button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection