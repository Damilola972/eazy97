@extends('admin.layout')

@section('title', 'Manage Orders')

@section('content')
<div class="p-6">
    <h1 class="text-2xl font-bold text-gray-800 mb-6">📦 Manage Orders</h1>

    @if(session('success'))
        <div class="mb-4 text-green-600 bg-green-100 border border-green-300 px-4 py-2 rounded">
            {{ session('success') }}
        </div>
    @endif

    <div class="overflow-x-auto bg-white rounded-xl shadow">
        <table class="min-w-full text-sm text-left text-gray-600">
            <thead class="bg-gray-100 text-gray-700 uppercase text-xs tracking-wider">
                <tr>
                    <th class="px-6 py-3">Full Name</th>
                    <th class="px-6 py-3">Email</th>
                    <th class="px-6 py-3">Phone</th>
                    <th class="px-6 py-3">Total</th>
                    <th class="px-6 py-3">Status</th>
                    <th class="px-6 py-3">Tracking ID</th>
                    <th class="px-6 py-3 text-right">Action</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200">
                @foreach($orders as $order)
                <tr class="hover:bg-gray-50">
                    <td class="px-6 py-4">{{ $order->full_name }}</td>
                    <td class="px-6 py-4">{{ $order->email }}</td>
                    <td class="px-6 py-4">{{ $order->phone }}</td>
                    <td class="px-6 py-4">₦{{ number_format($order->total) }}</td>
                    <td class="px-6 py-4">
                        <span class="inline-flex px-2 py-1 text-xs font-semibold rounded-full 
                            {{ $order->status === 'delivered' ? 'bg-green-100 text-green-700' : 'bg-yellow-100 text-yellow-700' }}">
                            {{ ucfirst($order->status) }}
                        </span>
                    </td>
                    <td class="px-6 py-4">{{ $order->tracking_id }}</td>
                    <td class="px-6 py-4 text-right">
                        @if($order->status !== 'delivered')
                        <form action="{{ route('admin.orders.deliver', $order->id) }}" method="POST" onsubmit="return confirm('Mark as delivered?')" class="inline-block">
                            @csrf
                            <button type="submit" class="inline-flex items-center bg-green-600 hover:bg-green-700 text-white text-xs font-medium px-4 py-2 rounded shadow">
                                <i class="fas fa-check mr-1"></i> Mark Delivered
                            </button>
                        </form>
                        @else
                        <span class="text-sm text-gray-400 italic">Done</span>
                        @endif
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection