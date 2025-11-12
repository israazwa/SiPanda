<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class kategori extends Model
{
    protected $table = 'categories';
    //
    protected $fillable = ['name'];

    public function products()
    {
        return $this->hasMany(produk::class);
    }

}
