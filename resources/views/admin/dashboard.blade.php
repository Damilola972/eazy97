@extends('admin.layout')

@section('title', 'Admin Dashboard')

@section('content')
<div class="p-6">
    <h1 class="text-2xl font-bold text-gray-800 mb-6">📊 Admin Dashboard</h1>

    <!-- Stat Cards -->
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-6 mb-10">
        <div class="bg-white rounded-xl shadow p-4">
            <h2 class="text-sm text-gray-500">Total Products</h2>
            <p class="text-2xl font-bold text-indigo-600">{{ $totalProducts }}</p>
        </div>
     <div class="bg-white rounded-xl shadow p-4">
    <h2 class="text-sm text-gray-500">Total Orders</h2>
    <p class="text-2xl font-bold text-indigo-600">{{ $totalOrders }}</p>

    @if (!is_null($orderChange))
        <p class="text-sm mt-1 {{ $orderChange >= 0 ? 'text-green-600' : 'text-red-600' }}">
            {{ $orderChange >= 0 ? '+' : '' }}{{ $orderChange }}% from last month
        </p>
    @endif
</div>
        <div class="bg-white rounded-xl shadow p-4">
            <h2 class="text-sm text-gray-500">Revenue</h2>
            <p class="text-2xl font-bold text-indigo-600">₦{{ number_format($totalRevenue) }}</p>
        </div>
        <div class="bg-white rounded-xl shadow p-4">
            <h2 class="text-sm text-gray-500">Total Users</h2>
            <p class="text-2xl font-bold text-indigo-600">{{ $totalUsers }}</p>
        </div>
    </div>

    <!-- Chart Section -->
    <div class="bg-white rounded-xl shadow p-6">
        <h2 class="text-lg font-semibold text-gray-800 mb-4">Monthly Orders</h2>
        <canvas id="ordersChart" height="100"></canvas>
    </div>
</div>
@endsection

@section('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    const ctx = document.getElementById('ordersChart').getContext('2d');
    const ordersChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: {!! json_encode($months) !!},
            datasets: [{
                label: 'Orders',
                data: {!! json_encode($monthlyOrderCounts) !!},
                backgroundColor: '#6366f1',
                borderRadius: 8
            }]
        },
        options: {
            responsive: true,
            plugins: {
                legend: { display: false }
            },
            scales: {
                y: {
                    beginAtZero: true,
                    ticks: { stepSize: 1 }
                }
            }
        }
    });
</script>
@endsection