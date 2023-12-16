<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;

    protected $table = 'keranjang';

    protected $primaryKey = 'id_keranjang';

    protected $guarded = [''];

    public $timestamps = false;

    public function produk()
    {
    return $this->belongsTo(produk::class, 'id_produk');
    }

    public function transaksi(){
        return $this->hasMany(transaksi::class, 'id_transaksi');
    }




}
