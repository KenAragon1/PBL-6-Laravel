@extends('templates.nav-footer')

@section('content')
    <div class="container bg-white my-3 border shadow" style="min-height: 100vh">
        <h1 class="border-bottom text-muted text-center p-3">Pesanan</h1>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">ID Pesanan</th>
                    <th scope="col">Produk</th>
                    <th scope="col">Jumlah Produk</th>
                    <th scope="col">Harga total</th>
                    <th scope="col">Status Pembayaran</th>
                    <th scope="col">Status Pengiriman</th>
                </tr>
            </thead>
            <tbody>
                <td>12345</td>
                <td>Biawak gaming</td>
                <td>5</td>
                <td>2000000</td>
                <td>Belum Bayar</td>
                <td>Menunggu Pembayaran</td>
            </tbody>
        </table>
    </div>
@endsection
