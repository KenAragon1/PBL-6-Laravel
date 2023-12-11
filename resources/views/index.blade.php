<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Home Page</title>
    <link rel="shortcut icon" href="#">
    {{-- fontawesome --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    @vite(['resources/sass/app.scss', 'resources/js/app.js'])

    <style>
        .js-side-bar {
            height: 100vh;
            top: 100%;
            left: -100%;
            transition: 300ms ease
        }

        .js-side-bar.active {
            left: 0;
        }
    </style>
</head>

<body>
    
    <nav class="navbar navbar-expand bg-white sticky-top border-bottom">
        <div class="container align-items-center">
            <div class="d-flex align-items-center">
                <button class="btn btn-outline-success" id="js-menu-btn">
                    <i class="bi bi-list fs-5"></i>
                </button>
                <a href="" class="navbar-brand text-success fs-4 mx-2">
                    <strong>CC Store</strong>
                </a>
            </div>
            <form class="d-flex rounded my-0">
                <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" />
                <button class="btn btn-outline-success" type="submit">
                    <i class="bi bi-search"></i>
                </button>
            </form>
            <div class="nav ">
                <!-- button keranjang -->
                <a href="{{ url('/keranjang') }}" class="btn btn-outline-success fs-5 mx-2">
                    <i class="bi bi-cart-fill"></i>
                </a>
                @auth
                <a href="/profil-user" class="navbar-brand text-success fs-5 mx-2">
                    <strong><u>Hai, {{ Auth::user()->nama }}</u></strong>
                </a>
                {{-- icon profile --}}
                <a class="btn  btn-outline-success fs-5" href="/logout">Logout</a>
                @else
                <!-- button login -->
                    <a href="/login" class="btn btn-outline-success fs-5 js-login-btn">
                        Login
                    </a>
                @endauth

            </div>
        </div>
        {{-- side bar --}}
        <div class="d-flex flex-column flex-shrink-0 p-3 bg-light position-absolute  js-side-bar" style="width: 280px;">
            <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto link-dark text-decoration-none">
                <svg class="bi me-2" width="40" height="32">
                    <use xlink:href="#bootstrap"></use>
                </svg>
                <strong class="text-success" style="font-size: 2rem;">Menu</strong>
            </a>
            <hr>
            <ul class="nav nav-pills flex-column">
                <li>
                    <a href="#" class="nav-link link-dark">
                        <span><i class="fa-solid fa-gifts fa-2xl me-3"></i></span>   
                        <span class="fs-5 bold">Produk</span>
                    </a>
                </li>
                <li>
                    <a href="#" class="nav-link link-dark">
                        <span><i class="fa-solid fa-store fa-2xl me-3"></i></span>   
                        <span class="fs-5 bold">Kelola Produk</span>
                    </a>
                </li>
                <li>
                    <a href="#" class="nav-link link-dark">
                        <span><i class="fa-solid fa-tags fa-2xl me-3"></i></span>   
                        <span class="fs-5 bold">Kategori</span>
                    </a>
                </li>
            </ul>



        </div>
    </nav>
    @if(session()->has('sukses'))
        <div class="alert alert-success alert-dismissible fade show mt-3" role="alert">
            Selamat Datang, <strong>{{ Auth::user()->nama }}!</strong> Anda berhasil login.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    <div id="carouselExampleFade" class="carousel slide carousel-fade mb-5" data-bs-ride="carousel">
        <div class="carousel-inner" style="height: 100vh">
            <div class="carousel-item active">
                <img src="/assets/banner1.jpg" class="d-block w-100" alt="bgst" />
            </div>
            <div class="carousel-item">
                <img src="/assets/banner2.jpg" class="d-block w-100" alt="kontol" />
            </div>
            <div class="carousel-item">
                <img src="/assets/banner3.jpg" class="d-block w-100" alt="ajg" />
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleFade" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleFade" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>

    <div class="container">
        <h1 class="text-center text-success">REKOMENDASI</h1>
        <div class="row">
            <div class="card p-2 m-2 shadow" style="width: 15rem">
                <a href="{{ url('/produk-detail') }}" class="stretched-link"></a>
                <img class="card-img-top" src="/assets/template-produk.png" alt="Card image cap" />
                <div class="card-body">
                    <h5 class="card-title">Asus TUF</h5>
                    <p class="text-success">Rp 13.500.000</p>
                </div>
            </div>
        </div>
    </div>


    <footer class="d-flex flex-wrap justify-content-between align-items-center py-3 mt-4 border-top bg-white shadow navbar navbar-fixed-bottom">
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

<script>
    const menuBtn = document.querySelector("#js-menu-btn");
    let menuBar = document.querySelector(".js-side-bar");

    menuBtn.addEventListener("click", () => {
        console.log('test')
        if (!menuBar.classList.contains("active")) {
            menuBar.classList.add("active");
        } else {
            menuBar.classList.remove("active");
        }
    });
</script>

</html>
