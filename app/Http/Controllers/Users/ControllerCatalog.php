<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use App\Models\kategori;
use Illuminate\Http\Request;
use App\Models\produk;

class ControllerCatalog extends Controller
{
    public function index(Request $request)
    {
        $query = Produk::query();

        if ($request->filled('search')) {
            $query->where('name', 'like', '%' . $request->search . '%');
        }

        if ($request->filled('kategori')) {
            $query->where('kategori_id', $request->kategori); // atau sesuai field relasi
        }

        $produk = $query->paginate(6)->withQueryString();
        $kategoriList = kategori::orderBy('name')->get();
        $data = [
            'title' => 'Catalog || SiPanda',
            'products' => $produk,
            'kategoriList' => $kategoriList,
        ];
        return view('Users.main.catalog', $data);
    }
}