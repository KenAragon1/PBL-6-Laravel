<?php

namespace App\Models;

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
    

}
