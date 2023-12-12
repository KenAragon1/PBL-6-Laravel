<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;
use App\Models\produk;
use App\Models\Cart;

class cartController extends Controller
{
    public function show($id_pengguna){
        // cari barang yang memiliki id pengguna user tertentu
        $cart = Cart::where('id_pengguna', $id_pengguna)->get();

        // 
        $produks = produk::find($cart);

        return view('keranjang', compact('produks'));


    }

    public function addToCart(Request $request, $id_produk, $id_pengguna) {
        
        $valid = $request->validate([
            'id_pengguna' => 'required',
            'id_produk' => 'required',
            
        ]);

        $valid['id_produk'] = 123;

        if (Cart::create($valid)) {
            return redirect('/keranjang/{id_pengguna}');
        }
    }
}
