@extends('templates.dashboard')

@section('content')
   
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
