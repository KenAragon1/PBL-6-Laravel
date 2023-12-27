@extends('templates.nav-footer')

@section('content')
    <div class="container card pb-3 pt-3 rounded mb-5 mt-5" style="max-width: 40rem">
        <div class="container mb-3">
            <center>
                <strong>
                    <h1>Bukti Pembayaran</h1>
                </strong>
            </center>
        </div>
        @if (session()->has('sukses'))
            <div class="alert alert-success alert-dismissible fade show mt-3" role="alert">
                <strong>{{ session('sukses') }}</strong> 
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        @if (session()->has('error'))
            <div class="alert alert-danger alert-dismissible fade show mt-3" role="alert">
                {{ session('error') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

            
        <div class="container align-items-center justify-content-center d-flex">
            <img src="{{ asset('images/foto-produk/'.$data->produk->foto_produk) }}" alt="Foto Profil"
                class="rounded-circle mb-5 align-center-center profile-img" style="width: 400px; height:400px; aspect-ratio:1/1" />
        </div>
        <div class="container mb-5">
            <div class="row mt-3">
                <div class="col-md-3 border-bottom">
                    <p>ID Pemesanan</p>
                </div>
                <div class="col-md-9 border-bottom">
                    <p>{{ $data->id_pemesanan }}</p>
                </div>
            </div>
            <div class="row mt-3">
                <div class="col-md-3 border-bottom">
                    <p>Nama Produk</p>
                </div>
                <div class="col-md-9 border-bottom">
                    <p>{{ $data->produk->nama_produk }}</p>
                </div>
            </div>
            <div class="row mt-3">
                <div class="col-md-3 border-bottom">
                    <p>Jumlah Produk</p>
                </div>
                <div class="col-md-9 border-bottom">
                    <p>{{ $data->jumlah_produk }}</p>
                </div>
            </div>
            <div class="row mt-3">
                <div class="col-md-3 border-bottom">
                    <p>Deskripsi Produk</p>
                </div>
                <div class="col-md-9 border-bottom">
                    <p>{{ $data->produk->deskripsi }}</p>
                </div>
            </div>
            <div class="row mt-3">
                <div class="col-md-3 border-bottom">
                    <p>Total Harga</p>
                </div>
                <div class="col-md-9 border-bottom fs-5">
                    <p>Rp. {{ $data->total_transaksi }},-</p>
                </div>
            </div>
            <form action="/pesanan/uploadBukti/{{ $data->id_pemesanan }}" method="post" enctype="multipart/form-data">
              @csrf
              @method('PATCH')
              <div class="row mt-3 border-bottom " >
                  <div class="col-md-3 ">
                      <p>Jenis Bank</p>
                  </div>
                  <div class="col-md  ">
                    <label class="fs-5">(An. {{ $data->produk->pengguna->nama }})</label>
                    <select name="jenis_pembayaran" class="form-control mb-1" required>
                      <option value="BCA" id="bank">-- Pilih Jenis Bank --</option>
                      <option value="BCA" id="bank">BCA - 014 987345764</option>
                      <option value="Mandiri" id="bank">Mandiri - 008 347567365</option>
                      <option value="BRI" id="bank">BRI - 002 756234875</option>
                      <option value="BNI" id="bank">BNI - 009 127349274</option>
                      <option value="BTN" id="bank">BTN - 200 731124345</option>
                      <option value="Muamalat" id="bank">Muamalat - 147 666772736</option>
                    </select>
                  </div>
              </div>
              <div class="row mt-3">
                <div class="col-md-3 mt-3">
                    <p>Total Harga</p>
                </div>
                <div class="col form-control border-0 ">
                  <input class="form-control form-control-lg" type="file" id="uploadBukti" name="bukti_pembayaran" required>
                </div>
              </div>
              <div class="col-12 d-flex justify-content-end">
                <button type="submit" class="btn btn-success btn-block" id="btnUpload" >
                  Upload Bukti
                </button>
              </div>
            </form>
                
          </div>

        <div class="container">
            <a href="{{url('/pesanan')}}" class="btn btn-primary">Kembali</a>
        </div>
    </div>


@stop
