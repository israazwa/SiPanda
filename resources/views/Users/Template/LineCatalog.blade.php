{{-- <div>
    <!-- We must ship. - Taylor Otwell -->
</div> --}}
<section class="bg-gray-900 py-12">
  <div class="text-center text-white text-3xl font-bold mb-8">
    Sedang Promo!
  </div>

  <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-6 max-w-6xl mx-auto px-6">
    @forelse ($promoProducts as $product)
      <div class="flex flex-col items-center bg-gray-800 rounded-lg p-4 shadow hover:scale-105 transition-transform duration-300">
        <img src="{{ $product->image ? asset('storage/' . $product->image) : asset('default.png') }}"
        alt="{{ $product->name }}"
        class="h-48 w-auto mb-4 rounded">
        <p class="text-white text-center text-base font-semibold">{{ $product->name }}</p>
        <p class="text-orange-400 text-sm font-bold">Rp {{ number_format($product->promo_price, 0, ',', '.') }}</p>
      </div>
    @empty
      <div class="col-span-full text-center text-gray-400">
        Belum ada produk promo saat ini.
      </div>
    @endforelse
  </div>
</section>