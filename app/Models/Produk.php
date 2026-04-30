<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    use HasFactory;


    public function produk()
{
    return $this->belongsTo(Produk::class, 'produk_id', 'id');
}

    protected $table = 'produk';

    protected $fillable = [
        'name_produk',
        'harga',
        'deskripsi',
        'gambar_product',
    ];
    public $timestamps= false;
}
