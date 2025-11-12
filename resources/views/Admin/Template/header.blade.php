<!DOCTYPE html>
<html lang="id">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>{{ $title ?? 'SiPanda Admin' }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
  </head>
  <body class="bg-gray-100">
    <header x-data="{ open: false }" class="bg-gray-900 text-white shadow-md fixed top-0 left-0 w-full z-30 print:hidden">
      <div class="max-w-7xl mx-auto px-6 py-4 flex items-center justify-between">
        <!-- Logo & Nama -->
        <div class="flex items-center space-x-3">
          <img src="/logo.png" alt="SiPanda Admin" class="h-8 w-auto">
          <span class="text-lg font-bold tracking-wide">SiPanda Admin</span>
        </div>

        <!-- Tombol Hamburger (Mobile Only) -->
        <button @click="open = !open" class="md:hidden focus:outline-none">
          <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16" />
          </svg>
        </button>

        <!-- Navigasi Desktop -->
        <div class="hidden md:flex items-center space-x-6 text-sm font-medium">
          <nav class="flex space-x-6">
           <p>Lorem ipsum dolor sit.</p>
          </nav>
          <form method="POST" action="/logout">
            @csrf
            <button type="submit"
              class="bg-orange-600 hover:bg-orange-500 text-white px-4 py-2 rounded-md text-sm font-semibold transition">
              Logout
            </button>
          </form>
        </div>
      </div>

      <!-- Navigasi Mobile -->
      <div x-show="open" x-transition class="md:hidden px-6 pb-4">
        <nav class="flex flex-col space-y-2 text-sm font-medium">
          <a href="/admin/dashboard" class="hover:text-orange-400 transition">Dashboard</a>
          <a href="/admin/products" class="hover:text-orange-400 transition">Produk</a>
          <a href="/admin/orders" class="hover:text-orange-400 transition">Pesanan</a>
          <a href="/admin/users" class="hover:text-orange-400 transition">Pengguna</a>
        </nav>
        <form method="POST" action="/logout" class="mt-4">
          @csrf
          <button type="submit"
            class="w-full bg-orange-600 hover:bg-orange-500 text-white px-4 py-2 rounded-md text-sm font-semibold transition">
            Logout
          </button>
        </form>
      </div>
    </header>

  </body>
</html>