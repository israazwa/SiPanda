<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class produk extends Model
{
    protected $table = 'products';

    protected $fillable = [
        'name',
        'category_id',
        'price',
        'stock',
        'image',
        'is_promo',
        'promo_price'
    ];

    public function category()
    {
        return $this->belongsTo(kategori::class);
    }

    public function transactionItems()
    {
        return $this->hasMany(transaksiItem::class);
    }


    //
}
