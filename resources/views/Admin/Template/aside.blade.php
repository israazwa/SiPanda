{{-- <div>
    <!-- It always seems impossible until it is done. - Nelson Mandela -->
</div> --}}
<aside class="hidden md:block w-64 h-screen pt-18 fixed top-0 left-0 bg-gray-900 text-white shadow-lg z-10">
  <nav class="flex flex-col p-4 space-y-4 text-md font-medium ml-5">
    <a href="/admin"
   class="transition {{ request()->is('admin') ? 'text-orange-700 underline' : 'hover:text-orange-400' }}">
   Dashboard
    </a>
    <a href="/admin/products"
      class="transition {{ request()->is('admin/products*') ? 'text-orange-700 underline' : 'hover:text-orange-400' }}">
      Produk
    </a>
    <a href="/admin/orders"
      class="transition {{ request()->is('admin/orders*') ? 'text-orange-700 underline' : 'hover:text-orange-400' }}">
      Pesanan
    </a>
    <a href="/admin/users"
      class="transition {{ request()->is('admin/users*') ? 'text-orange-700 underline' : 'hover:text-orange-400' }}">
      Pengguna
    </a>
  </nav>
</aside>