<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class transaksi extends Model
{
    //
    protected $table = 'transactions';
    protected $fillable = [
        'invoice_number',
        'user_id',
        'type',           // e.g. 'purchase', 'sale', 'payment'
        'total_amount',
        'status',         // e.g. 'pending', 'paid', 'cancelled'
        'transaction_date'
    ];

    protected $casts = [
        'transaction_date' => 'datetime',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function items()
    {
        return $this->hasMany(transaksiItem::class);
    }

    public function payment()
    {
        return $this->hasOne(pembayaran::class);
    }

}
