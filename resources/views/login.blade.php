@extends('templates.nav-footer')

@section('content')
    <div class="container bg-white my-5 p-5 shadow-sm" style="width:30rem;">
        <h1 class="text-success text-center mb-3">Login</h1>
        <form method="post">
            <!-- Email input -->
            <div class="form-outline mb-4">
                <label class="form-label" for="email">Email</label>
                <input type="email" id="email" class="form-control" />
            </div>
            <!-- Password input -->
            <div class="form-outline mb-4">
                <label class="form-label" for="password">Password</label>
                <input type="password" id="password" class="form-control" />
            </div>
            <!-- 2 column grid layout for inline styling -->
            <div class="row mb-4">
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
            <button type="button" class="btn btn-success btn-block mb-4" style="width: 100%">
                Login
            </button>
            <p>Belum Punya Akun? <a href="{{ url('/register')}}">Register</a></p>
        </form>
    </div>
@stop
