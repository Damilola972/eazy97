<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Eazystore</title>

  <!-- ✅ Tailwind CSS -->
  <link rel="stylesheet" href="{{ asset('css/app.css') }}">
  <link rel="stylesheet" href="{{ asset('css/all.min.css') }}">
  <!-- AOS Scroll Animation CSS -->
<link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
</head>
<body class="bg-white text-gray-900">

  <!-- ✅ HEADER -->
  <header class="w-full border-b border-gray-200">
    <div class="max-w-7xl mx-auto flex justify-between items-center px-4 py-4 md:py-6">
      <!-- Logo -->
      <div class="text-2xl font-bold text-indigo-700">Eazystore</div>

      <!-- Desktop Nav -->
      <nav class="hidden md:flex space-x-6 items-center">
        <a href="#" class="text-indigo-600 font-medium border-b-2 border-indigo-600">Home</a>
        <a href="#service" class="text-gray-700 hover:text-indigo-600 transition">Service</a>
        <a href="#about" class="text-gray-700 hover:text-indigo-600 transition">About Us</a>
        <a href="#contact" class="text-gray-700 hover:text-indigo-600 transition">Contact</a>
      </nav>

      <!-- Desktop Buttons -->
      <div class="hidden md:flex space-x-3">
        <a href="{{ route('register') }}" class="bg-indigo-600 text-white px-4 py-2 rounded font-medium hover:bg-indigo-700 transition">Sign Up</a>
        <a href="{{ route('login') }}" class="border border-indigo-600 text-indigo-600 px-4 py-2 rounded font-medium hover:bg-indigo-50 transition">Login</a>
      </div>

      <!-- Hamburger (Mobile) -->
      <button onclick="toggleMenu()" class="md:hidden focus:outline-none">
        <svg class="w-7 h-7 text-indigo-700" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16" />
        </svg>
      </button>
    </div>

    <!-- ✅ MOBILE MENU (Sidebar) -->
    <div id="mobileMenu" class="fixed top-0 right-0 w-full h-full bg-white z-50 transform translate-x-full transition-transform duration-300 flex flex-col">
      <div class="flex justify-between items-center px-6 pt-6 pb-4 border-b border-gray-200">
        <h1 class="text-2xl font-bold text-indigo-700">Eazystore</h1>
        <button onclick="toggleMenu()" class="text-gray-700 focus:outline-none">
          <svg class="w-7 h-7" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
          </svg>
        </button>
      </div>

      <nav class="flex flex-col divide-y divide-gray-200 text-lg font-semibold text-gray-700">
        <a href="#" class="px-6 py-4 hover:bg-indigo-50 hover:text-indigo-600 transition">Home</a>
        <a href="#service" class="px-6 py-4 hover:bg-indigo-50 hover:text-indigo-600 transition">Service</a>
        <a href="#about" class="px-6 py-4 hover:bg-indigo-50 hover:text-indigo-600 transition">About Us</a>
        <a href="#contact" class="px-6 py-4 hover:bg-indigo-50 hover:text-indigo-600 transition">Contact</a>
      </nav>

      <div class="mt-auto px-6 py-6 space-y-4 border-t border-gray-200">
        <a href="{{ route('register') }}" class="block w-full text-center bg-indigo-600 text-white py-2 rounded font-semibold hover:bg-indigo-700 transition">Sign Up</a>
        <a href="{{ route('login') }}" class="block w-full text-center border border-indigo-600 text-indigo-600 py-2 rounded font-semibold hover:bg-indigo-50 transition">Login</a>
      </div>
    </div>
  </header>

  <!-- ✅ HERO -->
 <section class="relative bg-cover bg-center bg-no-repeat py-24 px-4" style="background-image: url('{{ asset('image/girl2.jpg') }}');">
  <div class="absolute inset-0 bg-white/80 md:bg-white/60 backdrop-blur-sm"></div>

  <div class="relative z-10 max-w-7xl mx-auto flex flex-col-reverse md:flex-row items-center gap-10">
    {{-- ✅ Left Text --}}
    <div class="md:w-1/2 text-center md:text-left">
      <h2 class="text-4xl md:text-5xl font-extrabold text-gray-900 mb-6">
        Discover Quality. Shop in Style.
      </h2>
      <p class="text-lg text-gray-600 mb-8">
        A modern marketplace crafted to showcase excellence. See the latest items from top categories.
      </p>
      <a href="{{ route('register') }}" class="inline-block bg-indigo-600 text-white px-6 py-3 rounded hover:bg-indigo-700 transition">
        Explore Products
      </a>
    </div>

    {{-- ✅ Right Image --}}
    <div class="md:w-1/2">
      <img src="{{ asset('image/lady.svg') }}" alt="Hero Illustration" class="w-full max-w-md mx-auto">
    </div>
  </div>
</section>
<!-- ✅ FEATURES / SERVICES SECTION -->
<section class="bg-gray-50 py-20 px-4">
  <div class="max-w-7xl mx-auto text-center">
    <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-6">Why Choose Eazystore?</h2>
    <p class="text-gray-600 text-lg mb-12 max-w-2xl mx-auto">
      We make shopping seamless, secure, and satisfying. Here’s what sets us apart.
    </p>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
      <!-- Feature 1 -->
      <div class="bg-white rounded-lg shadow-md p-8 hover:shadow-lg transition">
        <div class="text-indigo-600 mb-4">
          <svg class="w-12 h-12 mx-auto" fill="none" stroke="currentColor" stroke-width="1.5"
               viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round"
                  d="M3 3h18M3 6h18M4 6v15a1 1 0 001 1h14a1 1 0 001-1V6" />
          </svg>
        </div>
        <h3 class="text-xl font-semibold mb-2">Secure Shopping</h3>
        <p class="text-gray-600 text-sm">All transactions are encrypted and safe, giving you peace of mind while you shop.</p>
      </div>

      <!-- Feature 2 -->
      <div class="bg-white rounded-lg shadow-md p-8 hover:shadow-lg transition">
        <div class="text-indigo-600 mb-4">
          <svg class="w-12 h-12 mx-auto" fill="none" stroke="currentColor" stroke-width="1.5"
               viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round"
                  d="M13 16h-1v-4h-1m1-4h.01M12 12h.01M3 3h18M3 6h18M4 6v15a1 1 0 001 1h14a1 1 0 001-1V6" />
          </svg>
        </div>
        <h3 class="text-xl font-semibold mb-2">Fast Delivery</h3>
        <p class="text-gray-600 text-sm">Swift and reliable delivery, right to your doorstep – always on time.</p>
      </div>

      <!-- Feature 3 -->
      <div class="bg-white rounded-lg shadow-md p-8 hover:shadow-lg transition">
        <div class="text-indigo-600 mb-4">
          <svg class="w-12 h-12 mx-auto" fill="none" stroke="currentColor" stroke-width="1.5"
               viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round"
                  d="M12 6v6l4 2" />
          </svg>
        </div>
        <h3 class="text-xl font-semibold mb-2">Top Categories</h3>
        <p class="text-gray-600 text-sm">Explore trending products across fashion, electronics, beauty, and more.</p>
      </div>
    </div>
  </div>
</section>
<!-- ✅ SHOP BY CATEGORY / FEATURED SECTION -->
<!-- ✅ CLOTHING CATEGORY SECTION -->
<section class="bg-white py-20 px-4">
  <div class="max-w-7xl mx-auto">
    <h2 class="text-3xl md:text-4xl font-extrabold text-gray-900 text-center mb-4">Shop by Category</h2>
    <p class="text-center text-gray-600 text-lg mb-12">Discover curated styles for every vibe.</p>

    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
      
      <!-- 🧥 Men's Wear -->
      <div class="bg-white rounded-xl shadow-lg overflow-hidden hover:shadow-xl transition duration-300">
        <img src="{{ asset('image/cloth.jpg') }}" alt="Men's Wear" class="w-full h-64 object-cover">
        <div class="p-5">
          <h3 class="text-lg font-semibold text-gray-900">Men's Wear</h3>
          <p class="text-sm text-gray-600 mt-2">Sleek fits, clean cuts — premium styles for every man.</p>
        </div>
      </div>

      <!-- 👗 Women's Fashion -->
      <div class="bg-white rounded-xl shadow-lg overflow-hidden hover:shadow-xl transition duration-300">
        <img src="{{ asset('image/cloth2.jpg') }}" alt="Women's Fashion" class="w-full h-64 object-cover">
        <div class="p-5">
          <h3 class="text-lg font-semibold text-gray-900">Women's Fashion</h3>
          <p class="text-sm text-gray-600 mt-2">Confidently chic, effortlessly stylish — find your vibe.</p>
        </div>
      </div>

      <!-- 👟 Streetwear / Accessories -->
      <div class="bg-white rounded-xl shadow-lg overflow-hidden hover:shadow-xl transition duration-300">
        <img src="{{ asset('image/cloth3.jpg') }}" alt="Streetwear" class="w-full h-64 object-cover">
        <div class="p-5">
          <h3 class="text-lg font-semibold text-gray-900">Streetwear</h3>
          <p class="text-sm text-gray-600 mt-2">Fresh drops and essential gear for the urban spirit.</p>
        </div>
      </div>

    </div>
  </div>
</section>
<!-- ✅ APP MOCKUP PREVIEW SECTION (Refined) -->
<section class="bg-white py-20 px-4">
  <div class="max-w-7xl mx-auto text-center">
    <h2 class="text-3xl md:text-4xl font-extrabold text-gray-900 mb-6">Experience Eazystore in Action</h2>
    <p class="text-gray-600 text-lg mb-10 max-w-2xl mx-auto">
      Explore the interface on mobile, tablet, and desktop – crafted for a seamless shopping journey.
    </p>

    <!-- PNG Mockup Image with Subtle Hover -->
    <img 
      src="{{ asset('image/mockup.png') }}" 
      alt="Eazystore Preview"
      class="w-full max-w-4xl mx-auto shadow-xl rounded-xl transform transition duration-500 hover:scale-105"
    >
  </div>
</section>
<!-- ✅ TESTIMONIAL SECTION -->
<section class="relative bg-gray-50 py-20 px-4 overflow-hidden">
  <!-- Background swirl -->
  <div class="absolute -top-10 -left-20 w-96 h-96 bg-indigo-100 rounded-full opacity-10 blur-3xl z-0"></div>

  <div class="relative z-10 max-w-7xl mx-auto text-center">
    <h2 class="text-3xl md:text-4xl font-extrabold text-gray-900 mb-6">Loved by Shoppers Like You</h2>
    <p class="text-gray-600 text-lg mb-12 max-w-2xl mx-auto">
      Our customers are the heart of Eazystore. Here’s what they’re saying.
    </p>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-8 text-left">
      <!-- Testimonial 1 -->
      <div class="bg-white rounded-2xl shadow-lg p-6 md:p-8 border border-gray-100 transition-all duration-300 hover:shadow-2xl hover:scale-[1.015]" data-aos="fade-up" data-aos-delay="100">
        <svg class="w-8 h-8 text-indigo-400 mb-3" fill="currentColor" viewBox="0 0 24 24">
          <path d="M7.17 6.17A4.984 4.984 0 006 9v2a3 3 0 003 3v2a5 5 0 01-5-5V9a7 7 0 017-7v2a4.978 4.978 0 00-3.83 2.17zM17.17 6.17A4.984 4.984 0 0016 9v2a3 3 0 003 3v2a5 5 0 01-5-5V9a7 7 0 017-7v2a4.978 4.978 0 00-3.83 2.17z"/>
        </svg>

        <div class="flex mb-2 space-x-1 text-yellow-400">
          @for ($i = 0; $i < 5; $i++)
            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
              <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.286 3.95a1 1 0 00.95.69h4.163c.969 0 1.371 1.24.588 1.81l-3.37 2.449a1 1 0 00-.364 1.118l1.287 3.951c.3.92-.755 1.688-1.54 1.118L10 13.347l-3.37 2.449c-.785.57-1.84-.197-1.54-1.118l1.287-3.95a1 1 0 00-.364-1.119L2.643 9.377c-.783-.57-.38-1.81.588-1.81h4.163a1 1 0 00.95-.69l1.286-3.95z" />
            </svg>
          @endfor
        </div>

        <p class="text-gray-700 mb-4">“Eazystore totally changed how I shop online. Super easy and fast!”</p>
        <div class="flex items-center gap-3">
          <img src="{{ asset('image/user1.jpg') }}" alt="User" class="w-12 h-12 rounded-full border-2 border-indigo-500 object-cover shadow-sm">
          <div>
            <p class="font-semibold text-gray-900">Amaka Johnson</p>
            <p class="text-sm text-gray-500">Fashion Enthusiast</p>
          </div>
        </div>
      </div>

      <!-- Testimonial 2 -->
      <div class="bg-white rounded-2xl shadow-lg p-6 md:p-8 border border-gray-100 transition-all duration-300 hover:shadow-2xl hover:scale-[1.015]" data-aos="fade-up" data-aos-delay="200">
        <svg class="w-8 h-8 text-indigo-400 mb-3" fill="currentColor" viewBox="0 0 24 24">
          <path d="M7.17 6.17A4.984 4.984 0 006 9v2a3 3 0 003 3v2a5 5 0 01-5-5V9a7 7 0 017-7v2a4.978 4.978 0 00-3.83 2.17zM17.17 6.17A4.984 4.984 0 0016 9v2a3 3 0 003 3v2a5 5 0 01-5-5V9a7 7 0 017-7v2a4.978 4.978 0 00-3.83 2.17z"/>
        </svg>

        <div class="flex mb-2 space-x-1 text-yellow-400">
          @for ($i = 0; $i < 5; $i++)
            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
              <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.286 3.95a1 1 0 00.95.69h4.163c.969 0 1.371 1.24.588 1.81l-3.37 2.449a1 1 0 00-.364 1.118l1.287 3.951c.3.92-.755 1.688-1.54 1.118L10 13.347l-3.37 2.449c-.785.57-1.84-.197-1.54-1.118l1.287-3.95a1 1 0 00-.364-1.119L2.643 9.377c-.783-.57-.38-1.81.588-1.81h4.163a1 1 0 00.95-.69l1.286-3.95z" />
            </svg>
          @endfor
        </div>

        <p class="text-gray-700 mb-4">“I found everything I needed in one place. Delivery was even faster than expected.”</p>
        <div class="flex items-center gap-3">
          <img src="{{ asset('image/user2.jpg') }}" alt="User" class="w-12 h-12 rounded-full border-2 border-indigo-500 object-cover shadow-sm">
          <div>
            <p class="font-semibold text-gray-900">Samuel Adeyemi</p>
            <p class="text-sm text-gray-500">Gadget Lover</p>
          </div>
        </div>
      </div>

      <!-- Testimonial 3 -->
      <div class="bg-white rounded-2xl shadow-lg p-6 md:p-8 border border-gray-100 transition-all duration-300 hover:shadow-2xl hover:scale-[1.015]" data-aos="fade-up" data-aos-delay="300">
        <svg class="w-8 h-8 text-indigo-400 mb-3" fill="currentColor" viewBox="0 0 24 24">
          <path d="M7.17 6.17A4.984 4.984 0 006 9v2a3 3 0 003 3v2a5 5 0 01-5-5V9a7 7 0 017-7v2a4.978 4.978 0 00-3.83 2.17zM17.17 6.17A4.984 4.984 0 0016 9v2a3 3 0 003 3v2a5 5 0 01-5-5V9a7 7 0 017-7v2a4.978 4.978 0 00-3.83 2.17z"/>
        </svg>

        <div class="flex mb-2 space-x-1 text-yellow-400">
          @for ($i = 0; $i < 5; $i++)
            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
              <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.286 3.95a1 1 0 00.95.69h4.163c.969 0 1.371 1.24.588 1.81l-3.37 2.449a1 1 0 00-.364 1.118l1.287 3.951c.3.92-.755 1.688-1.54 1.118L10 13.347l-3.37 2.449c-.785.57-1.84-.197-1.54-1.118l1.287-3.95a1 1 0 00-.364-1.119L2.643 9.377c-.783-.57-.38-1.81.588-1.81h4.163a1 1 0 00.95-.69l1.286-3.95z" />
            </svg>
          @endfor
        </div>

        <p class="text-gray-700 mb-4">“The app design is so sleek. I actually enjoy browsing every category!”</p>
        <div class="flex items-center gap-3">
          <img src="{{ asset('image/user3.jpg') }}" alt="User" class="w-12 h-12 rounded-full border-2 border-indigo-500 object-cover shadow-sm">
          <div>
            <p class="font-semibold text-gray-900">Chinyere Okafor</p>
            <p class="text-sm text-gray-500">Beauty Shopper</p>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- ✅ NEWSLETTER SIGNUP -->
<section class="bg-indigo-50 py-20 px-4">
  <div class="max-w-2xl mx-auto text-center">
    <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">Stay in the Loop</h2>
    <p class="text-gray-600 text-lg mb-8">
      Get updates on new arrivals, exclusive offers, and more—straight to your inbox.
    </p>

    <form action="#" method="POST" class="flex flex-col sm:flex-row items-center justify-center gap-4">
      <input type="email" placeholder="Enter your email"
             class="w-full sm:w-auto flex-1 px-5 py-3 rounded-md border border-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500"
             required>

      <button type="submit"
              class="bg-indigo-600 text-white px-6 py-3 rounded-md font-medium hover:bg-indigo-700 transition">
        Subscribe
      </button>
    </form>
  </div>
</section>
<!-- 🌈 GRADIENT DIVIDER -->
<div class="w-full h-1 bg-gradient-to-r from-indigo-500 via-blue-400 to-purple-500 mb-8"></div>

<!-- ✅ ENHANCED FOOTER -->
<footer class="bg-[#F9FAFB] text-gray-700 pt-16 pb-10 px-6">
  <div class="max-w-7xl mx-auto grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-10">

    <!-- 🛍 Brand Info -->
    <div>
      <h2 class="text-2xl font-extrabold text-indigo-700 mb-4">Eazystore</h2>
      <p class="text-sm text-gray-600 leading-relaxed">
        The modern way to shop smart. Get premium fashion and top deals — delivered to your door.
      </p>
    </div>

    <!-- 🔗 Quick Links -->
    <div>
      <h3 class="text-lg font-semibold text-gray-900 mb-3">Quick Links</h3>
      <ul class="space-y-2 text-sm">
        <li><a href="#" class="hover:text-indigo-600 hover:underline transition">Home</a></li>
        <li><a href="#service" class="hover:text-indigo-600 hover:underline transition">Service</a></li>
        <li><a href="#about" class="hover:text-indigo-600 hover:underline transition">About Us</a></li>
        <li><a href="#contact" class="hover:text-indigo-600 hover:underline transition">Contact</a></li>
      </ul>
    </div>

    <!-- 🛡 Support -->
    <div>
      <h3 class="text-lg font-semibold text-gray-900 mb-3">Support</h3>
      <ul class="space-y-2 text-sm">
        <li><a href="#" class="hover:text-indigo-600 hover:underline transition">FAQs</a></li>
        <li><a href="#" class="hover:text-indigo-600 hover:underline transition">Privacy Policy</a></li>
        <li><a href="#" class="hover:text-indigo-600 hover:underline transition">Terms & Conditions</a></li>
        <li><a href="#" class="hover:text-indigo-600 hover:underline transition">Help Center</a></li>
      </ul>
    </div>

    <!-- 🌐 Socials + Payments -->
    <div>
      <h3 class="text-lg font-semibold text-gray-900 mb-3">Connect</h3>
      <div class="flex space-x-4 text-indigo-600 text-xl mb-4">
        <a href="#" class="hover:text-indigo-800 transform hover:-translate-y-1 transition"><i class="fab fa-facebook-f"></i></a>
        <a href="#" class="hover:text-indigo-800 transform hover:-translate-y-1 transition"><i class="fab fa-twitter"></i></a>
        <a href="#" class="hover:text-indigo-800 transform hover:-translate-y-1 transition"><i class="fab fa-instagram"></i></a>
        <a href="#" class="hover:text-indigo-800 transform hover:-translate-y-1 transition"><i class="fab fa-linkedin-in"></i></a>
      </div>

      <div class="flex space-x-3 items-center">
        <img src="{{ asset('image/visa.png') }}" alt="Visa" class="h-6">
        <img src="{{ asset('image/master.png') }}" alt="MasterCard" class="h-6">
        <img src="{{ asset('image/paypal.png') }}" alt="PayPal" class="h-6">
      </div>
    </div>
  </div>

  <!-- 🔻 Bottom Text -->
  <div class="mt-12 border-t pt-6 border-gray-200 text-center text-sm text-gray-500">
    &copy; {{ date('Y') }} Eazystore. Built with ❤ for modern commerce.
  </div>
</footer>

  <!-- ✅ SCRIPT -->
  <script>
    function toggleMenu() {
      const menu = document.getElementById('mobileMenu');
      menu.classList.toggle('translate-x-full');
      document.body.classList.toggle('overflow-hidden');
    }
  </script>
  <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>


  <script>
  AOS.init({
    duration: 700, // animation duration in ms
    once: true     // only animate once per element
  });
</script>
</body>
</html>