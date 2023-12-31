@extends('templates.dashboard')

@section('content')
    <div class="col-9 mt-4 card container bg-white shadow border-0 mb-4">
        @if (session()->has('sukses'))
        <div class="alert alert-success alert-dismissible fade show mt-3" role="alert">
            <strong>{{ session('sukses') }}!</strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif
        @if (session()->has('sukses1'))
        <div class="alert alert-success alert-dismissible fade show mt-3" role="alert">
            <strong>{{ session('sukses1') }}!</strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif
        <a class="btn btn-success my-3" id="tambahProduk" data-bs-toggle="modal" data-bs-target="#tambah-produk"><i
                class="bi bi-plus-circle-fill"></i> Tambah Produk</a>
        <div class="d-flex flex-wrap">
            @foreach ($produk as $produk)
                <div class="card p-2 m-2 shadow" style="width: 15rem">
                    <img class="card-img-top" src="{{ asset('images/foto-produk') }}/{{ $produk->foto_produk }}"
                        alt="Card image cap" style="aspect-ratio: 1.4/1;" />
                    <div class="card-body">
                        <h5 class="card-title" style="width:100%;white-space:nowrap; overflow:hidden; text-overflow:ellipsis;">{{ $produk->nama_produk }}</h5>
                        <p class="text-success">Rp {{ $produk->harga }}</p>
                        <a href="{{ url('/produk-detail/' . $produk->id_produk) }}" class="btn btn-primary w-100 mb-2">Detail</a>
                        <a href="{{ url('dashboard/produk/edit/' . $produk->id_produk) }}" class="btn btn-success w-100 mb-2" id="editBtn">Edit</a>
                        <form action="{{url('/dashboard/produk/delete/'.$produk->id_produk)}}" method="post">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger w-100">Hapus</button>
                        </form>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <div class="modal fade" id="tambah-produk">
        <div class="modal-dialog modal-xl">
            <div class=" modal-content">
                <div class="modal-header">
                    <h1>Tambah Produk</h1>
                </div>
                <div class=" modal-body">
                    <form action="/dashboard/produk/tambah" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                        <div class="form-outline mb-4">
                            <label class="form-label" for="nama">Nama Produk</label>
                            <input type="text" id="nama" name="nama_produk" class="form-control" required />
                        </div>
                        <div class="col-10 form-outline mb-4 ">
                            <select name="id_kategori" id="kategori" class="form-control">
                                <option disabled selected>-- Kategori --</option>
                                @foreach ($kategori as $i)
                                    <option value="{{ $i->id }}" id="kategori-option">{{ $i->kategori }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-auto">

                            <button class="btn btn-primary " data-bs-toggle="modal" data-bs-target="#tambah-kategori">Tambah Kategori</button>
                        </div>
                        
                        <div class="form-outline mb-4">
                            <label class="form-label" for="harga">Harga Produk</label>
                            <input type="number" id="harga" name="harga" class="form-control"  required/>
                        </div>
                        <div class="form-outline mb-4">
                            <label class="form-label" for="deskripsi">Deskripsi Produk</label>
                            <textarea id="deskripsi" name="deskripsi" class="form-control" required></textarea>

                        </div>
                        <div class="form-outline mb-4">
                            <label class="form-label" for="stok">Stok Produk</label>
                            <input type="number" id="stok" name="stok" class="form-control" required />
                        </div>
                        <div class="form-outline mb-4">
                            <label class="form-label" for="foto">Foto Produk</label>
                            <input type="file" id="foto" name="foto_produk" class="form-control" />
                        </div>
                        <button class="btn btn-success">Tambahkan Produk</button>
                    </div>
                    </form>

                </div>
                <div class="modal-footer">

                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="tambah-kategori" >
        <div class="modal-dialog modal-lg">
            <div class=" modal-content">
                <div class="modal-header">
                    <h1>Tambah Kategori</h1>
                </div>
                <div class=" modal-body ">
                    <form action="/dashboard/tambahKategori" method="post" >
                        @csrf
                        <div class="row">
                            <div class="col-2">

                                <label class="form-label" for="kategori">Nama Kategori :</label>
                            </div>
                        <div class="form-outline mb-4 col-6">
                            <input type="text" id="kategori" name="kategori" class="form-control" required />
                        </div>
                        <div class="col-4">

                            <button type="submit" class="btn btn-success">Tambah Kategori</button>
                        </div>
                    </div>
                    </form>

                </div>
                <div class="modal-footer">

                </div>
            </div>
        </div>
    </div>
@endsection