@extends('templates.nav-footer')

@section('content')
    <div class="container text-center w-75 bg-white card shadow p-4" style="min-height: 100vh;">
        @if (session()->has('sukses'))
        <div class="alert alert-success alert-dismissible fade show mt-3" role="alert">
            <strong>{{ session('sukses') }}!</strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        <div class="row border-bottom mb-3 text-muted px-3">
            <div class="col-5">
                <p>Produk</p>
            </div>
            <div class="col-2">
                <p>Harga per Item</p>
            </div>
            <div class="col-1">
                <p>Jumlah</p>
            </div>
            <div class="col-2">
                <p>Total Harga</p>
            </div>
            <div class="col-2">
                Aksi
            </div>
        </div>
        @foreach ($cartWithProduks as $produk)
            <div class="mb-4 row d-flex align-items-center rounded p-3 border-bottom">
                <div class="col-2 d-flex">
                    <input type="checkbox" name="" id="" />
                    <img src="{{ asset('images/foto-produk') }}/{{ $produk->foto_produk }}"
                        class="img-fluid rounded-3 mx-3" />
                </div>
                <div class="col-3">
                    <p class="lead fw-normal mb-2">
                        <a href="{{ url('/produk-detail') }}" class="">
                            {{ $produk->nama_produk }}
                        </a>
                    </p>
                </div>
                <div class="col-2">
                    <p class="mb-0 text-success">Rp {{ $produk->harga }},-</p>
                </div>
                <div class="col-1">
                    <p class="mb-0">{{ $produk->jumlah_produk }}</p>
                </div>
                <div class="col-2">
                    <p class="mb-0">Rp {{ $produk->jumlah_produk * $produk->harga }},-</p>
                </div>
                <div class="col-2 d-flex justify-content-center">
                    <a href="/checkout/{{ $produk->id_keranjang }}" class="btn btn-success">
                        <i class="bi bi-cart"></i>
                    </a>
                    <form action="{{ url('keranjang/' . Auth::user()->id_pengguna . '/' . $produk->id_produk) }}"
                        method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">
                            <i class="bi bi-trash"></i>
                        </button>
                    </form>
                    <a href="{{ url('keranjang/' . $produk->id_keranjang) }}"></a>


                </div>
            </div>
        @endforeach



    </div>
@endsection
