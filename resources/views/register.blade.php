@extends('templates.nav-footer')

@section('content')
    </nav>
    <div class="container bg-white w-50 my-5 p-5 shadow-sm">
        <h1 class="text-success text-center mb-3">Register</h1>
        <form method="post">
            <!-- Email input -->
            <div class="form-outline mb-4">
                <label class="form-label" for="email">Email</label>
                <input type="email" id="email" class="form-control" />
            </div>
            {{-- No HP input --}}
            <div class="form-outline mb-4">
                <label class="form-label" for="nohp">No HP</label>
                <input type="number" id="nohp" class="form-control" />
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
                            <p>Saya Setuju Dengan <a href="">Syarat & Ketentuan</a> yang Berlaku</p>
                        </label>
                    </div>
                </div>
            </div>
            <!-- Submit button -->
            <button type="button" class="btn btn-success btn-block mb-4" style="width: 100%">
                Login
            </button>
            <p>Sudah Punya Akun? <a href="{{ url('/login')}}">Login</a></p>
        </form>
    </div>

@stop
