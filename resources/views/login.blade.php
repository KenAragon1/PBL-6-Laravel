@extends('templates.nav-footer')

@section('content')
    <div class="container bg-white my-5 p-5 shadow rounded-5" style="width:30rem;">
    <center><img src="{{ asset('logo2.png') }}" alt="Logo" height="95px" width="95px"></center>
        <h1 class="text-success text-center mb-3">Login</h1>
        @if(session()->has('error'))
            <div class="alert alert-danger alert-dismissible fade show mt-3" role="alert">
                <strong>{{ session('error') }}</strong> 
                
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        @if(session()->has('sukses'))
            <div class="alert alert-success alert-dismissible fade show mt-3" role="alert">
                <strong>{{ session('sukses') }}</strong> 
                
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        <form method="post" action="/login">
            @csrf
            <!-- Email input -->
            <div class="form-outline mb-2">
                <label class="form-label" for="username">Username</label>
                <input type="text" id="username" name="username" class="form-control" required/>
            </div>
            <!-- Password input -->
            <div class="form-outline mb-2">
                <label class="form-label" for="password">Password</label>
                <input type="password" id="password" name="password" class="form-control" required/>
            </div>
            <!-- 2 column grid layout for inline styling -->
            <div class="row mb-2">
                <div class="col-md-8">
                    <!-- Checkbox -->
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="ingatSaya" checked />
                        <label class="form-check-label" for="ingatSaya">
                            Ingat Saya
                        </label>
                    </div>
                </div>
                <div class="col-md-4 text-end">
                    <!-- Simple link -->
                    <a href="{{url('/password-recovery')}}">Lupa Password?</a>
                </div>
            </div>
            <!-- Submit button -->
            <button type="submit" class="btn btn-success btn-block mb-4" id="login" style="width: 100%">
                Login
            </button>
            <p>Belum Punya Akun? <a href="/register">Register</a></p>
        </form>
    </div>
@stop
