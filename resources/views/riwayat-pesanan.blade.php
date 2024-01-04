@extends('templates.dashboard')

@section('content')
    <div class="container col-9 bg-white my-3 border shadow" style="min-height: 100vh">
        
        <h1 class="border-bottom text-muted text-center p-3">Riwayat Pesanan</h1>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">ID Pesanan</th>
                    <th scope="col">Nama Produk</th>
                    <th scope="col">Jumlah Produk</th>
                    <th scope="col">Total Harga</th>
                    <th scope="col">Jenis Pembayaran</th>
                    <th scope="col">Waktu Pemesanan</th>
                    <th scope="col">Waktu Diterima</th>
                    <th scope="col">Penjual</th>
                </tr>
            </thead>
            
            
            <tbody>
                @foreach ($data as $d)
                    <tr>
                        <td>{{ $d->id_pesanan }}</td>
                        <td>{{ $d->nama_produk }}</td>
                        <td>{{ $d->jumlah_produk }}</td>
                        <td>{{ $d->total_harga }}</td>
                        <td>{{ $d->jenis_pembayaran }}</td>
                        <td>{{ $d->waktu_pemesanan }}</td>
                        <td>{{ $d->waktu_diterima }}</td>
                        <td>{{ $d->penjual }}</td>                        
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
