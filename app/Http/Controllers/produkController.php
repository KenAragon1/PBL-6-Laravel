<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\produk;

class produkController extends Controller
{
    public function index()
    {
        $produks = produk::all();

        return view('index', compact('produks'));
    }

    public function show($id)
    {
        $produk = produk::find($id);

        return view('produk-detail', compact('produk'));
    }

    public function create()
    {
        $produks = produk::all();
        return view('admin-produk', compact('produks'));
    }

    public function store(Request $request)
    {
        $valid = $request->validate([
            'nama_produk'=> 'required',
            'kategori'=> 'required',
            'harga'=> 'required',
            'deskripsi'=> 'required',
        ]);

        $valid['id_produk'] = rand(100000000,999999999);
        $valid['id_penjual'] = rand(100000000,999999999);

        if(produk::create($valid)){
            return redirect('/dashboard/produk')->with('sukses', 'Tambah produk Berhasil.');  
        }
        return redirect('/');

    }
}
