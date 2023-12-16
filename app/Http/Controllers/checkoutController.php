<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\User;
use App\Models\produk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class checkoutController extends Controller
{
    public function index(Request $request, $id_keranjang){
        
        // $item = Cart::where('id_keranjang', $id_keranjang );
        $items = DB::table('keranjang')
            ->join('produk', 'keranjang.id_produk', '=', 'produk.id_produk')
            ->select('keranjang.*', 'produk.*')
            ->where('keranjang.id_keranjang', $id_keranjang)
            ->get();
        
        // dd($items);
        
        
        return view('/checkout', compact('items'));   
    }

    

    public function alamat(Request $request, $id_pengguna){
        // $this->validate($request, [
        //     'provinsi' => 'required',
        //     'kota' => 'required',
        //     'kecamatan' => 'required',
        //     'kodepos' => 'required',
        //     'detail1' => 'required',
        //     'detail2' => 'required'
        // ]);

        $user = User::findOrFail($id_pengguna);
        $user->update([
                'alamat' => $request->provinsi.', '.$request->kota.', '.$request->kecamatan.', '.$request->kodepos.', '
                            .$request->detail1.', '.$request->detail2.'.'
            ]);
        

        return back()->with('sukses', 'Alamat Baru Telah di Set.');

    }
}
