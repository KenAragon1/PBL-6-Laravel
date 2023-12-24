<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class riwayatPesanan extends Model
{
    protected $table = 'riwayat_transaksi';

    protected $guarded = ['id'];

    public $timestamps = false;

}
