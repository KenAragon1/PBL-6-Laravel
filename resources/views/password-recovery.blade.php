@extends('templates.nav-footer')

@section('content')
    <div class="container bg-white w-50 my-5 p-5 shadow-sm">
        <h1 class="text-success text-center mb-3">Password Recovery</h1>
        <form method="post">
            <!-- Email input -->
            <div class="form-outline mb-4">
                <label class="form-label" for="email">Email</label>
                <input type="email" id="email" class="form-control" />
            </div>
            
            <!-- 2 column grid layout for inline styling -->
            <div class="row mb-4">
                <div class="col-md-8">
                    <!-- Checkbox -->
                    <div class="form-check">
                        
                    </div>
                </div>
                <div class="col-md-4 text-end">
                    <!-- Simple link -->
                    <a href="/lupa-password">Ingat Password?</a>
                </div>
            </div>
            <!-- Submit button -->
            <button type="button" class="btn btn-success btn-block mb-4" style="width: 100%">
                Kirim Email Reset Password
            </button>
        </form>
    </div>
@stop
