{{-- <div>
    <!-- The only way to do great work is to love what you do. - Steve Jobs -->
</div> --}}
<section class="grid grid-cols-1 md:flex md:justify-between gap-4 mb-8 text-sm font-semibold">
    <div class="flex items-center gap-2 px-4 py-3 rounded-md shadow-md max-w-xs w-full
        @if($hitungproduk->contains(fn($p) => $p->stock == 0))
            bg-red-600 text-white
        @else
            bg-green-100 text-green-800 border border-green-300
        @endif
    ">
        @if($hitungproduk->contains(fn($p) => $p->stock == 0))
            <svg class="w-15 h-15 text-white shrink-0" fill="none" stroke="currentColor" stroke-width="2"
                viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round"
                    d="M12 9v2m0 4h.01M12 5a7 7 0 100 14 7 7 0 000-14z" />
            </svg>
            <span>Beberapa produk memiliki stok kosong!</span>
        @else
            <svg class="w-15 h-15 text-green-600 shrink-0" fill="none" stroke="currentColor" stroke-width="2"
                viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round"
                    d="M5 13l4 4L19 7" />
            </svg>
            <span>Semua produk memiliki stok. Tidak ada yang kosong.</span>
        @endif
    </div>

    {{-- Info Box 1 --}}
    <div class="bg-white text-gray-800 px-4 py-3 rounded-md shadow-md max-w-xs w-full">
        <h3 class="text-sm text-gray-500 mb-1">Statistik A</h3>
        <p class="text-lg font-bold">Lorem ipsum dolor sit amet.</p>
    </div>

    {{-- Info Box 2 --}}
    <div class="bg-white text-gray-800 px-4 py-3 rounded-md shadow-md max-w-xs w-full">
        <h3 class="text-sm text-gray-500 mb-1">Statistik B</h3>
        <p class="text-lg font-bold">Lorem, ipsum dolor.</p>
    </div>

    {{-- Info Box 3 --}}
    <div class="bg-white text-gray-800 px-4 py-3 rounded-md shadow-md max-w-xs w-full">
        <h3 class="text-sm text-gray-500 mb-1">Statistik C</h3>
        <p class="text-lg font-bold">Lorem ipsum dolor sit.</p>
    </div>
</section>