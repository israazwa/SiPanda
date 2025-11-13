{{-- <div>
    <!-- I have not failed. I've just found 10,000 ways that won't work. - Thomas Edison -->
</div> --}}

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title> <?= $title; ?> </title>
  <link rel="stylesheet" href="/resources/css/app.css" />
  @vite('resources/css/app.css')
  <style>
    .noselect {
  user-select: none;
  -webkit-user-select: none;
  -moz-user-select: none;
  -ms-user-select: none;
}
  </style>
</head>
<body class="bg-gray-600 transition-colors duration-300 ease-out min-h-screen">
  <header class="fixed top-0 z-40 w-full shadow-lg bg-white dark:bg-gray-800 py-4 transition-all duration-300 ease-out">
    <div class="container mx-auto lg:max-w-screen-xl md:max-w-screen-md flex items-center justify-between px-4">
      
      <!-- Logo -->
      <a href="/home">
      <div class="logoa flex">
        <img src="/logo.png" alt="" class="w-13 h-13 noselect">
        <div class="text-xl font-bold text-primary text-white transition-colors ml-2 noselect mt-3">
        SiPanda
        </div>
      </div>
      </a>
      <style>
        .logoa img {
        filter: grayscale(100%);
        transition: filter 0.3s ease;
      }

      .logoa:hover img {
        filter: none;
      }
      </style>

      <!-- Desktop Navigation -->
      <nav class="hidden lg:flex flex-grow items-center gap-8 justify-center">
        <!-- Theme Toggle Button -->
        <a href="/home" class="text-lg font-medium text-orange-700 hover:text-orange-700 transition-colors {{ request()->routeIs('home') ? 'text-orange-700 font-bold border-b-2 border-orange-700' : 'text-white hover:text-orange-600' }}">Home</a>
        <a href="/catalog" class="text-lg font-medium text-orange-700 hover:text-orange-700 transition-colors {{ request()->routeIs('/catalog') ? 'text-orange-700 font-bold border-b-2 border-orange-700' : 'text-white hover:text-orange-600' }}">Catalog</a>
        <a href="/" class="text-lg font-medium text-orange-700 hover:text-orange-700 transition-colors {{ request()->routeIs('/') ? 'text-orange-700 font-bold border-b-2 border-orange-700' : 'text-white hover:text-orange-600' }}">About Us</a>
        <a href="/" class="text-lg font-medium text-orange-700 hover:text-orange-700 transition-colors {{ request()->routeIs('/') ? 'text-orange-700 font-bold border-b-2 border-orange-700' : 'text-white hover:text-orange-600' }}">Card</a>
      </nav>

      <!-- Right Buttons -->
      <div class="flex items-center gap-2">
        <button data-modal-target="passwordModal"
        class="bg-primary text-black px-4 py-2 rounded-full hover:bg-primary/80 transition text-lg hover:text-yellow-400 cursor-pointer hidden lg:block font-medium">
        Ganti Password
      </button>

      {{-- <form method="POST" action="{{ route('logout') }}" class="hidden lg:block text-primary bg-primary/15 hover:text-red-500 hover:bg-transparent font-medium text-lg py-4 px-2 rounded-full transition-colors cursor-pointer"> --}}
          @csrf
          <button type="submit" class="cursor-pointer">Log Out</button>
      </form>
        <button class="block lg:hidden p-2 rounded-lg hover:bg-white transition-colors" aria-label="Toggle mobile menu">
          <span class="block w-6 h-0.5 bg-black"></span>
          <span class="block w-6 h-0.5 bg-black mt-1.5"></span>
          <span class="block w-6 h-0.5 bg-black mt-1.5"></span>
        </button>
      </div>
    </div>

    <!-- Overlay -->
  <div id="overlay" class="fixed inset-0 bg-blac/30 bg-opacity-50 z-40 hidden"></div>

  <!-- Mobile Menu -->
  <div id="mobileMenu" class="lg:hidden fixed top-0 right-0 h-auto w-[40%] bg-white dark:bg-gray-800 shadow-lg transform transition-transform duration-300 translate-x-full z-50">
    <div class="flex items-center justify-between p-4">
      <div class="text-lg font-bold text-primary dark:text-white">VRaintomy</div>
      <button id="closeMenu" class="bg-[url('/images/closed.svg')] bg-no-repeat bg-contain w-5 h-5 dark:invert hover:brightness-200" aria-label="Close menu"></button>
    </div>
    <nav class="flex flex-col items-end p-4 space-y-4">
      <a href="/home" class="text-primary dark:text-white text-lg hover:text-white transition-colors">Home</a>
      <a href="/catalog" class="text-primary dark:text-white text-lg hover:text-white transition-colors">Catalog</a>
      <a href="/otak3d" class="text-primary dark:text-white text-lg hover:text-white transition-colors">3D Model</a>
      <a href="/posttest" class="text-primary dark:text-white text-lg hover:text-white transition-colors">Post-test</a>
      <a href="#" data-modal-target="passwordModal"
        class="text-primary text-yellow-500 text-lg hover:text-white transition-colors">
        Ganti Password
      </a>
      {{-- <form method="POST" action="{{ route('logout') }}"> --}}
        @csrf
        <button type="submit" class="bg-transparent border border-primary text-red-500 px-2 py-2 rounded-lg hover:bg-transparent hover:text-red-500 hover:border-red-500 w-full text-center transition-colors">
          Log Out
        </button>
      </form>
    </nav>
  </div>
</header>

@vite('resources/js/headerUsers.js')

@if (session('success'))
  <div id="flashSuccess" class="fixed top-[40vh] left-1/2 transform -translate-x-1/2 z-[9999] w-[90%] max-w-xl bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded-lg shadow-lg">
    <div class="flex justify-between items-start">
      <div class="w-full">
        <p class="font-semibold text-center">{{ session('success') }}</p>
        <p id="countdownSuccess" class="text-sm text-green-600 mt-2 text-center">Menutup dalam 5 detik…</p>
      </div>
      <button onclick="document.getElementById('flashSuccess').remove()" class="ml-4 text-xl font-bold text-green-700 hover:text-red-500">&times;</button>
    </div>
  </div>
@endif

@if ($errors->has('update_error'))
  <div id="flashUpdateError" class="fixed top-[40vh] left-1/2 transform -translate-x-1/2 z-[9999] w-[90%] max-w-xl bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded-lg shadow-lg">
    <div class="flex justify-between items-start">
      <div class="w-full">
        <p class="font-semibold text-center">{{ $errors->first('update_error') }}</p>
        <p id="countdownUpdateError" class="text-sm text-red-600 mt-2 text-center">Menutup dalam 5 detik…</p>
      </div>
      <button onclick="document.getElementById('flashUpdateError').remove()" class="ml-4 text-xl font-bold text-red-700 hover:text-red-500">&times;</button>
    </div>
  </div>
@endif

@if ($errors->any())
  <div id="flashOtherErrors" class="fixed top-[48vh] left-1/2 transform -translate-x-1/2 z-[9999] w-[90%] max-w-xl bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded-lg shadow-lg">
    <div class="flex justify-between items-start">
      <div class="w-full">
        <ul class="list-disc pl-5 space-y-1">
          @foreach ($errors->all() as $error)
            @if ($error !== $errors->first('update_error'))
              <li>{{ $error }}</li>
            @endif
          @endforeach
        </ul>
        <p id="countdownOtherErrors" class="text-sm text-red-600 mt-2 text-center">Menutup dalam 5 detik…</p>
      </div>
      <button onclick="document.getElementById('flashOtherErrors').remove()" class="ml-4 text-xl font-bold text-red-700 hover:text-red-500">&times;</button>
    </div>
  </div>
@endif
<div id="passwordModal" class="fixed inset-0 z-50 flex items-center justify-center bg-black/50 hidden">
  <div class="bg-white dark:bg-gray-800 text-gray-800 dark:text-white rounded-xl shadow-lg w-full max-w-md p-6 relative">

    <!-- Close Button -->
    <button id="closePasswordModal" class="absolute top-4 right-4 text-gray-500 hover:text-red-500 text-xl font-bold">&times;</button>

    <!-- Modal Title -->
    <h2 class="text-2xl font-semibold mb-4">Ganti Password</h2>

    <!-- Form -->
    {{-- <form method="POST" action="{{ route('password.update') }}"> --}}
      @csrf
      @method('PUT')
      <div class="relative mb-6">
        <input type="password" name="new_password" id="new_password"
              placeholder=" "
              class="peer w-full px-4 pt-6 pb-2 rounded-lg bg-gray-100 dark:bg-gray-700 border border-gray-300 dark:border-gray-600 focus:outline-none focus:ring-2 focus:ring-primary"
              required />
        <label for="new_password"
              class="absolute left-4 top-2 text-sm text-gray-500 dark:text-gray-400 transition-all peer-placeholder-shown:top-4 peer-placeholder-shown:text-base peer-placeholder-shown:text-gray-400 peer-focus:top-2 peer-focus:text-sm peer-focus:text-primary">
          Password Baru
        </label>
      </div>
      <div class="relative mb-6">
        <input type="password" name="new_password_confirmation" id="new_password_confirmation"
              placeholder=" "
              class="peer w-full px-4 pt-6 pb-2 rounded-lg bg-gray-100 dark:bg-gray-700 border border-gray-300 dark:border-gray-600 focus:outline-none focus:ring-2 focus:ring-primary"
              required />
        <label for="new_password_confirmation"
              class="absolute left-4 top-2 text-sm text-gray-500 dark:text-gray-400 transition-all peer-placeholder-shown:top-4 peer-placeholder-shown:text-base peer-placeholder-shown:text-gray-400 peer-focus:top-2 peer-focus:text-sm peer-focus:text-primary">
          Konfirmasi Password Baru
        </label>
      </div>
      <button type="submit"
              class="w-full bg-gray-600 text-white py-2 rounded-lg hover:bg-yellow-400/80 transition hover:cursor-pointer">
        Simpan Perubahan
      </button>
    </form>
  </div>
</div>
</body>
