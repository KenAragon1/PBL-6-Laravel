@extends('templates.nav-footer')

@section('content')
    
    @foreach ($produks as $produk)
        <div class="container w-75 bg-white card shadow p-4">
        <div class="card rounded- mb-4">
            <div class="card-body">
                <div class="row d-flex justify-content-between align-items-center">
                    <div class="col-md-1">
                        <input type="checkbox" name="" id="" />
                    </div>
                    <div class="col-md-2">
                        <img src="{{ asset('images/foto-produk') }}/{{ $produk->foto_produk }}" class="img-fluid rounded-3" />
                    </div>
                    <div class="col-md-3">
                        <p class="lead fw-normal mb-2">
                            <a href="{{ url('/produk-detail') }}" class="product-anchor">
                                {{$produk->nama_produk}}
                            </a>
                        </p>
                    </div>
                    <div class="col-md-4">
                        <h5 class="mb-0">Rp {{$produk->harga}},-</h5>
                    </div>
                    <div class="col-md-2">
                        <a href="checkout.html" class="btn btn-success">
                            <i class="bi bi-cart"></i>
                        </a>
                        <button class="btn btn-danger">
                            <i class="bi bi-trash"></i>
                        </button>
                    </div>

                </div>
            </div>
        </div>
    </div>
    @endforeach
@endsection
