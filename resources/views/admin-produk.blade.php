@extends('templates.dashboard')

@section('content')
    <div class="col-9 mt-4 card container bg-white shadow border-0">
        <a class="btn btn-success my-3" data-bs-toggle="modal" data-bs-target="#tambah-produk"><i
                class="bi bi-plus-circle-fill"></i> Tambah Produk</a>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Produk</th>
                    <th scope="col">Harga</th>
                    <th scope="col">Handle</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th scope="row">1</th>
                    <td><a href="">Asus TUF</a></td>
                    <td>Rp 13.500.000</td>
                    <td>@mdo</td>

            </tbody>
        </table>
    </div>

    <div class="modal fade" id="tambah-produk">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h1>Tambah Produk</h1>
                </div>
                <div class="modal-body">
                    <div class="form-outline mb-4">
                        <label class="form-label" for="nama">Nama Produk</label>
                        <input type="text" id="nama" class="form-control" />
                    </div>
                    <div class="form-outline mb-4">
                        <label class="form-label" for="harga">Harga Produk</label>
                        <input type="number" id="harga" class="form-control" />
                    </div>
                    <div class="form-outline mb-4">
                        <label class="form-label" for="deskripsi">Deskripsi Produk</label>
                        <input type="password" id="deskripsi" class="form-control" />
                    </div>
                    <div class="form-outline mb-4">
                        <label class="form-label" for="foto">Foto Produk</label>
                        <input type="file" id="foto" class="form-control" />
                    </div>

                </div>
                <div class="modal-footer">
                    <button class="btn btn-succes">Tambahkan Produk</button>
                </div>
            </div>
        </div>
    </div>
@endsection
