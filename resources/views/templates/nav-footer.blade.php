<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>CC Store | Situs Jual Beli Terpercaya</title>
    <link rel="shortcut icon" href="{{ 'logo2.png' }}">
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    <style>
        .nav-item:hover {
            background: rgba(0, 0, 0, 0.1)
        }

        input::-webkit-outer-spin-button,
        input::-webkit-inner-spin-button {
            display: none;
        }
    </style>
</head>

<body style="min-height: 100vh; height:100vh;">
    <nav class="navbar navbar-expand bg-white sticky-top border-bottom mb-3">
        <div class="container">
            <div class="d-flex align-items-center">
                <a href="/" class="navbar-brand text-success mx-2 ms-auto">
                    <a href="{{ url('/') }}" class="btn btn-outline-success"><i
                            class="bi bi-house-door-fill"></i></a>
                    <img src="{{ asset('logo2.png') }}" alt="Logo" height="45px" width="45px"
                        style="margin-left: 30px;">
                </a>
            </div>
        </div>

    </nav>
    @yield('content')

    <footer
        class="d-flex flex-wrap justify-content-between align-items-center py-3 mt-4 border-top bg-white shadow navbar navbar-fixed-bottom">
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
