@extends('templates.nav-footer')

@section('content')
    <div class="container">
        <div class="row">
            <div class="container col-9 bg-white card shadow p-4" style="min-height: 100vh;">
                @if (session()->has('sukses'))
                    <div class="alert alert-success alert-dismissible fade show mt-3" role="alert">
                        <strong>{{ session('sukses') }}</strong>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
                @php
                    $no = 1;
                @endphp
                <form action="{{ url('/checkout')}}" id="checkout" method="GET">
                    @csrf
                    @foreach ($cartWithProduks as $produk)
                        <div class="mb-4 row d-flex align-items-center rounded p-3 border-bottom">
                            <div class="col-1">
                                <input type="checkbox" name="id_produk[]" class="form-check-input"
                                    data-harga="{{ $produk->harga }}" id="js-produk-checkbox"
                                    value="{{ $produk->id_produk }}">   
                            </div>
                            <div class="col-2 d-flex">
                                <label for="{{ $produk->id_produk }}">
                                    <img src="{{ asset('images/foto-produk') }}/{{ $produk->foto_produk }}"
                                        class="img-fluid rounded-3 mx-1" />
                                </label>
                            </div>
                            <div class="col-7">
                                <p class="lead fw-normal mb-2">
                                    <a href="{{ url('/produk-detail/' . $produk->id_produk) }}" class="text-start text-dark"
                                        style="display:inline-block;width:100%;white-space:nowrap; overflow:hidden; text-overflow:ellipsis;">
                                        {{ $produk->nama_produk }}
                                    </a>
                                </p>
                                <p class="mb-0 text-success"><span class="text-muted">Harga :</span> Rp
                                    {{ $produk->harga }},-
                                </p>

                                <p class="mb-0"><span class="text-muted">Jumlah :</span></p>
                                <div class="d-flex mb-4" style="max-width: 300px">
                                    <button class="btn btn-success me-2" type="button" id="js-btn-jlh"
                                        onclick="this.parentNode.querySelector('input[type=number]').stepDown()">
                                        <i class="bi bi-dash"></i> </button>
                                    <div class="form-outline">
                                        <input min="1" name="jumlah_produk[]" value="{{ $produk->jumlah_produk }}"
                                            type="number" class="form-control" id="js-produk-kuantitas"
                                            style="width: 4rem" disabled/>
                                    </div>
                                    <button class="btn btn-success ms-2" type="button" id="js-btn-jlh"
                                        onclick="this.parentNode.querySelector('input[type=number]').stepUp()">
                                        <i class="bi bi-plus"></i> </button>
                                </div>

                            </div>
                            <div class="col-2 d-flex justify-content-center ">
                                <button type="submit" form="{{ $produk->id_produk }}" class="btn btn-danger">
                                    <i class="bi bi-trash"></i>
                                </button>

                            </div>
                        </div>
                    @endforeach
                </form>

                {{-- form delete --}}
                @foreach ($cartWithProduks as $produk)
                    <form hidden action="{{ url('keranjang/' . Auth::user()->id_pengguna . '/' . $produk->id_produk) }}"
                        id="{{ $produk->id_produk }}" method="POST">
                        @csrf
                        @method('DELETE')

                    </form>
                @endforeach
            </div>

            {{-- info harga total --}}
            <div class="col-3">
                <div class="card bg-white shadow p-2" style="position: fixed; width: 17rem;">
                    <div class="card-header bg-white">
                        <h4 class="text-muted">Total Harga</h4>
                    </div>
                    <div class="card-body">
                        <h2 class="text-success mb-2">Rp <span id="js-total-harga"></span> ,-</h2>
                        <button class="btn btn-success btn-lg w-100" form="checkout" id="js-checkout-btn">Checkout</button>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <script>
        ;
        let produkCheckbox = document.querySelectorAll('#js-produk-checkbox');
        let produkKuantitasInput = document.querySelectorAll('#js-produk-kuantitas');
        let btnJlh = document.querySelectorAll('#js-btn-jlh')

        produkCheckbox.forEach(function(produkCheck) {
            produkCheck.addEventListener('change', updateTotal);
        });

        produkKuantitasInput.forEach(function(produkJlh) {
            produkJlh.addEventListener('change', updateTotal);
        });

        btnJlh.forEach(function(btn) {
            btn.addEventListener('click', updateTotal);
        });

        function updateTotal() {
            let totalPriceElement = document.querySelector('#js-total-harga');
            let totalPrice = 0;

            produkCheckbox.forEach(function(produkCheck, i) {
                let produkKuantitas = parseFloat(produkKuantitasInput[i].value);
                if (produkCheck.checked) {
                    totalPrice += parseFloat(produkCheck.getAttribute('data-harga')) * produkKuantitas;
                    produkKuantitasInput[i].disabled = false;
                } else {
                    produkKuantitasInput[i].disabled = true;

                }
            });

            document.querySelector("#js-total-harga").innerText = totalPrice;
        }
    </script>
@endsection
