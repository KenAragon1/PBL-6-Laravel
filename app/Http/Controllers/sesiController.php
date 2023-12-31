<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use PhpParser\Node\Stmt\Echo_;

class sesiController extends Controller
{
    public function halLogin(){
        return view('login');
    }
    public function halRegist(){
        return view('register');
    }

    public function login(Request $request){
        $login = $request->validate([
            'username' => 'required',
            'password' => 'required'
        ]);

        if(Auth::attempt($login)){
            $request->session()->regenerate();
            return redirect()->intended('/')->with('sukses', 'Login Successful');
        }

        return back()->with('error', 'Login Gagal!');
    }

    public function register(Request $request){
        $valid = $request->validate([
            
            'jenis_pengguna'=> 'required',
            'nama'=> 'required',
            'email'=> 'required|email|unique:pengguna',
            'username'=> 'required|unique:pengguna',
            'nohp'=> 'required',
            'password'=> 'required'
        ]);

        $valid['password'] = bcrypt($valid['password']);
        $valid['nohp'] = "+62".$valid['nohp'];
        $valid['id_pengguna'] = rand(100000000,999999999);

        if (User::create($valid)) {
            return redirect('/login')->with('sukses', 'Registrasi Berhasil.');    
        } else {

            return redirect('/register')->with('errReg', 'Registration Failed.');    
        }  
    }

    public function logout(){
        Auth::logout();
        return redirect('/');
    }
}

