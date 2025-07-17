<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel - @yield('title')</title>

    <!-- Tailwind CSS CDN (for development only) -->
   <link rel="stylesheet" href="{{ asset('css/app.css') }}">

    <!-- ✅ Font Awesome (for icons like fa-edit, fa-trash) -->
    <link rel="stylesheet" href="{{ asset('css/all.min.css') }}">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <!-- Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body class="bg-gray-100 min-h-screen flex">
   

<aside class="w-64 bg-indigo-700 text-white flex-shrink-0 min-h-screen">
    <div class="text-2xl font-bold p-6 border-b border-indigo-600">Admin Panel</div>
    <nav class="p-4 space-y-2">

        <a href="{{ route('admin.dashboard') }}"
           class="flex items-center gap-2 px-4 py-2 rounded transition
           {{ Route::is('admin.dashboard') ? 'bg-indigo-900 font-semibold' : 'hover:bg-indigo-600' }}">
            <i class="fas fa-chart-line text-sm"></i>
            <span>Dashboard</span>
        </a>

        <a href="{{ route('admin.products') }}"
           class="flex items-center gap-2 px-4 py-2 rounded transition
           {{ Route::is('admin.products') ? 'bg-indigo-900 font-semibold' : 'hover:bg-indigo-600' }}">
            <i class="fas fa-box text-sm"></i>
            <span>Manage Products</span>
        </a>

        <a href="{{ route('admin.orders') }}"
           class="flex items-center gap-2 px-4 py-2 rounded transition
           {{ Route::is('admin.orders') ? 'bg-indigo-900 font-semibold' : 'hover:bg-indigo-600' }}">
            <i class="fas fa-clipboard-list text-sm"></i>
            <span>Manage Orders</span>
        </a>

        <a href="{{ route('admin.users') }}"
           class="flex items-center gap-2 px-4 py-2 rounded transition
           {{ Route::is('admin.users') ? 'bg-indigo-900 font-semibold' : 'hover:bg-indigo-600' }}">
            <i class="fas fa-users text-sm"></i>
            <span>Manage Users</span>
        </a>

    </nav>
</aside>

    <!-- Main Content -->
    <main class="flex-1 p-6">
        <!-- Top Bar -->
        <header class="flex items-center justify-between mb-6">
            <h1 class="text-2xl font-semibold text-indigo-700">@yield('title')</h1>
            <div class="text-sm text-gray-600">Welcome, Admin</div>
        </header>

        <!-- Page Content -->
        @yield('content')
    </main>

    <!-- 🧠 IMPORTANT: Load view-specific scripts like charts here -->
    @yield('scripts')

</body>
</html>