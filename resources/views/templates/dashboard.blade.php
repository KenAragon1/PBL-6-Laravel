<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>CC Store | Situs Jual Beli Terpercaya</title>
    <link rel="shortcut icon" href="{{ ('logo2.png') }}">
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    <style>
        .nav-item:hover {
            background: rgba(0, 0, 0, 0.1)
        }

    </style>
</head>

<body>
    <nav class="navbar navbar-expand bg-white sticky-top border-bottom m-0">
        <div class="container">
            <div class="d-flex align-items-center">
                <a href="{{ url('/') }}" class="btn btn-outline-success"><i class="bi bi-house-door-fill"></i></a>
                <a href="" class="navbar-brand text-success mx-2 ms-auto">
                    <img src="{{ asset('logo2.png') }}" alt="Logo" height="45px" width="45px" style="margin-left: 30px;">
                </a>
            </div>
            <div class="d-flex justify-content-end text-success">
                <strong>Halo, {{ Auth::user()->nama }} 👋</strong>
            </div>
        </div>
    </nav>
    <div class="row mb-0" style="min-height: 100vh">
        <div class="col-4 d-flex flex-column flex-shrink-0 p-3 bg-white border mt-0" style="width: 280px;">
            <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto link-dark text-decoration-none">
                <svg class="bi me-2" width="40" height="32">
                    <use xlink:href="#bootstrap"></use>
                </svg>
                <span class="fs-4 text-success">Dashboard</span>
            </a>
            <hr>
            <ul class="nav nav-pills flex-column mb-auto">
                <li class="nav-item">
                    <a href="{{ url('/dashboard') }}" class="nav-link link-dark">
                        <svg class="bi me-2" width="16" height="16">
                            <use xlink:href="#home"></use>
                        </svg>
                        Dashboard
                    </a>
                </li>
                
                <li class="nav-item">
                    <a href="/dashboard/pesanan" class="nav-link link-dark">
                        <svg class="bi me-2" width="16" height="16">
                        </svg>
                        Barang Terjual
                    </a>
                </li>
                <li class="nav-item">
                    <a href="/dashboard/riwayatPesanan" class="nav-link link-dark">
                        <svg class="bi me-2" width="16" height="16">
                        </svg>
                        Riwayat Pesanan
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ url('/dashboard/produk/'.Auth::user()->id_pengguna) }}" class="nav-link link-dark" id="penjual-produk">
                        <svg class="bi me-2" width="16" height="16">
                            <use xlink:href="#speedometer2"></use>
                        </svg>
                        Produk
                    </a>
                </li>

            </ul>
        </div>
        @yield('content')
    </div>

    <footer class="d-flex flex-wrap justify-content-between align-items-center py-3 mt-0 border-top bg-white shadow">
        <div class="col-md-4 d-flex align-items-center">
            <a href="/" class="mb-3 me-2 mb-md-0 text-muted text-decoration-none lh-1">
                <svg class="bi" width="30" height="24">
                    <use xlink:href="#bootstrap"></use>
                </svg>
            </a>
            <span class="mb-3 mb-md-0 text-muted">Copyright© 2023 PBL 6th Team, Polibatam</span>
        </div>

        <ul class="nav col-md-4 justify-content-end list-unstyled d-flex">
            <li class="ms-3">
                <a class="text-muted" href="#"><svg class="bi" width="24" height="24">
                        <use xlink:href="#twitter"></use>
                    </svg></a>
            </li>
            <li class="ms-3">
                <a class="text-muted" href="#"><svg class="bi" width="24" height="24">
                        <use xlink:href="#instagram"></use>
                    </svg></a>
            </li>
            <li class="ms-3">
                <a class="text-muted" href="#"><svg class="bi" width="24" height="24">
                        <use xlink:href="#facebook"></use>
                    </svg></a>
            </li>
        </ul>
    </footer>


</body>

</html>
