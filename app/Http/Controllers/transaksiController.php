<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Cart;
use App\Models\produk;
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
                // $keranjang = Cart::findOrFail($request->id_keranjang);
                // $keranjang->delete();

                return redirect('/pesanan')->with('sukses', 'Berhasil Membuat Pesanan');
            } else {
                return back()->with('error', 'Gagal Membuat Pemesanan');
            }
        } else {
            // $keranjang = Cart::findOrFail($request->id_keranjang);
            // $keranjang->delete();

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

        // $data = transaksi::all()->where('id', $id);
        $data = transaksi::where('id_pengguna', Auth::user()->id_pengguna)->get();
        return view('/pesanan', compact('data'));
    }

    public function buktiBayar($id_pemesanan, $id_produk){

        $data = transaksi::find($id_pemesanan);
        $penjual = produk::find($id_produk);
// dd($data);
        return view('bukti_pembayaran', compact('data', 'penjual'));
    }

    public function uploadBukti(Request $request, $id_pemesanan){
        $this->validate($request, [
            'jenis_pembayaran' => 'required',
            'bukti_pembayaran' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $id = transaksi::findOrFail($id_pemesanan);

        if($request->hasFile('bukti_pembayaran')){

            $bukti = $request->file('bukti_pembayaran');
            // $bukti->hashName();
            $bukti->storeAs('bukti_pembayaran', $bukti->hashName());
    
            $id->update([
                'jenis_pembayaran' => 'Transfer Bank '.$request->jenis_pembayaran,
                'bukti_pembayaran' => $bukti->hashName(),
                'status_pengiriman' => 'Pesanan Akan Dikirim',
                'estimasi_waktu' => Carbon::now()->addDays(5)
            ]);
    
            return redirect('/pesanan')->with('sukses', 'Berhasil Mengupload Bukti Pembayaran.');
        }
    }

    public function detailPesanan($id_pemesanan, $id_produk){
        $pesanan = transaksi::find($id_pemesanan);
        $produk = produk::find($id_produk);

        
        return view('detail-pesanan', compact('pesanan', 'produk'));
    }
}
