<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\produk;
use App\Models\kategori;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class ControllerCRUDProduk extends Controller
{
    public function index(Request $request)
    {
        try {
            $products = produk::with('category')
                ->when($request->search, function ($query) use ($request) {
                    $query->where('name', 'like', '%' . $request->search . '%');
                })
                ->latest()
                ->paginate(2);

            return view('admin.main.produk', compact('products'));

        } catch (\Exception $e) {
            Log::error('Gagal mengambil produk: ' . $e->getMessage());
            return view('admin.main.produk', [
                'products' => collect(), // kosongkan data
                'error' => 'Terjadi kesalahan saat memuat produk. Silakan coba lagi nanti.'
            ]);
        }
        $search = $request->search;
        if ($search && strlen($search) > 100) {
            return back()->with('error', 'Kata kunci pencarian terlalu panjang.');
        }
    }


    public function create()
    {
        $categories = kategori::all();
        return view('admin.main.produk.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'category_id' => 'nullable|exists:categories,id',
            'price' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0',
            'image' => 'nullable|image|max:2048',
            'promo_price' => 'nullable|numeric|min:0',
        ]);

        // Hitung diskon jika promo_price diisi
        if (!empty($validated['promo_price'])) {
            $diskon = $validated['price'] - $validated['promo_price'];

            if ($diskon < 0) {
                return back()->withErrors(['promo_price' => 'Harga promo tidak boleh lebih tinggi dari harga asli.'])->withInput();
            }

            $validated['is_promo'] = true;
            $validated['price'] = $diskon; // ⬅️ Simpan selisihnya sebagai harga
        } else {
            $validated['is_promo'] = false;
            unset($validated['promo_price']); // opsional, kalau tidak ingin disimpan
        }

        // Simpan gambar jika ada
        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('products', 'public');
        }

        // Simpan produk
        produk::create($validated);

        return redirect()->route('admin.products.index')->with('success', 'Produk berhasil ditambahkan.');
    }

    public function edit(produk $product)
    {
        $categories = kategori::all();
        return view('admin.main.produk.edit', compact('product', 'categories'));
    }

    public function update(Request $request, produk $product)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'category_id' => 'nullable|exists:categories,id',
            'price' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0',
            'image' => 'nullable|image|max:2048',
            'promo_price' => 'nullable|numeric|min:0',
        ]);

        // Hitung diskon jika promo_price diisi
        if (!empty($validated['promo_price'])) {
            $diskon = $validated['price'] - $validated['promo_price'];

            if ($diskon < 0) {
                return back()->withErrors([
                    'promo_price' => 'Harga promo tidak boleh lebih tinggi dari harga asli.'
                ])->withInput();
            }

            $validated['is_promo'] = true;
            $validated['price'] = $diskon; // Simpan selisih sebagai harga
        } else {
            $validated['is_promo'] = false;
            unset($validated['promo_price']);
        }

        // Simpan gambar baru jika ada
        if ($request->hasFile('image')) {
            if ($product->image) {
                Storage::disk('public')->delete($product->image);
            }
            $validated['image'] = $request->file('image')->store('products', 'public');
        }

        // Update produk
        $product->update($validated);

        return redirect()->route('admin.products.index')->with('success', 'Produk berhasil diperbarui.');
    }

    public function destroy(produk $product)
    {
        if ($product->image) {
            Storage::disk('public')->delete($product->image);
        }

        $product->delete();

        return redirect()->route('admin.products.index')->with('success', 'Produk berhasil dihapus.');
    }
}