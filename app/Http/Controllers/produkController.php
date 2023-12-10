<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\produk;

class produkController extends Controller
{
    public function index() {
        $produks = produk::all();
        
        return view('index', compact('produks'));
    }

    public function show($id) {
        $produk = produk::find($id);

        return view('produk-detail', compact('produk'));
    }
}
