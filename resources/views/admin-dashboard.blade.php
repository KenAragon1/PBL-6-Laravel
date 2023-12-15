@extends('templates.dashboard')

@section('content')
    <div class="container col-9 mb-2">
        <div class="row bg-success text-white mt-3 border shadow shadow p-3" >
            <h2>Selamat Datang di CC Store Dashboard</h2>
        </div>
        <div class="row bg-white mt-3 border rounded shadow p-3">
            <h3 class="border-bottom p-2 text-center mb-3">Data Diri Penjual</h3>
            <div class="col-3">
                <img src="{{ asset('images/foto/' . Auth::user()->foto) }}" alt="" class="img-fluid">
            </div>
            <div class="col-9">
                <table>
                    <tr>
                        <th>ID Pengguna</th>
                        <th>:</th>
                        <td>{{ Auth::user()->id_pengguna }}</td>
                    </tr>
                    <tr>
                        <th>Nama Lengkap</th>
                        <th>:</th>
                        <td>{{ Auth::user()->nama }}</td>
                    </tr>
                    <tr>
                        <th>Jenis Kelamin</th>
                        <th>:</th>
                        <td>{{ Auth::user()->jenis_kelamin }}</td>
                    </tr>
                    <tr>
                        <th>Tanggal Lahir</th>
                        <th>:</th>
                        <td>{{ Auth::user()->ttl }}</td>
                    </tr>
                    <tr>
                        <th>Email</th>
                        <th>:</th>
                        <td>{{ Auth::user()->email }}</td>
                    </tr>
                    <tr>
                        <th>No. HP</th>
                        <th>:</th>
                        <td>{{ Auth::user()->nohp }}</td>
                    </tr>
                </table>
            </div>
        </div>
        <div class="row mt-3 p-3 justify-content-center">
            <h1 class="border-bottom text-muted text-center mb-4 p-2">Panduan</h1>
            <div class="border p-0 bg-white shadow m-4" style="width: 16rem;">
                <img class="card-img-top img-fluid" src="../assets/helper.png" alt="Card image cap">
                <div class="card-body p-4">
                    <h5 class="card-title mb-2">Panduan Menggunakan Dashboard</h5>
                    <a href="#" class="btn btn-primary">Go somewhere</a>
                </div>
            </div>
            <div class="border p-0 bg-white shadow m-4" style="width: 16rem;">
                <img class="card-img-top img-fluid" src="../assets/helper.png" alt="Card image cap">
                <div class="card-body p-4">
                    <h5 class="card-title mb-2">Panduan Menggunakan Dashboard</h5>
                    <a href="#" class="btn btn-primary">Go somewhere</a>
                </div>
            </div>
            <div class="border p-0 bg-white shadow m-4" style="width: 16rem;">
                <img class="card-img-top img-fluid" src="../assets/helper.png" alt="Card image cap">
                <div class="card-body p-4">
                    <h5 class="card-title mb-2">Panduan Menggunakan Dashboard</h5>
                    <a href="#" class="btn btn-primary">Go somewhere</a>
                </div>
            </div>

        </div>
    </div>
@endsection
