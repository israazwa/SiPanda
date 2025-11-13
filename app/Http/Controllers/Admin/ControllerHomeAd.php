<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\produk;

class ControllerHomeAd extends Controller
{
    //
    public function index()
    {
        $products = produk::all();

        $hitungproduk = produk::all();
        $data = [
            'products' => $products,
            'hitungproduk' => $hitungproduk,
        ];
        return view('admin.main.home', $data);

    }
}
