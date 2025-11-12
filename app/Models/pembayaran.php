<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class pembayaran extends Model
{
    protected $table = 'payments';
    //
    protected $fillable = ['transaction_id', 'method', 'status', 'paid_at'];

    public function transaction()
    {
        return $this->belongsTo(transaksi::class);
    }

}
