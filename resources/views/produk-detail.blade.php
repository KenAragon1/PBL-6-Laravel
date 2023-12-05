@extends('templates.nav-footer')

@section('content')

    <div class="container card mb-3 p-4 shadow">
        <div class="row gx-4 gx-lg-5">
            <div class="col-md-5 d-flex h-100">
                <img class="card-img-top mb-5 mb-md-0 align-self-start sticky-top" src="/assets/template-produk.png"
                    alt="..." style="z-index: 0"/>
            </div>
            <div class="col-md-7">
                <h2>Asus TUF</h2>
                <h1 class="text-success p-2">Rp 13.500.000 ,-</h1>

                <button class="btn btn-success p-3">
                    Tambahkan ke keranjang
                </button>
                <a href="{{ url('/checkout') }}" class="btn btn-success px-5 py-3">Beli Sekarang</a>
            </div>
        </div>
    </div>

    <div class="container card mb-4 p-4 shadow">
        <h1>Deskripsi Produk</h1>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Numquam ad atque ducimus quisquam culpa, blanditiis
            doloribus in non sint nulla voluptates maiores corrupti nemo minima tempora vitae sed quam eaque nesciunt
            molestiae earum sapiente tempore! Eius blanditiis veniam voluptate amet quam est nulla ab dolor. Modi quisquam
            iure accusantium beatae?

            Lorem ipsum dolor sit, amet consectetur adipisicing elit. Velit veritatis dolorem eos hic natus soluta! Dolore
            voluptate tempore accusamus cumque harum voluptatibus, maxime tempora optio! Nemo voluptates dignissimos
            doloremque ipsum excepturi, vitae pariatur minima qui quidem est incidunt aut culpa at ratione alias soluta
            consequuntur! Beatae cupiditate asperiores maiores laboriosam, quisquam maxime! Rem consequatur dolorem numquam
            quibusdam, excepturi dolores explicabo quisquam odio nulla, sapiente nobis facilis! Id quis, dolor error,
            voluptatibus nisi autem dignissimos aut qui atque nemo quibusdam necessitatibus et impedit veritatis tempora
            ipsum vel corrupti doloribus quae eos. Iure cupiditate optio quibusdam voluptatem itaque ipsam accusamus
            pariatur deleniti.
        </p>
    </div>
@stop
