@extends('templates.nav-footer')

@section('content')
    <div class="container card pb-3 pt-3 rounded mb-5 mt-5" style="max-width: 40rem">
        <div class="container mb-3">
            <center>
                <strong>
                    <h1>Profil</h1>
                </strong>
            </center>
        </div>
        <div class="container align-items-center justify-content-center d-flex">
            <img src="assets/user.png" alt=""
                class="rounded-circle mb-5 align-center-center profile-img" style="max-width: 20rem" />
        </div>
        <div class="container mb-5">
            <div class="row">
                <div class="col-md-3 border-bottom">
                    <p>Nama</p>
                </div>
                <div class="col-md-9 border-bottom">
                    <p>Kevin Renaldi</p>
                </div>
            </div>
            <div class="row border-bottom">
                <div class="col-md-3">
                    <p>Jenis Kelamin</p>
                </div>
                <div class="col-md-9">
                    <p>Attack helicopter</p>
                </div>
            </div>
            <div class="row border-bottom">
                <div class="col-md-3">
                    <p>Tanggal Lahir</p>
                </div>
                <div class="col-md-9">
                    <p>Ntahlah</p>
                </div>
            </div>
            <div class="row border-bottom">
                <div class="col-md-3">
                    <p>Email</p>
                </div>
                <div class="col-md-9">
                    <p>Jemboed@gmail.com</p>
                </div>
            </div>
            <div class="row border-bottom">
                <div class="col-md-3">
                    <p>No HP</p>
                </div>
                <div class="col-md-9">
                    <p>0800 0930 0302</p>
                </div>
            </div>
        </div>
        <div class="container">
            <a href="{{url('/')}}" class="btn btn-primary">Kembali</a>
            <a href="" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#modal-edit">Edit Profil</a>
            <a href="" class="btn btn-danger">Log Out</a>
        </div>
    </div>

    <!-- modal edit start -->
    <div class="modal fade" id="modal-edit">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">Edit Profil</div>
                <div class="modal-body">
                    <form action="">
                        <div class="form-outline mb-2">
                            <label class="form-label" for="nama">Nama</label>
                            <input type="text" id="nama" class="form-control" />
                        </div>
                        <div class="form-outline mb-2">
                            <label class="form-label" for="jenisKelamin">Jenis Kelamin</label>
                            <input type="text" id="jenisKelamin" class="form-control" />
                        </div>
                        <div class="form-outline mb-2">
                            <label class="form-label" for="birth">Tanggal Lahir</label>
                            <input type="date" id="birth" class="form-control" />
                        </div>
                        <div class="form-outline mb-2">
                            <label class="form-label" for="email">Email</label>
                            <input type="email" id="email" class="form-control" />
                        </div>
                        <div class="form-outline mb-2">
                            <label class="form-label" for="noHP">No HP</label>
                            <input type="number" id="noHP" class="form-control" />
                        </div>
                        <button type="button" class="btn btn-primary btn-block mb-4">
                            Ubah
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- modal edit end -->
@stop
