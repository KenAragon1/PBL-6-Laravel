<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
// use Intervention\Image\Facades\Image as Image;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;

class profilController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id_pengguna)
    {
        $data = User::find($id_pengguna);
        return view('profil-user', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id_pengguna, User $user)
    {
        $this->validate($request, [
            'nama' => 'required',
            'email' => 'required|email',
            'nohp' => 'required',
            'jenis_kelamin' => 'required',       
            'ttl' => 'required',       
            'alamat' => 'required',
            'pekerjaan' => 'required',
            'foto' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);

        // $valid['nohp'] = "+62".$valid['nohp'];

        $user = User::findOrFail($id_pengguna);
        if($request->hasFile('foto')){
            $image = $request->file('foto');
            // $image = Image::make($image)->resize(300, 200)->encode();
            $image->storeAs('foto', $image->hashName());

            File::delete(public_path('images/foto/' . $user->foto));

            $user->update([
                'nama' => $request->nama,
                'email' => $request->email,
                'nohp' => $request->nohp,
                'jenis_kelamin' => $request->jenis_kelamin,
                'ttl' => $request->ttl,
                'alamat' => $request->alamat,
                'pekerjaan' => $request->pekerjaan,
                'foto' => $image->hashName()
            ]);
            return back()->with('sukses', 'Berhasil Mengedit Data Profil.');  

        } else {
            $user->update([
                'nama' => $request->nama,
                'email' => $request->email,
                'nohp' => $request->nohp,
                'jenis_kelamin' => $request->jenis_kelamin,
                'ttl' => $request->ttl,
                'alamat' => $request->alamat,
                'pekerjaan' => $request->pekerjaan,


            ]);
            return back()->with('sukses', 'Berhasil Mengedit Data Profil.');  

        }

        
        return back()->with('error', "Gagal Mengedit Data!");

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
