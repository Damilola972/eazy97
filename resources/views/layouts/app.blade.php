<!DOCTYPE html>
<html lang="en" class="dark">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>{{ config('app.name', 'Laravel') }}</title>

  <!-- ✅ Compiled Tailwind CSS -->
  <link rel="stylesheet" href="{{ URL::asset(mix('css/app.css')) }}">
  <link rel="stylesheet" href="{{ asset('css/all.min.css') }}">
 
  @stack('head') {{-- For pushing custom head content --}}
</head>
<body class="bg-white dark:bg-gray-900 text-gray-900 dark:text-white transition-all">
   <script src="{{ URL::asset(mix('js/app.js')) }}" defer></script>
  {{-- Page Content --}}
  @yield('content')
</body>
</html>