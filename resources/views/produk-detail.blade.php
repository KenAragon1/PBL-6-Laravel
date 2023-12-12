@extends('templates.nav-footer')

@section('content')

    <div class="container card mb-3 p-4 shadow">
        <div class="row gx-4 gx-lg-5">
            <div class="col-md-5 d-flex h-100">
                <img class="card-img-top mb-5 mb-md-0 align-self-start sticky-top"
                    src="{{ asset('images/foto-produk') }}/{{ $produk->foto_produk }}" alt="..." style="z-index: 0" />
            </div>
            <div class="col-md-7">
                <h2>{{ $produk->nama_produk }}</h2>

                <h1 class="text-success p-2">Rp {{ $produk->harga }} ,-</h1>
                @auth
                    <form action="{{ url('/keranjang/tambah/' . Auth::user()->id_pengguna)}}"
                        method="post" enctype="multipart/form-data">
                        @csrf
                        <input type="text" name="id_keranjang" style="display: none" value="{{ rand(1,1000000) }}">
                        <input type="text" name="id_produk" style="display: none" value="{{ $produk->id_produk }}">
                        <input type="text" name="id_pengguna" style="display: none" value="{{ Auth::user()->id_pengguna }}">
                        <button type="submit" class="btn btn-success p-3">
                            Tambahkan ke keranjang
                        </button>
                    </form>
                    {{-- <a href="{{ url('/keranjang/tambah/' . Auth::user()->id_pengguna). '/'. $produk->id_pro}}">Tambahkan ke keranjang</a> --}}
                @endauth
                <a href="{{ url('/checkout') }}" class="btn btn-success px-5 py-3">Beli Sekarang</a>
            </div>
        </div>
    </div>

    <div class="container card mb-4 p-4 shadow" style="overflow: inherit">
        <h1>Deskripsi Produk</h1>
        <div style="white-space: pre-line">
            {{ $produk->deskripsi }}
        </div>
    </div>
@stop
