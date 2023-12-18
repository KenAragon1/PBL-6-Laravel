<?php

namespace App\Models;
use Laravel\Sanctum\HasApiTokens;
// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;
    
    
    
    protected $primaryKey = 'id_pengguna';
    protected $table = 'pengguna';
    protected $guarded   = [''];
    public $timestamps = false;
    
    
    public function produk()
    {
    return $this->hasMany(produk::class, 'id_produk');
    }
    public function transaksi()
    {
    return $this->hasMany(transaksi::class, 'id_pemesanan');
    }
    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */

    protected $hidden = [
        'password',
        'remember_token',
    ];


    protected $casts = [
        'email_verified_at' => 'datetime',

    ];
    
    
}
