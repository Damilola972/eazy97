@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
<div class="min-h-screen bg-white dark:bg-gray-900 text-gray-800 dark:text-gray-100">

    <!-- Eazystore Logo Top Brand -->
    <div class="w-full text-center py-3 bg-white dark:bg-gray-900 border-b border-gray-200 dark:border-gray-700">
        <h1 class="text-3xl font-bold text-indigo-600 dark:text-indigo-400 tracking-wide">Eazystore</h1>
    </div>

    <!-- Topbar -->
    <div class="flex items-center justify-between p-4 border-b border-gray-200 dark:border-gray-700 bg-white dark:bg-gray-900 relative">
        <div class="flex items-center gap-3">
            <div class="w-14 h-14 md:w-16 md:h-16 rounded-full overflow-hidden bg-gray-300 dark:bg-gray-700">
                @if (Auth::user()->profile_picture)
                    <img src="{{ asset('storage/' . Auth::user()->profile_picture) }}" class="w-full h-full object-cover" alt="Profile">
                @else
                    <img src="https://ui-avatars.com/api/?name={{ urlencode(Auth::user()->name) }}&background=0D8ABC&color=fff&size=128" class="w-full h-full object-cover" alt="Avatar">
                @endif
            </div>
            <div>
                <div class="font-semibold text-lg">Welcome, {{ Auth::user()->name }}</div>
                <div class="text-sm text-gray-500 dark:text-gray-400">{{ Auth::user()->email }}</div>
            </div>
        </div>

        <div class="flex items-center gap-4">
            <button onclick="document.getElementById('sidebar').classList.toggle('hidden')"
                    class="text-2xl text-gray-700 dark:text-gray-200 hover:text-indigo-500 transition md:hidden">
                <i class="fas fa-user-circle"></i>
            </button>
            <button onclick="document.documentElement.classList.toggle('dark')"
                    class="text-2xl text-gray-800 dark:text-yellow-400 hover:text-indigo-600 dark:hover:text-yellow-300 transition">
                <i class="fas fa-moon"></i>
            </button>
        </div>
    </div>

    <div class="flex">
        <!-- Sidebar -->
        <div id="sidebar" class="w-64 bg-gray-100 dark:bg-gray-800 border-r border-gray-300 dark:border-gray-700 hidden md:block transition-all">
            <nav class="p-4 space-y-2">
                <a href="#" class="flex items-center gap-3 px-4 py-2 rounded-md text-sm font-medium text-gray-700 dark:text-gray-200 hover:bg-indigo-500 hover:text-white transition">
                    <i class="fas fa-home text-indigo-500"></i> Home
                </a>
               <a href="{{ route('products.browse') }}" class="flex items-center gap-3 px-4 py-2 rounded-md text-sm font-medium text-gray-700 dark:text-gray-200 hover:bg-indigo-500 hover:text-white transition">
                    <i class="fas fa-box-open text-indigo-500"></i> Browse Products
                </a>
                <a href="{{ route('orders.place') }}"class="flex items-center gap-3 px-4 py-2 rounded-md text-sm font-medium text-gray-700 dark:text-gray-200 hover:bg-indigo-500 hover:text-white transition">
                    <i class="fas fa-shopping-cart text-indigo-500"></i> Place Order
                </a>
                <a href="{{ route('orders.confirm') }}" class="flex items-center gap-3 px-4 py-2 rounded-md text-sm font-medium text-gray-700 dark:text-gray-200 hover:bg-indigo-500 hover:text-white transition">
                    <i class="fas fa-check-circle text-indigo-500"></i> Confirm Order
                </a>
                   <a href="{{ route('cart.index') }}" class="flex items-center gap-3 px-4 py-2 rounded-md text-sm font-medium text-gray-700 dark:text-gray-200 hover:bg-indigo-500 hover:text-white transition">
                    <i class="fas fa-sync-alt text-indigo-500"></i> Reset Cart
                </a>
                <a href="{{ route('profile.edit') }}" class="flex items-center gap-3 px-4 py-2 rounded-md text-sm font-medium text-gray-700 dark:text-gray-200 hover:bg-indigo-500 hover:text-white transition">
                    <i class="fas fa-user text-indigo-500"></i> Profile
                </a>
                @auth
                    @if (Auth::user()->is_admin)
                          <a href="{{ route('admin.dashboard') }}" class="flex items-center gap-3 px-4 py-2 rounded-md text-sm font-medium text-indigo-600 dark:text-indigo-300 hover:bg-indigo-500 hover:text-white transition">
                            <i class="fas fa-upload text-indigo-500"></i> Admin panel
                        </a>
                    @endif
                @endauth
                <form method="POST" action="{{ route('logout') }}" onsubmit="return confirm('Are you sure you want to logout?');">
                    @csrf
                    <button type="submit" class="w-full flex items-center gap-3 px-4 py-2 rounded-md text-sm font-medium text-red-600 hover:bg-red-600 hover:text-white transition">
                        <i class="fas fa-sign-out-alt"></i> Logout
                    </button>
                </form>
                <form method="POST" action="{{ route('profile.destroy') }}" onsubmit="return confirm('Are you sure you want to delete your account? This action cannot be undone.');">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="w-full flex items-center gap-3 px-4 py-2 rounded-md text-sm font-medium text-red-600 hover:bg-red-600 hover:text-white transition">
                        <i class="fas fa-user-times"></i> Delete Account
                    </button>
                </form>
            </nav>
        </div>

        <!-- Main Content -->
        <main class="flex-1 p-6">
         @if (session('status'))
    <div id="successMsg" class="mb-4 flex items-center justify-between p-3 rounded-lg bg-green-100 dark:bg-green-800 text-green-700 dark:text-green-200 border border-green-300 dark:border-green-600 shadow-sm">
        <div class="flex items-center gap-2">
            <i class="fas fa-check-circle text-green-500 dark:text-green-300"></i>
            <span class="text-sm font-medium">{{ session('status') }}</span>
        </div>
        <button onclick="this.parentElement.remove()"
            class="text-green-500 hover:text-green-700 dark:hover:text-white text-lg leading-none">&times;</button>
    </div>
@endif
            <div class="flex justify-between items-center mb-4">
                <h1 class="text-2xl font-bold">Happy Shopping, {{ Auth::user()->name }}</h1>
                <a href="{{ route('dashboard') }}" class="inline-flex items-center px-4 py-2 bg-indigo-600 text-white rounded hover:bg-indigo-700 transition">
                    <i class="fas fa-sync-alt mr-2"></i> Refresh
                </a>
            </div>

            <div class="grid grid-cols-2 sm:grid-cols-2 md:grid-cols-2 lg:grid-cols-3 gap-4">
                @foreach($products as $product)
                    <div class="w-full bg-white dark:bg-gray-800 p-3 rounded-xl shadow hover:shadow-lg transition text-sm">
                        @if ($product->image)
                        <div class="relative overflow-hidden rounded-lg mb-3 cursor-pointer group" onclick="openModal('{{ asset('storage/' . $product->image) }}')">
                            <img src="{{ asset('storage/' . $product->image) }}"
                                 alt="{{ $product->name }}"
                                 class="w-full h-20 object-cover rounded-lg transition duration-300 ease-in-out" />
      <div class="absolute inset-0 flex items-center justify-center">
    <span class="bg-indigo-600 text-white px-3 py-1.5 text-xs font-semibold rounded-full flex items-center gap-1 shadow-md">
        <i class="fas fa-eye text-white text-sm"></i>
        <span style="font-family: 'Georgia', serif;">Click to View</span>
    </span>
</div>


                        </div>
                        @endif

                        <h2 class="text-base font-semibold text-gray-800 dark:text-gray-100 mb-1 truncate">
                            {{ $product->name }}
                        </h2>
                        <p class="text-xs text-gray-600 dark:text-gray-300 mb-2 line-clamp-2">
                            {{ $product->description }}
                        </p>
   <span class="inline-block bg-indigo-100 dark:bg-indigo-700 text-indigo-600 dark:text-indigo-200 text-[11px] font-semibold px-2 py-0.5 rounded-full mt-1">
    {{ $product->stock }} Available
</span>
                        <div class="flex justify-between items-center mt-auto">
                            <span class="text-indigo-600 dark:text-indigo-400 font-semibold">
                                ₦{{ number_format($product->price, 2) }}
                            </span>
                            

      <form action="{{ route('cart.add', $product->id) }}" method="POST">
    @csrf
    <button type="submit" class="inline-flex items-center justify-center gap-1 px-3 py-1.5 bg-indigo-600 hover:bg-indigo-700 text-white text-xs font-medium rounded-md shadow-md transition">
        <i class="fas fa-cart-plus text-sm"></i>

        <!-- Show this only on medium and up (desktop) -->
        <span class="hidden md:inline">Add to Cart</span>
    </button>
</form>

                        </div>
                    </div>
                @endforeach
            </div>
        </main>

        <!-- Image Modal -->
        <div id="imageModal" class="fixed inset-0 bg-black bg-opacity-70 z-50 hidden justify-center items-center">
            <div class="bg-white dark:bg-gray-800 p-4 rounded-lg max-w-md w-full relative">
                <button onclick="closeModal()" class="absolute top-2 right-2 text-white hover:text-red-400 text-xl font-bold">&times;</button>
                <img id="modalImage" src="" class="w-full h-auto rounded-md" alt="Product Image Preview" />
            </div>
        </div>
    </div>
</div>

<script>
    let isModalOpen = false;
    function openModal(imageUrl) {
        const modal = document.getElementById('imageModal');
        const img = document.getElementById('modalImage');
        img.src = imageUrl;
        modal.classList.remove('hidden');
        modal.classList.add('flex');
        isModalOpen = true;
    }
    function closeModal() {
        const modal = document.getElementById('imageModal');
        const img = document.getElementById('modalImage');
        modal.classList.add('hidden');
        modal.classList.remove('flex');
        img.src = '';
        isModalOpen = false;
    }
    window.addEventListener('scroll', () => {
        if (isModalOpen) {
            closeModal();
        }
    });
</script>
<script>
    setTimeout(() => {
        const success = document.getElementById('successMsg');
        if (success) success.remove();
    }, 4000);
</script>
@endsection

