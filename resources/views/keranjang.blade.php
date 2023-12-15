@extends('templates.nav-footer')

@section('content')
    <div class="container w-75 bg-white card shadow p-4">
        @if (session()->has('sukses'))
        <div class="alert alert-success alert-dismissible fade show mt-3" role="alert">
            <strong>{{ session('sukses') }}!</strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
        @foreach ($produks as $produk)
            <div class="card rounded- mb-4">
                <div class="card-body">
                    <div class="row d-flex justify-content-between align-items-center">
                        <div class="col-md-1">
                            <input type="checkbox" name="" id="" />
                        </div>
                        <div class="col-md-2">
                            <img src="{{ asset('images/foto-produk') }}/{{ $produk->foto_produk }}"
                                class="img-fluid rounded-3" />
                        </div>
                        <div class="col-md-3">
                            <p class="lead fw-normal mb-2">
                                <a href="{{ url('/produk-detail') }}" class="product-anchor">
                                    {{ $produk->nama_produk }}
                                </a>
                            </p>
                        </div>
                        <div class="col-md-4">
                            <h5 class="mb-0">Rp {{ $produk->harga }},-</h5>
                        </div>
                        <div class="col-md-2">
                            {{-- <a href="/checkout/{{ $produk->id_pengguna }}" class="btn btn-success"> --}}
                            <a href="/checkout/{{ $produk->id_keranjang }}" class="btn btn-success">
                                <i class="bi bi-cart"></i>
                            </a>
                            <form action="{{ url('keranjang/' . Auth::user()->id_pengguna .'/'. $produk->id_produk ) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">
                                    <i class="bi bi-trash"></i>
                                </button>
                            </form>
                            <a href="{{ url('keranjang/' . $produk->id_keranjang) }}"></a>
                        </div>

                    </div>
                </div>
            </div>
        @endforeach

    </div>
@endsection
