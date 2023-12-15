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
            'id_pemesanan' => '',
            'id_produk' => 'required',
            'id_pengguna'=>'required',
            'id_keranjang' => 'required',
            'jenis_pembayaran' => 'required',
        ]);

        $data['id_pemesanan'] = rand(1, 1000000);
        $data['tgl_pemesanan'] = Carbon::now()->format('l, d-F-Y , H:i:s');
        $data['estimasi_waktu'] = Carbon::now()->addDays(5);
        

        if($data['jenis_pembayaran'] == 'COD'){
            $data['status_pengiriman'] = 'Pesanan Akan dikirim';
            if(transaksi::create($data)){

                return redirect('/pesanan')->with('sukses', 'Berhasil Membuat Pesanan');
            } else {
                return back()->with('error', 'Gagal Membuat Pemesanan');
            }
        } else {
            $data['status_pengiriman'] = 'Menunggu Pembayaran';
            if(transaksi::create($data)){

                return redirect('/pesanan')->with('warning', 'Berhasil Menambah Pesanan, Silahkan Lengkapi Bukti Pembayaran Sesuai Bank yang Telah Anda Pilih.');
            } else {
                return back()->with('error', 'Gagal Membuat Pemesanan');
            }
        }
    }


    // ! DAFTAR PESANAN
    public function daftarPesanan() { 

        $data = transaksi::all();
        return view('/pesanan', compact('data'));
    }
}
