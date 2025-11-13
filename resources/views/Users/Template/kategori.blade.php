{{-- <div>
    <!-- You must be the change you wish to see in the world. - Mahatma Gandhi -->
</div> --}}
<section>
    <div class="bg-gray-100 dark:bg-gray-900 min-h-screen py-8 px-4">
        <div class="max-w-7xl mx-auto">
            <!-- Hero Section -->
            <div class="text-center mb-10">
                <h1 class="text-4xl font-bold text-gray-800 dark:text-white">Temukan Produk Terbaik</h1>
                <p class="mt-2 text-gray-600 dark:text-gray-300">Promo menarik dan produk berkualitas untukmu</p>
            </div>

            <!-- Filter & Search -->
            <form method="GET" action="{{ route('catalog.index') }}">
                <div class="flex flex-col md:flex-row justify-between items-center mb-6 gap-4">
                    <!-- Search & Buttons -->
                    <div class="flex flex-row md:flex-row items-center gap-2 w-full md:w-2/3">
                        <input
                            type="text"
                            name="search"
                            value="{{ request('search') }}"
                            placeholder="Cari produk..."
                            class="w-2/3 px-4 py-2 rounded-lg border border-gray-300 dark:border-gray-700 dark:bg-gray-800 dark:text-white focus:outline-none focus:ring-2 focus:ring-blue-500"
                        >
                        <button
                            type="submit"
                            class="px-4 py-2 bg-orange-600 text-white rounded-lg hover:bg-orange-700 transition"
                        >
                            Cari
                        </button>
                        <a
                            href="{{ route('catalog.index') }}"
                            class="px-4 py-2 rounded-lg bg-gray-200 dark:bg-gray-700 text-gray-800 dark:text-white hover:bg-gray-300 dark:hover:bg-gray-600 transition"
                        >
                            Reset
                        </a>
                    </div>

                    <!-- Dropdown Kategori -->
                    <div class="w-full md:w-1/3">
                        <select
                            name="kategori"
                            onchange="this.form.submit()"
                            class="w-full px-4 py-2 rounded-lg border border-gray-300 dark:border-gray-700 dark:bg-gray-800 dark:text-white"
                        >
                            <option value="">Semua Kategori</option>
                            @foreach($kategoriList as $kategori)
                                <option value="{{ $kategori->id }}" {{ request('kategori') == $kategori->id ? 'selected' : '' }}>
                                    {{ $kategori->nama }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </form>

            <!-- Product Grid -->
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach($products as $product)
                    <div class="bg-white dark:bg-gray-800 rounded-lg shadow hover:shadow-lg transition duration-300">
                        <img
                            src="{{ asset('storage/' . $product->image) }}"
                            alt="{{ $product->name }}"
                            class="w-full h-48 object-cover rounded-t-lg"
                        >
                        <div class="p-4">
                            <h2 class="text-lg font-semibold text-gray-800 dark:text-white">{{ $product->name }}</h2>
                            <p class="text-sm text-gray-600 dark:text-gray-300">{{ $product->description }}</p>
                            <div class="mt-2 flex justify-between items-center">
                                <span class="text-orange-600 dark:text-orange-400 font-bold">
                                    @if($product->promo_price)
                                        Rp{{ number_format($product->promo_price) }}
                                    @else
                                        Rp{{ number_format($product->price) }}
                                    @endif
                                </span>
                                {{-- <a href="{{ route('shop.show', $product->id) }}" class="text-sm text-white bg-blue-600 hover:bg-blue-700 px-3 py-1 rounded">Lihat</a> --}}
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <!-- Pagination -->
            <div class="mt-10">
                {{ $products->links() }}
            </div>
        </div>
    </div>
</section>