{{-- Motivasi --}}
{{-- <div> <!-- Because you are alive, everything is possible. - Thich Nhat Hanh --> </div> --}}

{{-- Header & Sidebar --}}
@include('admin.template.header')
@include('admin.template.aside')

{{-- Konten Utama --}}
<main class="md:ml-64 px-6 py-8 bg-gray-800 min-h-screen text-white transition-all duration-300">
  <h1 class="text-3xl font-bold text-white mb-8">Tambah Produk</h1>

  <form action="{{ route('admin.products.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6 bg-gray-900 p-6 rounded-lg shadow-lg">
    @csrf

    {{-- Nama Produk --}}
    <div>
      <label class="block text-sm font-semibold text-gray-300 mb-1">Nama Produk</label>
      <input type="text" name="name" class="w-full bg-gray-800 text-white border border-gray-600 px-4 py-2 rounded-md focus:outline-none focus:ring-2 focus:ring-orange-500" required>
    </div>

    {{-- Kategori --}}
    <div>
      <label class="block text-sm font-semibold text-gray-300 mb-1">Kategori</label>
      <select name="category_id" class="w-full bg-gray-800 text-white border border-gray-600 px-4 py-2 rounded-md focus:outline-none focus:ring-2 focus:ring-orange-500">
        <option value="">- Pilih Kategori -</option>
        @foreach($categories as $category)
          <option value="{{ $category->id }}">{{ $category->name }}</option>
        @endforeach
      </select>
    </div>

    {{-- Harga --}}
    <div>
      <label class="block text-sm font-semibold text-gray-300 mb-1">Harga</label>
      <input type="number" name="price" class="w-full bg-gray-800 text-white border border-gray-600 px-4 py-2 rounded-md focus:outline-none focus:ring-2 focus:ring-orange-500" required>
    </div>

    {{-- promo --}}
    <div class="mb-4">
    <label for="promo_price" class="block text-sm font-medium text-white mb-2">
        Harga Promo  <span class="text-red-500 text-xs">(isi hanya jika produk sedang promo)</span>
    </label>
    <input type="number" id="promo_price" name="promo_price"
        value="{{ old('promo_price', $product->promo_price ?? '') }}"
        class="w-full px-4 py-2 rounded border border-gray-600 text-white"
        placeholder="Contoh: 75000">
      </div>

    {{-- Stok --}}
    <div>
      <label class="block text-sm font-semibold text-gray-300 mb-1">Stok</label>
      <input type="number" name="stock" class="w-full bg-gray-800 text-white border border-gray-600 px-4 py-2 rounded-md focus:outline-none focus:ring-2 focus:ring-orange-500" required>
    </div>

    {{-- Gambar --}}
    <div>
      <label class="block text-sm font-semibold text-gray-300 mb-1">Gambar Produk</label>
      <input type="file" name="image" class="w-full bg-gray-800 text-white border border-gray-600 px-4 py-2 rounded-md file:bg-pink-700/80 file:text-white file:border-none file:px-4 file:py-2 file:rounded-md file:cursor-pointer">
    </div>

    {{-- Tombol Simpan --}}
    <div class="pt-4">
      <button type="submit" class="bg-orange-600 hover:bg-orange-500 text-white font-semibold px-6 py-1 rounded-md transition duration-200 ease-in-out">
        Simpan
      </button>
    </div>
  </form>

  @include('admin.template.footer')
</main>