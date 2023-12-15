@extends('templates.nav-footer')

@section('content')
    <div class="container bg-white my-3 border shadow" style="min-height: 100vh">
        @if (session()->has('sukses'))
            <div class="alert alert-success alert-dismissible fade show mt-3" role="alert">
                <strong>{{ session('sukses') }}</strong> 
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        @if (session()->has('warning'))
            <div class="alert alert-warning alert-dismissible fade show mt-3" role="alert">
                <strong>{{ session('warning') }}</strong> 
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        <h1 class="border-bottom text-muted text-center p-3">Pesanan</h1>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">ID Pesanan</th>
                    <th scope="col">Nama Produk</th>
                    <th scope="col">Total Harga</th>
                    <th scope="col">Status Pembayaran</th>
                    <th scope="col">Status Pengiriman</th>
                    <th scope="col">Detail</th>
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
                        @else
                        <td>Belum Melakukan Pembayaran</td>
                        @endif
                        <td>{{ $d->status_pengiriman }}</td>
                        <td>
                            
                            @if ($d->jenis_pembayaran == 'TransferBank' and $d->bukti_pembayaran == '')
                            <button class="btn btn-primary">
                                <a href="/pesanan/detail" class="text-light"><i class="bi bi-eye"></i></a>
                            </button>
                                <button class="btn btn-warning">
                                    <a href="/pesanan/bukti_pembayaran/{{ $d->id_transaksi }}" class="text-light"><i class="bi bi-file-earmark-plus"></i></a>
                                </button>
                            @else
                            <button class="btn btn-primary">
                                <a href="/pesanan/detail" class="text-light"><i class="bi bi-eye"></i></a>
                            </button>
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
