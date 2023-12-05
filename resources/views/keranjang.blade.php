@extends('templates.nav-footer')

@section('content')
    <div class="container w-75 bg-white card shadow p-4">
        <div class="card rounded- mb-4">
            <div class="card-body">
                <div class="row d-flex justify-content-between align-items-center">
                    <div class="col-md-1">
                        <input type="checkbox" name="" id="" />
                    </div>
                    <div class="col-md-2">
                        <img src="item.image" class="img-fluid rounded-3" />
                    </div>
                    <div class="col-md-3">
                        <p class="lead fw-normal mb-2">
                            <a href="{{ url('/produk-detail') }}" class="product-anchor">
                                Asus TUF
                            </a>
                        </p>
                        <p>
                            <span class="text-muted">Warna:</span>
                            Hitam
                        </p>
                    </div>
                    <div class="col-md-4">
                        <h5 class="mb-0">Rp 13.500.000,-</h5>
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
@endsection
