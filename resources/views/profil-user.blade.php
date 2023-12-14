@extends('templates.nav-footer')

@section('content')
    <div class="container card pb-3 pt-3 rounded mb-5 mt-5" style="max-width: 40rem">
        <div class="container mb-3">
            <center>
                <strong>
                    <h1>Profil</h1>
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
            <img src="{{ asset('images/foto/'.$data->foto) }}" alt="Foto Profil"
                class="rounded-circle mb-5 align-center-center profile-img" style="width: 400px; height:400px;" />
        </div>
        <div class="container mb-5">
            <div class="row">
                <div class="col-md-3 border-bottom">
                    <p>Nama Lengkap</p>
                </div>
                <div class="col-md-9 border-bottom">
                    <p>{{ $data->nama }}</p>
                </div>
            </div>
            <div class="row">
                <div class="col-md-3 border-bottom">
                    <p>Username</p>
                </div>
                <div class="col-md-9 border-bottom">
                    <p>{{ $data->username }}</p>
                </div>
            </div>
            <div class="row">
                <div class="col-md-3 border-bottom">
                    <p>Jenis Pengguna</p>
                </div>
                <div class="col-md-9 border-bottom">
                    <p>{{ $data->jenis_pengguna }}</p>
                </div>
            </div>
            <div class="row border-bottom">
                <div class="col-md-3">
                    <p>Jenis Kelamin</p>
                </div>
                <div class="col-md-9">
                    <p>{{ $data->jenis_kelamin }}</p>
                </div>
            </div>
            <div class="row border-bottom">
                <div class="col-md-3">
                    <p>Tanggal Lahir</p>
                </div>
                <div class="col-md-9">
                    <p>{{ $data->ttl }}</p>
                </div>
            </div>
            <div class="row border-bottom">
                <div class="col-md-3">
                    <p>Email</p>
                </div>
                <div class="col-md-9">
                    <p>{{ $data->email }}</p>
                </div>
            </div>
            <div class="row border-bottom">
                <div class="col-md-3">
                    <p>No HP</p>
                </div>
                <div class="col-md-9">
                    <p>{{ $data->nohp }}</p>
                </div>
            </div>
            <div class="row border-bottom">
                <div class="col-md-3">
                    <p>Alamat</p>
                </div>
                <div class="col-md-9">
                    <p>{{ $data->alamat }}</p>
                </div>
            </div>
        </div>

        <div class="container">
            <a href="{{url('/')}}" class="btn btn-primary">Kembali</a>
            <a href="" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="">Password</a>
            <a href="/profil_user/" id="editProfil" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#modal-edit">Edit Profil</a>
            <a href="/logout" class="btn btn-danger">Log Out</a>
        </div>
    </div>

    <!-- modal edit start -->
    <div class="modal fade" id="modal-edit">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">Edit Profil</div>
                <div class="modal-body">
                    <form action="{{ route('profil_user.update', Auth::user()->id_pengguna) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('PATCH')
                        <div class="form-outline mb-2">
                            <label class="form-label" for="nama">Nama Lengkap</label>
                            <input type="text" name="nama" class="form-control" value="{{ $data->nama }}" />
                        </div>
                        <div class="form-outline mb-2">
                            <label class="form-label" for="jenisKelamin">Jenis Kelamin</label>
                            <select name="jenis_kelamin"  class="form-control">
                                <option disabled selected>-- Jenis Kelamin --</option>
                                <option value="Laki-laki" {{ $data->jenis_kelamin == 'Laki-laki' ? 'selected' : ''}}>Laki-laki</option>
                                <option value="Perempuan" {{ $data->jenis_kelamin == 'Perempuan' ? 'selected' : ''}}>Perempuan</option>
                            </select>
                        </div>
                        <div class="form-outline mb-2">
                            <label class="form-label" for="birth">Tanggal Lahir</label>
                            <input type="date" name="ttl" class="form-control" value="{{ $data->ttl }}"/>
                        </div>
                        <div class="form-outline mb-2">
                            <label class="form-label" for="email">Email</label>
                            <input type="email" name="email" class="form-control" value="{{ $data->email }}" />
                        </div>
                        <div class="form-outline mb-2">
                            <label class="form-label" for="noHP">No HP</label>
                            <input type="text" name="nohp" class="form-control" value="{{ $data->nohp }}">
                        </div>
                        <div class="form-outline mb-2">
                            <label class="form-label" for="alamat">Alamat</label>
                            <textarea name="alamat" class="form-control"  cols="30" rows="5">{{ $data->alamat }}</textarea>
                        </div>
                        <div class="form-outline mb-2">
                            <label class="form-label" for="foto">Foto Profil</label>
                            <input type="file" name="foto" class="form-control" value="{{ $data->nohp }}">
                        </div>
                        <button type="submit" id="ubahBtn" class="btn btn-primary btn-block mb-4">
                            Ubah
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- modal edit end -->
@stop
