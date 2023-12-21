<?php

namespace App\Http\Controllers;

use App\Models\produk;
use App\Models\transaksi;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class pesananPenjual extends Controller
{
    public function pesanan(){
        //ambil produk sesuai penjual
        $dataproduk = produk::where('id_pengguna', Auth::user()->id_pengguna)->get();
        // ambil hasil seluruh produknya
        $produks = $dataproduk->pluck('id_produk'); // Mengambil ID produk dari hasil query sebelumnya
        // ambil di transaksi semua id produk dengan penjual yg sama
        // with relasi pembeli dimana data" idpengguna/pembeli bisa diambil juga
        $datafinal = transaksi::whereIn('id_produk', $produks)
        ->with('pembeli')
        ->with('produk')
        ->with('cart')->get();

        // dd($datafinal);
        return view('admin-pesanan', compact('datafinal'));
    }

    public function detail($id_pemesanan){

        $trans = transaksi::find($id_pemesanan);
        return view('penjual.detail_pesanan', compact('trans'));
    }

    public function kirim($id_pemesanan){

        $id = transaksi::findOrFail($id_pemesanan);

        $id->update([
            'status_pengiriman'=> 'Pesanan Sudah Dikirim oleh Penjual', 

        ]);

        return back()->with('sukses', 'Mengirim Pesanan ke Pembeli. ');
    }

    public function terima(Request $request, $id_pemesanan){
        $id = transaksi::findOrFail($id_pemesanan);
        $id->update([
            'status_pengiriman' => 'Pesanan Telah Sampai di Tangan Pembeli',
            'tgl_selesai' => Carbon::now(),
        ]);
        return back()->with('sukses', 'Terimakasih, ' . Auth::user()->nama . ' Sudah Membeli Produk Kita.');
    }

    public function riwayat(){
        return view('/riwayat-pesanan');
    }
}
