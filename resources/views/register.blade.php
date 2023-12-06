@extends('templates.nav-footer')

@section('content')
    </nav>
    <div class="container bg-white w-50 my-5 p-5 shadow-sm">
        @if(session()->has('errReg'))
            <div class="alert alert-danger alert-dismissible fade show mt-3" role="alert">
                <strong>{{ session('errReg') }}</strong>
                
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        <h1 class="text-success text-center mb-3">Register</h1>
        <form method="post" action="/register">
            @csrf
            <!-- Jenis Pengguna -->
            <div class="form mb-4">
                <label class="form-label" for="jenis_pengguna">Jenis Pengguna</label>
                <select name="jenis_pengguna" id="jenis_pengguna" class="form-select" aria-label="Default select example">
                    <option selected disabled>-- Pilih Jenis Pengguna --</option>
                    <option value="Pembeli">Pembeli</option>
                    <option value="Penjual">Penjual</option>
                </select>
            </div>
            <!-- nama input -->
            <div class="form-outline mb-4">
                <label class="form-label" for="nama">Nama Lengkap</label>
                <input type="text" id="nama" class="form-control" name="nama" required/>
            </div>
            <!-- Email input -->
            <div class="form-outline mb-4">
                <label class="form-label" for="email">Email</label>
                <input type="email" id="email" class="form-control" name="email" required/>
            </div>
            <!-- Username input -->
            <div class="form-outline mb-4">
                <label class="form-label" for="username">Username</label>
                <input type="text" id="username" class="form-control" name="username" required/>
            </div>
            {{-- No HP input --}}
            <div class="form-outline mb-4">
                <label class="form-label" for="nohp">No HP</label>
                <input type="number" id="nohp" class="form-control" name="nohp" required/>
            </div>
            <!-- Password input -->
            <div class="form-outline mb-4">
                <label class="form-label" for="password">Password</label>
                <input type="password" id="password" class="form-control" name="password"  required/>
            </div>
            <!-- 2 column grid layout for inline styling -->
            <div class="row mb-4">
                <div class="col-md-8">
                    <!-- Checkbox -->
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="ingatSaya" checked />
                        <label class="form-check-label" for="ingatSaya">
                            <p>Saya Setuju Dengan <a href="">Syarat & Ketentuan</a> yang Berlaku</p>
                        </label>
                    </div>
                </div>
            </div>
            <!-- Submit button -->
            <button type="submit" class="btn btn-success btn-block mb-4" style="width: 100%">
                Register
            </button>
            <p>Sudah Punya Akun? <a href="{{ url('/login')}}">Login</a></p>
        </form>
    </div>

@stop
