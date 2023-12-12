<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;

    protected $table = 'keranjang';

    protected $primaryKey = 'id_pengguna';

    protected $fillable = ['id_pengguna', 'id_barang'];

    public $timestamps = false;
}
