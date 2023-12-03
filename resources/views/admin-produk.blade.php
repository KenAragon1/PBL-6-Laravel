@extends('templates.dashboard')

@section('content')
    <div class="col-9 mt-4 card container bg-white shadow border-0">
        <a class="btn btn-success my-3"><i class="bi bi-plus-circle-fill"></i> Tambah Produk</a>
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
@endsection