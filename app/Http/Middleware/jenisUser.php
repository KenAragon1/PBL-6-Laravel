<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\User;
use Dotenv\Util\Str;
use Illuminate\Http\Request;
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
    public function handle(Request $request, Closure $next, String $role): Response
    {
            // $user = User::where('jenis_pengguna', $request->jenis_pengguna)->first();
            // if($user->jenis_pengguna == 'Penjual' and $user->jenis_pengguna == 'Pembeli'){
            //     return redirect('/');
            // } else {
            //     return redirect('/login');
            // }

        if($request->user()->hasRole($role)){
            return redirect('/');
        } else {
            return redirect('/login');
        }
        return $next($request);
    }
}
