@include('admin.template.header')
@include('admin.template.aside')
<main class="flex-1 ml-0 md:ml-64 mt-15 py-6 px-4 md:px-8 bg-gray-800 min-h-screen text-white print:hidden">
    @include('admin.template.dashboardwarn')

    @if (isset($error))
        <div class="bg-red-100 text-red-800 p-4 rounded mb-4">
            {{ $error }}
        </div>
    @endif

    <div class="flex flex-col md:flex-row md:justify-between md:items-center gap-4 mb-6">
        <h1 class="text-2xl font-bold">Daftar Produk</h1>

        <div class="flex flex-col sm:flex-row gap-2 sm:items-center">
            <form method="GET" action="{{ route('admin.products.index') }}" class="flex flex-col sm:flex-row gap-2">
                <input type="text" name="search" value="{{ request('search') }}"
                    placeholder="Cari produk..."
                    class="px-4 py-2 border rounded text-white w-full sm:w-auto" />

                <button type="submit"
                    class="hover:cursor-pointer bg-amber-600 hover:bg-orange-500 text-white px-4 py-2 rounded-md text-sm font-semibold">
                    Cari
                </button>

                @if(request('search'))
                    <a href="{{ route('admin.products.index') }}"
                        class="hover:cursor-pointer bg-blue-500/50 hover:bg-blue-500 text-white px-4 py-2 rounded-md text-sm font-semibold text-center">
                        Reset
                    </a>
                @endif
            </form>

            <a href="{{ route('admin.products.create') }}"
                class="bg-pink-700 hover:bg-orange-500 text-white px-4 py-2 rounded-md text-sm font-semibold text-center">
                + Tambah Produk
            </a>
        </div>
    </div>

    <div class="overflow-x-auto rounded-lg shadow">
        <table class="min-w-full bg-gray-800">
            <thead class="bg-gray-700 text-left text-sm font-semibold text-gray-200">
                <tr>
                    <th class="px-4 py-3 whitespace-nowrap w-10">No</th>
                    <th class="px-4 py-3 whitespace-nowrap">Nama</th>
                    <th class="px-4 py-3 whitespace-nowrap">Kategori</th>
                    <th class="px-4 py-3 whitespace-nowrap">Harga</th>
                    <th class="px-4 py-3 whitespace-nowrap">Promo</th>
                    <th class="px-4 py-3 whitespace-nowrap">Stok</th>
                    <th class="px-4 py-3 whitespace-nowrap">Aksi</th>
                </tr>
            </thead>
            <tbody class="text-sm text-gray-100 divide-y divide-gray-700">
                @forelse($products as $product)
                    <tr @class([
                            'hover:bg-gray-700 transition',
                            'bg-red-500/60 hover:bg-red-500/40' => $product->stock == 0,
                            'bg-yellow-300/60 hover:bg-yellow-300/40' => $product->stock < 6 && $product->stock > 0,
                    ])>
                       <td class="px-4 py-3">
                            {{ ($products->currentPage() - 1) * $products->perPage() + $loop->iteration }}
                        </td>
                       <td class="px-4 py-3">
                            {{ $product->name }}
                        </td>
                        <td class="px-4 py-3">{{ $product->category->name ?? 'Kategori belum diisi' }}</td>
                        <td class="px-4 py-3">Rp {{ number_format($product->price, 0, ',', '.') }}</td>
                        <td class="px-4 py-3">
                            @if ($product->is_promo && $product->promo_price)
                                <span class="text-orange-700 font-bold">Rp {{ number_format($product->promo_price, 0, ',', '.') }}</span>
                            @else
                                <p class="text-xs text-green-500 font-semibold">TIDAK ADA DISKON</p>
                            @endif
                        </td>
                        <td class="px-4 py-3">{{ $product->stock }}</td>
                        <td class="px-4 py-3 flex flex-wrap gap-2">
                            <a href="{{ route('admin.products.edit', $product) }}"
                                class="bg-blue-600 hover:bg-blue-500 text-white text-xs px-3 py-1 rounded-md transition">
                                Edit
                            </a>

                            {{-- Tombol Hapus & Modal --}}
                            <div x-data="{ openModal{{ $product->id }}: false }">
                                <button @click="openModal{{ $product->id }} = true"
                                    class="hover:cursor-pointer bg-red-600 hover:bg-red-500 text-white text-xs px-3 py-1 rounded-md transition">
                                    Hapus
                                </button>

                                <div x-show="openModal{{ $product->id }}" x-transition
                                    class="fixed inset-0 z-50 flex items-center justify-center bg-black/80">
                                    <div class="bg-gray-800 rounded-lg shadow-lg w-full max-w-sm p-6 text-gray-100">
                                        <h2 class="text-lg font-semibold mb-4">Konfirmasi Hapus</h2>
                                        <p class="mb-6">Yakin ingin menghapus <strong>{{ $product->name }}</strong>?</p>

                                        <div class="flex justify-end gap-3">
                                            <form action="{{ route('admin.products.destroy', $product) }}" method="POST">
                                                @csrf @method('DELETE')
                                                <button type="submit"
                                                    class="hover:cursor-pointer px-4 py-2 bg-red-600 hover:bg-red-500 text-white rounded-md">
                                                    Hapus
                                                </button>
                                            </form>
                                            <button @click="openModal{{ $product->id }} = false"
                                                class="hover:cursor-pointer px-4 py-2 bg-green-500 hover:bg-green-700 text-gray-800 rounded-md">
                                                Batal
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="px-4 py-3 text-center text-gray-400">
                            @if (request('search'))
                                Tidak ada produk ditemukan untuk kata kunci "<strong>{{ request('search') }}</strong>".
                            @else
                                Belum ada produk yang tersedia.
                            @endif
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="mt-6">
        {{ $products->appends(['search' => request('search')])->links() }}
    </div>

    {{-- Tombol Cetak --}}
<div class="mb-4 print:hidden">
    <button onclick="window.print()"
        class="bg-green-600 hover:bg-green-500 text-white px-4 py-2 rounded-md text-sm font-semibold hover:cursor-pointer">
         Cetak Semua Produk
    </button>
</div>
</main>
{{-- Tabel untuk Print (semua data, tanpa pagination) --}}
<div class="hidden print:block">
    @php
        $allProducts = \App\Models\produk::with('category')->get();
    @endphp

    @include('Admin.Template.Print.TableProduk', ['products' => $allProducts])
</div>


@include('admin.template.footer')