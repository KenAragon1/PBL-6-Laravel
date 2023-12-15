<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\transaksi;
use Illuminate\Http\Request;
use PhpParser\Node\Stmt\Return_;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class transaksiController extends Controller
{
    public function store(Request $request){
        
        $data = $request->validate([
            'id_keranjang' => '',
            'id_produk' => 'required',
            'id_pengguna'=>'required',
            'id_keranjang' => 'required',
            'jenis_pembayaran' => 'required',
            'tgl_pemesanan' => '',
            'estimasi_waktu' => '',
            
        ]);

        $data['id_pemesanan'] = rand(1, 1000000);
        $data['tgl_pemesanan'] = Carbon::now()->format('l, d-F-Y , H:i:s');
        $data['estimasi_waktu'] = Carbon::now()->addDays(5);

        if($data['jenis_pembayaran'] == 'COD'){
            if(transaksi::create($data)){
                return redirect('/')->with('sukses', 'Berhasil Membuat Pesanan');
            } else {
                return redirect('/')->with('sukses', 'Gagal Membuat Pemesanan');
            }
        } else {
            return redirect('/transaksi/pemesanan/bukti_pembayaran');
        }
    }
}
