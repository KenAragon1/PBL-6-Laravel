<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class transaksi extends Model
{
    use HasFactory;
    protected $table = 'transaksi';
    protected $primaryKey = 'id_pemesanan';
    protected $guarded = ['id_keranjang'];
    public $timestamps = false;

    public function cart(){
        return $this->belongsTo(Cart::class, 'id_keranjang');
    }
    public function produk(){
        return $this->belongsTo(produk::class, 'id_produk');
    }
    public function pembeli(){
        return $this->belongsTo(User::class, 'id_pengguna');
    }
    
}
