{{-- <div> <!-- Breathing in, I calm body and mind. Breathing out, I smile. - Thich Nhat Hanh --> </div> --}}

@include('admin.template.header')
@include('admin.template.aside')

<main class="md:ml-64 px-6 py-8 bg-gray-800 min-h-screen text-white transition-all duration-300 mb-15">
@if($errors->any())
    <div x-data="{ show: true, countdown: 5 }"
         x-init="
            let timer = setInterval(() => {
                if (countdown > 0) {
                    countdown--;
                } else {
                    show = false;
                    clearInterval(timer);
                }
            }, 1000);
         "
         x-show="show"
         x-transition
         class="fixed inset-0 z-50 flex items-center justify-center bg-black/80"
    >
        <div class="bg-white rounded-lg shadow-lg w-full max-w-md p-6 text-red-800">
            <h2 class="text-lg font-bold mb-2 text-red-600">Ada kesalahan:</h2>
            <ul class="list-disc list-inside text-sm mb-4">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
            <p class="text-xs text-gray-500 mb-4">
                Modal ini akan menutup otomatis dalam <span x-text="countdown"></span> detik.
            </p>
            <div class="text-right">
                <button @click="show = false"
                        class="px-4 py-2 bg-red-600 hover:bg-red-500 text-white rounded-md text-sm">
                    Tutup sekarang
                </button>
            </div>
        </div>
    </div>
@endif
  <h1 class="text-3xl font-bold text-white mb-8">Edit Produk</h1>

  <form action="{{ route('admin.products.update', $product) }}" method="POST" enctype="multipart/form-data" class="space-y-6 bg-gray-900 p-6 rounded-lg shadow-lg">
    @csrf @method('PUT')

    {{-- Nama Produk --}}
    <div>
      <label class="block text-sm font-semibold text-gray-300 mb-1">Nama Produk</label>
      <input type="text" name="name" value="{{ $product->name }}" class="w-full bg-gray-800 text-white border border-gray-600 px-4 py-2 rounded-md focus:outline-none focus:ring-2 focus:ring-orange-500" required>
    </div>

    {{-- Kategori --}}
    <div>
      <label class="block text-sm font-semibold text-gray-300 mb-1">Kategori</label>
      <select name="category_id" class="w-full bg-gray-800 text-white border border-gray-600 px-4 py-2 rounded-md focus:outline-none focus:ring-2 focus:ring-orange-500">
        <option value="">- Pilih Kategori -</option>
        @foreach($categories as $category)
          <option value="{{ $category->id }}" @selected($product->category_id == $category->id)>
            {{ $category->name }}
          </option>
        @endforeach
      </select>
    </div>

    {{-- Harga --}}
    <div>
      <label class="block text-sm font-semibold text-gray-300 mb-1">Harga</label>
      <input type="number" name="price" value="{{ $product->price }}" class="w-full bg-gray-800 text-white border border-gray-600 px-4 py-2 rounded-md focus:outline-none focus:ring-2 focus:ring-orange-500" required>
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
      <input type="number" name="stock" value="{{ $product->stock }}" class="w-full bg-gray-800 text-white border border-gray-600 px-4 py-2 rounded-md focus:outline-none focus:ring-2 focus:ring-orange-500" required>
    </div>

    {{-- Gambar --}}
    <div>
      <label class="block text-sm font-semibold text-gray-300 mb-1">Gambar Produk</label>
      @if($product->image)
        <img src="{{ asset('storage/' . $product->image) }}" class="w-24 h-auto mb-2 rounded shadow">
      @endif
      <input type="file" name="image" class="w-full bg-gray-800 text-white border border-gray-600 px-4 py-2 rounded-md file:bg-orange-600 file:text-white file:border-none file:px-4 file:py-2 file:rounded-md file:cursor-pointer">
    </div>

    {{-- Tombol Update --}}
    <div class="pt-4">
      <button type="submit" class="bg-orange-600 hover:bg-orange-500 text-white font-semibold px-6 py-2 rounded-md transition duration-200 ease-in-out">
        Update
      </button>
    </div>
  </form>

  @include('admin.template.footer')
</main>