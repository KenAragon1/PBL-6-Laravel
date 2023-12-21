@extends('templates.nav-footer')

@section('content')
    <div class="container bg-white my-3 border shadow" style="min-height: 100vh">
        
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
                    <th scope="col">Pembeli</th>
                    <th scope="col">Penjual</th>
                </tr>
            </thead>
            
            
            <tbody>
                @foreach ($data as $d)
                    <tr>
                        <td>{{ $d->id_pemesanan }}</td>
                        <td>{{ $d->produk->nama_produk }}</td>
                        <td>{{ $d->cart->total_harga }}</td>
                        @if ($d->jenis_pembayaran == 'COD')
                        <td>Bayar Ditempat</td></td>
                        @elseif($d->jenis_pembayaran == 'TransferBank')
                        <td>Belum Melakukan Pembayaran</td>
                        @else
                        <td>Sudah Melakukan Pembayaran</td>
                        @endif
                        <td>{{ $d->status_pengiriman }}</td>
                        
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
