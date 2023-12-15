@extends('templates.nav-footer')

@section('content')
    <div class="container bg-white px-5 py-3">
        <h1 class="text-center text-muted p-3 border-bottom">Detail Pesanan</h1>
        <div class="row mb-3">
            <div class="col-4">
                <img src="{{asset('images/foto-produk/Sj97cEHFaJMfp97KZHKq04qZZltKKRulQYD8l5o0.png')}}" alt="" class="img-fluid">
            </div>
            <div class="col-8">
                <table class="mb-4 table">
                    <tr>
                        <td>ID Pesanan</td>
                        <td>:</td>
                        <td>123123123</td>
                    </tr>
                    <tr>
                        <td>ID Penjual</td>
                        <td>:</td>
                        <td>123123123</td>
                    </tr>
                    <tr>
                        <td>ID Produk</td>
                        <td>:</td>
                        <td>123123123</td>
                    </tr>
                    <tr>
                        <td>Nama Produk</td>
                        <td>:</td>
                        <td>Biawak Gaming</td>
                    </tr>
                    <tr>
                        <td>Nama Penjual</td>
                        <td>:</td>
                        <td>Bandar Biawak</td>
                    </tr>
                    <tr>
                        <td>Status Pembayaran</td>
                        <td>:</td>
                        <td>Sudah Bayar</td>
                    </tr>
                    <tr>
                        <td>Bukti Pembayaran</td>
                        <td>:</td>
                        <td><input type="file" name="" id=""></td>
                    </tr>
                    <tr>
                        <td>Status Pesanan</td>
                        <td>:</td>
                        <td>Dalam Pengiriman</td>
                    </tr>
                </table>

                <h3 class="border-bottom py-2">Detail Pembeli</h3>
                <table class="mb-4 table">
                    <tr>
                        <td>ID Pembeli</td>
                        <td>:</td>
                        <td>123123123</td>
                    </tr>
                    <tr>
                        <td>Nama Pembeli</td>
                        <td>:</td>
                        <td>Kevin Setiawan</td>
                    </tr>
                    <tr>
                        <td>No Telepon</td>
                        <td>:</td>
                        <td>+62 82152122124</td>
                    </tr>
                    <tr>
                        <td>Nama Produk</td>
                        <td>:</td>
                        <td>Biawak Gaming</td>
                    </tr>
                    <tr>
                        <td>Nama Penjual</td>
                        <td>:</td>
                        <td>Bandar Biawak</td>
                    </tr>
                    <tr>
                        <td>Alamat Pembeli</td>
                        <td>:</td>
                        <td>Taman Lestari Blok A7 No 13, Kel. Kibing, Kec. Batu Aji, Batam, Kepulauan Riau</td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
@endsection
