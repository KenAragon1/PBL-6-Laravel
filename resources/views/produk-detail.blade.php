@extends('templates.nav-footer')

@section('content')

    <div class="container card mb-3 p-4 shadow">
        <div class="row gx-4 gx-lg-5">
            <div class="col-md-5 d-flex h-100">
                <img class="card-img-top mb-5 mb-md-0 align-self-start sticky-top" src="/assets/template-produk.png"
                    alt="..." />
            </div>
            <div class="col-md-7">
                <h2>Asus TUF</h2>
                <h1 class="text-success p-2">Rp 13.500.000 ,-</h1>

                <button class="btn btn-success p-3">
                    Tambahkan ke keranjang
                </button>
                <a href="{{url('/checkout')}}" class="btn btn-success px-5 py-3">Beli Sekarang</a>
            </div>
        </div>
    </div>
@stop
