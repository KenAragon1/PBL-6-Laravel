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
        <h1 class="border-bottom text-muted text-center p-3">Pesanana</h1>
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
                        <td>{{ $d->total_transaksi }}</td>
                        @if ($d->jenis_pembayaran == 'COD')
                        <td>Bayar Ditempat</td></td>
                        @elseif($d->jenis_pembayaran == 'TransferBank')
                        <td>Belum Melakukan Pembayaran</td>
                        @else
                        <td>Sudah Melakukan Pembayaran</td>
                        @endif
                        <td>{{ $d->status_pengiriman }}</td>
                        <td>
                            
                            <a href="/detail_pesanan/{{ $d->id_pemesanan }}" class="text-light btn btn-primary"><i class="bi bi-eye"></i></a>
                            @if ($d->jenis_pembayaran == 'TransferBank' and $d->bukti_pembayaran == '')
                                <a href="/pesanan/bukti_pembayaran/{{ $d->id_pemesanan }}" class="text-light btn btn-warning">
                                    <i class="bi bi-file-earmark-plus"></i>
                                </a>
                                    
                            @elseif($d->status_pengiriman == 'Pesanan Sudah Dikirim oleh Penjual')
                            
                            <a href="/pesananSiap/{{ $d->id_pemesanan }}" class="btn btn-success mt-1">Terima Pesanan</a>
                            
                            @elseif($d->status_pengiriman == 'Pesanan Telah Sampai di Tangan Pembeli')
                            <form action="/pesananSiap/selesai" method="post">
                                @csrf
                                {{-- @method('PATCH') --}}
                                <input hidden type="text" name="id_pesanan"  value="{{ $d->id_pemesanan }}">
                                <input hidden type="text" name="nama_produk"  value="{{ $d->produk->nama_produk }}">
                                <input hidden type="text" name="jumlah_produk"  value="{{ $d->jumlah_produk }}">
                                <input hidden type="text" name="total_harga"  value="{{ $d->total_transaksi }}">
                                <input hidden type="text" name="jenis_pembayaran"  value="{{ $d->jenis_pembayaran}}">
                                <input hidden type="text" name="waktu_pemesanan"  value="{{ $d->tgl_pemesanan}}">
                                <input hidden type="text" name="waktu_diterima"  value="{{ $d->tgl_selesai}}">
                                <input hidden type="text" name="pembeli"  value="{{ Auth::user()->nama}}">
                                <input hidden type="text" name="penjual"  value="{{ $d->produk->pengguna->nama}}">
                                
                            <button type="submit"  class="btn btn-success mt-1">Simpan Riwayat</button>
                                
                            </form>
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
