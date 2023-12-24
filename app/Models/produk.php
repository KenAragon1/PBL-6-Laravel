<?php

namespace App\Models;

use App\Http\Controllers\produkController;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class produk extends Model
{
    use HasFactory;

    protected $table = 'produk';

    protected $primaryKey = 'id_produk';

    protected $guarded = [''];

    public $timestamps = false;

    public function cart()
    {
        return $this->hasMany(Cart::class, 'id_keranjang');
    }
    public function transaksi()
    {
        return $this->hasMany(transaksi::class, 'id_pemesanan');
    }
    public function pengguna()
    {
        return $this->belongsTo(User::class, 'id_pengguna');
    }
    public function kategori(){
        return $this->belongsTo(kategori::class, 'id_kategori');
    }
    

}
