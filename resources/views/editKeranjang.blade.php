@extends('templates.nav-footer')

@section('content')

    <div class="container card mb-3 p-4 shadow">
        <div class="row gx-4 gx-lg-5">
            <div class="col-md-5 d-flex h-100">
                <img class="card-img-top mb-5 mb-md-0 align-self-start sticky-top"
                    src="{{ asset('images/foto-produk/'.$produk[0]->foto_produk) }}" alt="..." style="z-index: 0" />
            </div>
            <div class="col-md-7">
                <h2>{{ $produk[0]->nama_produk }}</h2>

                <h1 class="text-success p-2">Rp {{ $produk[0]->harga }} ,-</h1>
                @auth
                    
                        <div class="d-flex">
                            <form action="/keranjang/editCart/{{ $produk[0]->id_keranjang }}" method="post"
                                enctype="multipart/form-data" class="d-flex w-50">
                                @csrf
                                {{-- <input type="text" name="harga" style="display: none" value="{{ $produk->harga }}"> --}}
                                <input class="form-control w-25" type="number" name="jumlah_produk" value="{{ $produk[0]->jumlah_produk }}" min="1">
                                <button type="submit" class="btn btn-success p-3 mx-3">
                                    Edit Belanjaan
                                </button>
                            </form>

                        </div>
                    {{-- <a href="{{ url('/keranjang/tambah/' . Auth::user()->id_pengguna). '/'. $produk->id_pro}}">Tambahkan ke keranjang</a> --}}
                @endauth
            </div>
        </div>
    </div>

    <div class="container card mb-4 p-4 shadow" style="overflow: inherit">
        <h1>Deskripsi Produk</h1>
        <div style="white-space: pre-line">
            {{ $produk[0]->deskripsi }}
        </div>
    </div>
@stop
