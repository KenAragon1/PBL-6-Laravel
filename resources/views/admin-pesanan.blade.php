@extends('templates.dashboard')

@section('content')
    {{-- <div class="container col-9 bg-white my-3 shadow">
        @if (session()->has('sukses'))
                <div class="alert alert-success alert-dismissible fade show mt-3" role="alert">
                    {{ session('sukses') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
        <h1 class="p-3 border-bottom text-muted text-center">Pesanan</h1>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">ID Pesanan</th>
                    <th scope="col">Nama Pembeli</th>
                    <th scope="col">Produk</th>
                    <th scope="col">Jumlah Produk</th>
                    <th scope="col">Total Harga</th>
                    <th scope="col">Jenis Pembayaran</th>
                    <th scope="col">Detail</th>
                </tr>
            </thead>
            @foreach ($datafinal as $data)
                
            <tbody>
                <td>{{ $data->id_pemesanan }}</td>
                <td>{{ $data->pembeli->nama }}</td>
                <td>{{ $data->produk->nama_produk }}</td>
                <td>{{ $data->cart->jumlah_produk }}</td>
                <td>{{ $data->cart->total_harga }}</td>
                <td>{{ $data->jenis_pembayaran }}</td>
                <td>
                    @if ($data->status_pengiriman == 'Pesanan Sudah Dikirim oleh Penjual')
                        <a href="/dashboard/detail_pesanan/{{ $data->id_pemesanan }}" class="btn btn-primary"><i class="bi bi-eye"></i></a>
                        <button class="btn btn-success">Terkirim <i class="bi bi-check2-square"></i></button>
                    
                    @else
                    <a href="/dashboard/detail_pesanan/{{ $data->id_pemesanan }}" class="btn btn-primary"><i class="bi bi-eye"></i></a>
                    <a href="/mengirimPesanan/{{ $data->id_pemesanan }}" onclick="return confirm('Yakin Ingin Mengirim Pesanan ini? ')" class="btn btn-success"><i class="bi bi-send-plus"></i></a>
                    @endif
                </td>
            </tbody>
            @endforeach

        </table>
    </div> --}}
   
        <div class="container col-9 bg-white my-3 shadow">
            <h1 class="p-3 border-bottom text-muted text-center">Pesanan</h1>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">ID Pesanan</th>
                        <th scope="col">Nama Pembeli</th>
                        <th scope="col">Produk</th>
                        <th scope="col">Jumlah Produk</th>
                        <th scope="col">Total Harga</th>
                        <th scope="col">Jenis Pembayaran</th>
                        <th scope="col">Detail</th>
                    </tr>
                </thead>
                @foreach ($datafinal as $data)
        
                <tbody>
                    <td>{{ $data->id_pemesanan }}</td>
                    <td>{{ $data->pembeli->nama }}</td>
                    <td>{{ $data->produk->nama_produk }}</td>
                    <td>{{ $data->jumlah_produk }}</td>
                    <td>{{ $data->total_transaksi }}</td>
                    <td>{{ $data->jenis_pembayaran }}</td>
                    <td>
                        <a href="/dashboard/detail_pesanan/{{ $data->id_pemesanan }}" class="btn btn-primary"><i class="bi bi-eye"></i></a>
                        <a href="" class="btn btn-warning"><i class="bi bi-floppy"></i></a>
                    </td>
                </tbody>
                @endforeach
            </table>
        </div>
        
@endsection
