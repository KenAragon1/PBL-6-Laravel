<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class produk extends Model
{
    use HasFactory;

    protected $table = 'produk';

    protected $primaryKey = 'id_produk';

    protected $fillable = ['id_penjual', 'id_produk', 'nama_produk', 'kategori', 'harga', 'deskripsi', 'foto_produk'];

    public $timestamps = false;

    public function cart()
    {
    return $this->hasMany(Cart::class);
    }
    

}
