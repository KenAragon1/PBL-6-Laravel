@extends('templates.nav-footer')

@section('content')

<div class="container bg-white shadow border p-3">
    <p>{{ $produk->nama_produk }}</p>
    <form method="post" action="{{url('/dashboard/produk/edit/'.$produk->id_produk)}}" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="form-outline mb-4">
            <label class="form-label" for="foto">Foto Produk</label>
            <input type="file" id="foto" name="foto_produk" class="form-control" />
        </div>
        <div class="form-outline mb-4">
            <label class="form-label" for="nama">Nama Produk</label>
            <input type="text" id="nama" name="nama_produk" class="form-control" required/>
        </div>
        <div class="form-outline mb-4">
            <label class="form-label" for="kategori">Kategori</label>
            <input type="text" id="kategori" name="kategori" class="form-control" required/>
        </div>
        <div class="form-outline mb-4">
            <label class="form-label" for="harga">Harga Produk</label>
            <input type="number" id="harga" name="harga" class="form-control" required/>
        </div>
        <div class="form-outline mb-4">
            <label class="form-label" for="deskripsi">Deskripsi Produk</label>
            <textarea id="deskripsi" name="deskripsi" class="form-control" required></textarea>
        </div>
        <button class="btn btn-success">Edit</button>
    </form>
</div>
    
@endsection