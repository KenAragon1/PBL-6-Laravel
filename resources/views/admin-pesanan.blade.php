@extends('templates.dashboard')

@section('content')
    <div class="container col-9 bg-white my-3 shadow">
        <h1 class="p-3 border-bottom text-muted text-center">Pesanan</h1>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">ID Pesanan</th>
                    <th scope="col">Produk</th>
                    <th scope="col">Jumlah Produk</th>
                    <th scope="col">Harga total</th>
                    <th scope="col">Status Pembayaran</th>
                    <th scope="col">Status Pengiriman</th>
                    <th scope="col">Detail</th>
                </tr>
            </thead>
            <tbody>
                <td>12345</td>
                <td>Biawak gaming</td>
                <td>5</td>
                <td>2000000</td>
                <td>Belum Bayar</td>
                <td>Menunggu Pembayaran</td>
                <td><a href="{{url('/dashboard/detail-pesanan')}}" class="btn btn-success"><i class="bi bi-eye"></i></a></td>
            </tbody>
        </table>
    </div>
@endsection
