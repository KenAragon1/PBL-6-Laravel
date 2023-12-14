<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\User;
use Dotenv\Util\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class jenisUser
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next,$role)
    {
        if(Auth::check()){

            $user = Auth::user();
                if ($user->jenis_pengguna == $role) {
                    return $next($request);
                } else {
                    return redirect('/');
    
                }
        } else {
            return redirect('/login')->with('error', "Silahkan Login Terlebih Dahulu!");
        }
        

    }
}
