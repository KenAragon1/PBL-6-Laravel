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
                        @elseif($d->jenis_pembayaran == 'TransferBank')
                        <td>Belum Melakukan Pembayaran</td>
                        @else
                        <td>Sudah Melakukan Pembayaran</td>
                        @endif
                        <td>{{ $d->status_pengiriman }}</td>
                        <td>
                            
                            @if ($d->jenis_pembayaran == 'TransferBank' and $d->bukti_pembayaran == '')
                                <a href="/detail_pesanan" class="text-light btn btn-primary"><i class="bi bi-eye"></i></a>
                                <a href="/pesanan/bukti_pembayaran/{{ $d->id_pemesanan }}/{{ $d->produk->id_produk }}" class="text-light btn btn-warning">
                                    <i class="bi bi-file-earmark-plus"></i>
                                </a>
                                    
                            @else
                                <a href="/detail_pesanan" class="text-light btn btn-primary"><i class="bi bi-eye"></i></a>
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
