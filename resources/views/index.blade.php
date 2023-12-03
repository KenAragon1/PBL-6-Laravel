<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
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
        <div class="container">
            <div class="d-flex align-items-center">
                <button class="btn btn-outline-success" id="js-menu-btn">
                    <i class="bi bi-list fs-5"></i>
                </button>
                <a href="" class="navbar-brand text-success fs-4 mx-2">
                    <strong>CC Store</strong>
                </a>
            </div>
            <form class="d-flex rounded">
                <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" />
                <button class="btn btn-outline-success" type="submit">
                    <i class="bi bi-search"></i>
                </button>
            </form>
            <ul class="navbar-nav">
                <!-- button keranjang -->
                <li class="nav-item">
                    <a href="" class="btn btn-outline-success mx-2 fs-5" data-bs-toggle="modal"
                        data-bs-target="#modal-cart">
                        <i class="bi bi-cart-fill"></i>
                    </a>
                </li>
                <!-- button login -->
                <li class="nav-item js-login-profile">
                    <a href="{{ url('/login')}}" class="btn btn-outline-success fs-5 js-login-btn">
                        Login
                    </a>
                </li>
            </ul>
        </div>
        {{-- side bar --}}
        <div class="d-flex flex-column flex-shrink-0 p-3 bg-light position-absolute  js-side-bar" style="width: 280px;">
            <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto link-dark text-decoration-none">
                <svg class="bi me-2" width="40" height="32">
                    <use xlink:href="#bootstrap"></use>
                </svg>
                <span class="fs-4 text-success">Kategori</span>
            </a>
            <hr>
            <ul class="nav nav-pills flex-column mb-auto">
                <li class="nav-item">
                    <a href="#" class="nav-link link-dark">
                        <svg class="bi me-2" width="16" height="16">
                            <use xlink:href="#home"></use>
                        </svg>
                        Laptop
                    </a>
                </li>
                <li>
                    <a href="#" class="nav-link link-dark">
                        <svg class="bi me-2" width="16" height="16">
                            <use xlink:href="#speedometer2"></use>
                        </svg>
                        Komponen Komputer
                    </a>
                </li>
                <li>
                    <a href="#" class="nav-link link-dark">
                        <svg class="bi me-2" width="16" height="16">
                            <use xlink:href="#table"></use>
                        </svg>
                        Aksesoris
                    </a>
                </li>
                <li>
                    <a href="#" class="nav-link link-dark">
                        <svg class="bi me-2" width="16" height="16">
                            <use xlink:href="#grid"></use>
                        </svg>
                        Printer
                    </a>
                </li>
                <li>
                    <a href="#" class="nav-link link-dark">
                        <svg class="bi me-2" width="16" height="16">
                            <use xlink:href="#people-circle"></use>
                        </svg>
                        Rakit PC
                    </a>
                </li>
            </ul>
            


        </div>
    </nav>

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
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleFade"
            data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>

    <div class="container">
        <h1 class="text-center text-success">REKOMENDASI</h1>
        <div class="row">
            <div class="card p-2 m-2 shadow" style="width: 15rem">
                <a href="{{url('/produk-detail')}}" class="stretched-link"></a>
                <img class="card-img-top" src="/assets/template-produk.png" alt="Card image cap" />
                <div class="card-body">
                    <h5 class="card-title">Asus TUF</h5>
                    <p class="text-success">Rp 13.500.000</p>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="modal-cart">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header bg-white text-success">
                    <h3><strong>Keranjang</strong></h3>
                </div>
                <div class="modal-body">
                    <div class="card rounded-3 mb-4">
                        <div class="card-body p-4">
                            <div class="row d-flex justify-content-between align-items-center">
                                <div class="col-md-1">
                                    <input type="checkbox" name="" id="" />
                                </div>
                                <div class="col-md-2">
                                    <img src="item.image" class="img-fluid rounded-3" />
                                </div>
                                <div class="col-md-3">
                                    <p class="lead fw-normal mb-2">
                                        <a href="" class="product-anchor" data-bs-toggle="modal"
                                            data-bs-dismiss="modal" data-bs-target="#modal-productCard">
                                            Asus TUF
                                        </a>
                                    </p>
                                    <p>
                                        <span class="text-muted">Warna:</span>
                                        Hitam
                                    </p>
                                    <div class="star-rating">
                                        <ul class="list-inline">
                                            <li class="list-inline-item">
                                                <i class="fa fa-star"></i>
                                            </li>
                                            <li class="list-inline-item">
                                                <i class="fa fa-star"></i>
                                            </li>
                                            <li class="list-inline-item">
                                                <i class="fa fa-star"></i>
                                            </li>
                                            <li class="list-inline-item">
                                                <i class="fa fa-star"></i>
                                            </li>
                                            <li class="list-inline-item">
                                                <i class="fa fa-star-o"></i>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="col-md-4 d-flex">
                                    <h5 class="mb-0">Rp 13.500.000,-</h5>
                                </div>
                                <div class="col-md-1">
                                    <a href="checkout.html" class="btn btn-success">
                                        <i class="bi bi-cart"></i>
                                    </a>
                                </div>
                                <div class="col-md-1">
                                    <button class="btn btn-danger">
                                        <i class="bi bi-trash"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-danger" data-bs-dismiss="modal">
                        Tutup Keranjang
                    </button>
                    <a href="" class="btn btn-success">Checkouta</a>
                </div>
            </div>
        </div>
    </div>

    <footer class="d-flex flex-wrap justify-content-between align-items-center py-3 mt-4 border-top bg-white shadow">
        <div class="col-md-4 d-flex align-items-center">
            <a href="/" class="mb-3 me-2 mb-md-0 text-muted text-decoration-none lh-1">
                <svg class="bi" width="30" height="24">
                    <use xlink:href="#bootstrap"></use>
                </svg>
            </a>
            <span class="mb-3 mb-md-0 text-muted">© 2022 Company, Inc</span>
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
