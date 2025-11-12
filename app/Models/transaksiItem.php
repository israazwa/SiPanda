<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class transaksiItem extends Model
{
    protected $table = 'transaction_items';
    //
    protected $fillable = ['transaction_id', 'product_id', 'quantity', 'price', 'subtotal'];

    public function transaction()
    {
        return $this->belongsTo(transaksi::class);
    }

    public function product()
    {
        return $this->belongsTo(produk::class);
    }

}
