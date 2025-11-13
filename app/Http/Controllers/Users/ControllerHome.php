<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use App\Models\produk;
use Illuminate\Http\Request;

class ControllerHome extends Controller
{
    //
    public function index()
    {
        $promoProducts = produk::where('is_promo', true)
            ->whereNotNull('promo_price')
            ->get();

        $data = [
            'title' => 'SiPanda || Home',
            'promoProducts' => $promoProducts,
        ];
        return view('users.main.home', $data);
    }
}
