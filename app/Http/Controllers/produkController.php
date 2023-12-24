<?php

namespace App\Http\Controllers;

use App\Models\kategori;
use App\Models\produk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class produkController extends Controller
{
    public function index()
    {
        $produks = produk::all();

        return view('index', compact('produks'));
    }

    public function show($id)
    {
        $produk = produk::with('kategori')->find($id);
        return view('produk-detail', compact('produk'));
    }

    public function create($id_pengguna)
    {
        
        $produk =produk::where('id_pengguna', $id_pengguna)->get();
        // $produks = produk::find($produk);
        // dd($produks);
        $kategori = kategori::all();
        return view('admin-produk', compact('produk', 'kategori'));

    }

    public function store(Request $request)
    {
        $valid = $request->validate([
            'foto_produk' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'nama_produk' => 'required',
            'id_kategori' => 'required',
            'harga' => 'required',
            'deskripsi' => 'required',
            'stok' => 'required',
        ]);

        $image = $request->file('foto_produk');
        $image->storeAs('foto-produk', $image->hashName());

        $valid['foto_produk'] = $image->hashName();
        $valid['id_produk'] = rand(10000, 99999);
        $valid['id_pengguna'] = Auth::user()->id_pengguna;

        if (produk::create($valid)) {
            return redirect('/dashboard/produk/'.Auth::user()->id_pengguna)->with('sukses', 'Tambah produk Berhasil.');
        }
        return redirect('/')->with('gagal', 'Tambah produk gagal.');

    }

    public function edit(produk $produk, $id)
    {
        $produk = produk::find($id);
        $kategori = kategori::all();
        return view('admin-edit-produk', compact('produk', 'kategori'));
    }

    public function update(Request $request, produk $produk, $id)
    {
        $this->validate($request, [
            'foto_produk' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'nama_produk' => 'required',
            'id_kategori' => 'required',
            'harga' => 'required',
            'deskripsi' => 'required',
            'stok' => 'required',
        ]);

        $produk = Produk::findOrFail($id);

        if ($request->hasFile('foto_produk')) {
            $image = $request->file('foto_produk');
            $image->storeAs('foto-produk', $image->hashName());

            File::delete(public_path('images/foto-produk/' . $produk->foto_produk));

            $produk->update([
                'foto_produk' => $image->hashName(),
                'nama_produk' => $request->nama_produk,
                'id_kategori' => $request->id_kategori,
                'harga' => $request->harga,
                'deskripsi' => $request->deskripsi,
                'stok' => $request->stok,
            ]);
        } else {
            $produk->update([
                'nama_produk' => $request->nama_produk,
                'id_kategori' => $request->id_kategori,
                'harga' => $request->harga,
                'deskripsi' => $request->deskripsi,
                'stok' => $request->stok,
            ]);
        }

        return redirect()->route('produk-penjual', Auth::user()->id_pengguna)->with('sukses1', 'Berhasil Edit Produk.');

    }

    public function destroy(produk $produk, $id)
    {
        $produk = Produk::findOrFail($id);
        File::delete(public_path('images/foto-produk/' . $produk->foto_produk));
        $produk->delete();
        return redirect()->route('produk-penjual', Auth::user()->id_pengguna);
    }

    // halaman produk pembeli
    public function produk_pembeli()
    {
        $produks = produk::all();
        return view('produk-pembeli', compact('produks'));
    }

    public function cariProduk(Request $request) 
    {
        $cari_produk = $request->input('cari_produk');

        $produks = produk::where('nama_produk', 'like', "%$cari_produk%")->orWhere('deskripsi', 'like', "%$cari_produk%")->get();
        return view('search-result' ,compact('produks', 'cari_produk'));
    }

}
