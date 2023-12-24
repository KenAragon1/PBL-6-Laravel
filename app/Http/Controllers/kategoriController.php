<?php

namespace App\Http\Controllers;

use App\Models\produk;
use App\Models\kategori;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class KategoriController extends Controller
{

    public function tampil(){
        $kategori = kategori::all();
        $produk = produk::all();
        return view('kategori', compact('kategori', 'produk'));
    }
    public function tambah(Request $request){
        $this->validate($request, [
            'kategori' => 'required',
        ]);

        kategori::create([
            'kategori' => $request->kategori,
        ]);
        return back()->with('sukses', 'Berhasil Menambahkan Kategori Baru.');
    }

    public function tampilKategori($id_kategori){
        $produk = produk::where('id_kategori', $id_kategori)->get();
        return view('kategori-detail', compact('produk'));
    }

}
