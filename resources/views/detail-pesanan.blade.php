@extends('templates.nav-footer')

@section('content')
    <div class="container bg-white px-5 py-3">
        <h1 class="text-center text-muted p-3 border-bottom">Detail Pesanan</h1>
        <div class="row mb-3">
            <div class="col-4">
                <h3 class="border-bottom py-2">Foto Produk</h3>
                <img src="{{asset('images/foto-produk') }}/{{ $pesanan->produk->foto_produk }}" alt="" class="img-fluid mb-5">
                @if ($pesanan->bukti_pembayaran=='' and $pesanan->jenis_pembayaran=='TransferBank')
                    <h3 class="border-bottom py-2">Bukti Pembayaran</h3>    
                    <strong><h4>Belum Mengupload Bukti Pembayaran</h4></strong><br>
                    <a href="/pesanan/bukti_pembayaran/{{ $pesanan->id_pemesanan }}" class="btn btn-success">Upload Bukti</a>
                    @elseif($pesanan->jenis_pembayaran=='COD')
                    
                    @else    
                    <h3 class="border-bottom py-2">Bukti Pembayaran</h3>    
                    <a href="/pesanan/bukti_pembayaran/{{ $pesanan->id_pemesanan }}" class="btn btn-success mb-3 ">Ubah Bukti</a>
                    <img src="{{asset('images/bukti_pembayaran') }}/{{ $pesanan->bukti_pembayaran }}" alt="" 
                    class="img-fluid" style="width: 400px; height: auto">
                @endif
            </div>
            <div class="col-8">
                <h3 class="border-bottom py-2">Detail Produk</h3>
                <table class="mb-4 table">
                    <tr>
                        <td>ID Produk</td>
                        <td>:</td>
                        <td>{{ $pesanan->produk->id_produk }}</td>
                    </tr>
                    <tr>
                    <tr>
                        <td>Nama Produk</td>
                        <td>:</td>
                        <td>{{ $pesanan->produk->nama_produk }}</td>
                    </tr>
                    <tr>
                        <td>Kategori</td>
                        <td>:</td>
                        <td>{{ $pesanan->produk->kategori->kategori }}</td>
                    </tr>
                    <tr>
                        <td>Detail Produk</td>
                        <td>:</td>
                        <td>{{ $pesanan->produk->deskripsi }}</td>
                    </tr>
                    <tr>
                        <td>Harga Satuan Produk</td>
                        <td>:</td>
                        <td>Rp. {{ $pesanan->produk->harga }},-</td>
                    </tr>
                    <tr>
                        <td>Jumlah Produk Terbeli</td>
                        <td>:</td>
                        <td>{{ $pesanan->cart->jumlah_produk }} Unit</td>
                    </tr>
                    <tr>
                        <td>Total Harga</td>
                        <td>:</td>
                        <td>Rp. {{ $pesanan->cart->total_harga }},-</td>
                    </tr>
                    <tr>
                        <td>Nama Penjual</td>
                        <td>:</td>
                        <td>{{ $pesanan->produk->pengguna->nama }}</td>
                    </tr>
                    <tr>
                        <td>No HP Penjual</td>
                        <td>:</td>
                        <td>{{ $pesanan->produk->pengguna->nohp }}</td>
                    </tr>
                    
                </table>

                <h3 class="border-bottom py-2">Detail Pembeli</h3>
                <table class="mb-4 table">
                    <tr>
                        <td>Nama Pembeli</td>
                        <td>:</td>
                        <td>{{ $pesanan->pembeli->nama }}</td>
                    </tr>
                    <tr>
                        <td>No Telepon</td>
                        <td>:</td>
                        <td>{{ $pesanan->pembeli->nohp }}</td>
                    </tr>
                    <tr>
                        <td>Email</td>
                        <td>:</td>
                        <td>{{ $pesanan->pembeli->email }}</td>
                    </tr>
                    <tr>
                        <td>Alamat Pembeli</td>
                        <td>:</td>
                        <td>{{ $pesanan->pembeli->alamat }}</td>
                    </tr>
                </table>
                <h3 class="border-bottom py-2">Detail Proses Pemesanan</h3>
                <table class="mb-4 table">
                    <tr>
                        <td>ID Pesanan</td>
                        <td>:</td>
                        <td>{{ $pesanan->id_pemesanan }}</td>
                    </tr>
                    <tr>
                        <td>Jenis Pembayaran</td>
                        <td>:</td>
                        <td>{{ $pesanan->jenis_pembayaran }}</td>
                    </tr>
                    <tr>
                        <td>Status Pembayaran</td>
                        <td>:</td>
                        @if ($pesanan->bukti_pembayaran=='' and $pesanan->jenis_pembayaran=='TransferBank')
                            <td>Belum Melakukan Pembayaran</td>
                        @elseif($pesanan->jenis_pembayaran=='COD')
                            <td>Bayar Ditempat</td>
                        @else
                        <td>Sudah Melakukan Pembayaran</td>
                        @endif
                    </tr>
                    <tr>
                        <td>Status Pesanan</td>
                        <td>:</td>
                        <td>{{ $pesanan->status_pengiriman }}</td>
                    </tr>
                    <tr>
                        <td>Tanggal Pemesanan</td>
                        <td>:</td>
                        <td>{{ $pesanan->tgl_pemesanan }}</td>
                    </tr>
                    
                    <tr>
                        <td>Estimasi Waktu</td>
                        <td>:</td>
                        <td>{{ $pesanan->estimasi_waktu }} <br>
                            <span class="text-secondary "><i>Estimasi Waktu Dapat Berubah Sesuai Waktu Pemesanan dan Pembayaran dari Pihak Pembeli</i></span>
                        </td>
                    </tr>
                    <tr>
                        <td>Tanggal Diterima </td>
                        <td>:</td>
                        <td>{{ $pesanan->tgl_selesai }}</td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
@endsection
