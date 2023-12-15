<?php

namespace App\Http\Controllers;

use App\Models\Cart;

use App\Models\User;
use App\Models\produk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class cartController extends Controller
{
    public function show($id_pengguna)
    {
        // cari barang yang memiliki id pengguna user tertentu
        // $cart_produks = Cart::where('id_pengguna', $id_pengguna)->get();

        // $produks = produk::find($cart_produks);
        
        // $produks = Cart::with('produk')->where('id_pengguna', $id_pengguna)->get();

        $produks = DB::table('keranjang')
            ->join('produk', 'keranjang.id_produk', '=', 'produk.id_produk')
            ->select('keranjang.*', 'produk.*')
            ->where('keranjang.id_pengguna', $id_pengguna)
            ->get();

        return view('keranjang', compact('produks'));
        
    }

    public function addToCart(Request $request, $id_pengguna)
    {

        $valid = $request->validate([
            'id_keranjang' => '',
            'id_pengguna' => 'required',
            'id_produk' => 'required'

        ]);

        if (Cart::create($valid)) {
            return redirect('/keranjang/' . $id_pengguna);
        } else {
            echo "Eror";
        }


    }

    public function destroy(Cart $cart, $id_pengguna, $id_produk)
    {
        $cart = Cart::where('id_pengguna', $id_pengguna)->where('id_produk', $id_produk)->get('id_keranjang');
        $cart->first()->delete();
        return back()->with('sukses', 'Berhasil Hapus Data.');
    }
}
