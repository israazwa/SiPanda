<?php
use App\Http\Controllers\Admin\ControllerHomeAd;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Users\ControllerHome;
use App\Http\Controllers\Admin\ControllerCRUDProduk;
use App\Http\Controllers\Users\ControllerCatalog;

Route::get('/admin', [ControllerHomeAd::class, 'index'])->name('adminhome');
Route::get('/debug', function () {
    return view('welcome');
});
Route::get('/produkAd', [ControllerCRUDProduk::class, 'index'])->name('produkAd');
Route::prefix('admin')->name('admin.')->group(function () {
    Route::resource('products', ControllerCRUDProduk::class);
});

Route::get('/home', [ControllerHome::class, 'index'])->name('home');
Route::get('/catalog', [ControllerCatalog::class, 'index'])->name('catalog.index');
