<?php

namespace App\Http\Controllers;

use App\Models\Cart;

use App\Models\User;
use App\Models\produk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class cartController extends Controller
{
    public function show()
    {
       
        $cartWithProduks = Produk::join('keranjang', 'produk.id_produk', '=', 'keranjang.id_produk')
        ->select('produk.*', 'keranjang.*')
        ->where('keranjang.id_pengguna', Auth::user()->id_pengguna)
        ->get();
        // dd($cartWithProduks);
        return view('keranjang', compact('cartWithProduks'));

    }

    public function addToCart(Request $request, $id_produk)
    {

        $valid = $request->validate([
            'harga' => 'required',
            'id_produk' => 'required',
            'jumlah_produk' => 'required',
        ]);

        $valid['id_pengguna'] = Auth::user()->id_pengguna;
        $valid['id_keranjang'] = rand(1, 1000000);

        $cekProdukCart = Cart::where('id_produk', $id_produk)
                                ->where('id_pengguna', Auth::user()->id_pengguna)->first();
        if(!$cekProdukCart){
            if (Cart::create($valid)) {
                return redirect('/keranjang')->with('sukses', 'Berhasil Menambahkan Produk Ke Keranjang.');
            } else {
                return back()->with('error', 'Gagal Menambahkan Produk Ke Keranjang.');
            }
        } else {
            $cekProdukCart->jumlah_produk += $valid['jumlah_produk'];
            $cekProdukCart->save();
            return redirect('/keranjang')->with('sukses', 'Mengupdate Keranjang Dikarenakan Produk yang sama telah ada.');

        }

        
        // dd($valid);


    }

    public function editCart($id){

        
        $produk = DB::table('keranjang')
            ->join('produk', 'keranjang.id_produk', '=', 'produk.id_produk')
            ->select('keranjang.*', 'produk.*')
            ->where('keranjang.id_keranjang', $id)
            ->get();
            // dd($produk);
        return view('/editKeranjang', compact('produk'));

    }
    public function updateCart(Request $request, $id){

        $data = $request->validate([
            'jumlah_produk' => 'required',
        ]);
        $id = Cart::findOrFail($id);
        $id->update($data);        

        return redirect('/keranjang')->with('sukses', 'Berhasil Ubah Keranjang.');

    }

    public function destroy(Cart $cart, $id_pengguna, $id_produk)
    {
        $cart = Cart::where('id_pengguna', $id_pengguna)->where('id_produk', $id_produk)->get('id_keranjang');
        $cart->first()->delete();
        return back()->with('sukses', 'Berhasil Hapus Data.');
    }
}
