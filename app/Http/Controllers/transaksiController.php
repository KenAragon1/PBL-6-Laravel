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

    public function buatPesanan(Request $request) {
        $id_produk_values = $request->input('id_produk');
        $id_pengguna_values = $request->input('id_pengguna');
        $jumlah_produk_values = $request->input('jumlah_produk');
        $total_transaksi_values = $request->input('total_transaksi');
        $jenis_pembayaran = $request->input('jenis_pembayaran');
        $tgl_pemesanan = Carbon::now()->format('l, d-F-Y , H:i:s');
        $estimasi_waktu = Carbon::now()->addDays(5);
        
        if ($jenis_pembayaran == 'COD') {
            $status_pengiriman = "Pesanan Akan Dikirim";
            foreach ($id_produk_values as $key => $value) {
                transaksi::create([
                    'id_pemesanan' => rand(1, 100000000),
                    'id_produk' => $value,
                    'id_pengguna' => $id_pengguna_values[$key],
                    'jumlah_produk' => $jumlah_produk_values[$key],
                    'total_transaksi' => $total_transaksi_values[$key],
                    'jenis_pembayaran' => $jenis_pembayaran,
                    'tgl_pemesanan' => $tgl_pemesanan ,
                    'estimasi_waktu' => $estimasi_waktu,
                    'status_pengiriman' => $status_pengiriman
                    
                ]);
            }
        } else {
            $status_pengiriman = "Menunggu Pembayaran";
            foreach ($id_produk_values as $key => $value) {
                transaksi::create([
                    'id_pemesanan' => rand(1, 100000000),
                    'id_produk' => $value,
                    'id_pengguna' => $id_pengguna_values[$key],
                    'jumlah_produk' => $jumlah_produk_values[$key],
                    'total_transaksi' => $total_transaksi_values[$key],
                    'jenis_pembayaran' => $jenis_pembayaran,
                    'tgl_pemesanan' => $tgl_pemesanan ,
                    'estimasi_waktu' => $estimasi_waktu,
                    'status_pengiriman' => $status_pengiriman
                    
                ]);
            }
        }
        
        return redirect('/pesanan');

        
    }

    

    // ! DAFTAR PESANAN
    public function daftarPesanan() { 

        // $data = transaksi::all()->where('id', $id);
        $data = transaksi::where('id_pengguna', Auth::user()->id_pengguna)->get();
        return view('/pesanan', compact('data'));
    }

    public function buktiBayar($id_pemesanan){

        $data = transaksi::find($id_pemesanan);
// dd($data);
        return view('bukti_pembayaran', compact('data'));
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

    public function detailPesanan($id_pemesanan){
        $pesanan = transaksi::find($id_pemesanan);

        
        return view('detail-pesanan', compact('pesanan'));
    }
}
