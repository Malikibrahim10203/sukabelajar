<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\MessageBag;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

use App\Models\User;

class AuthController extends Controller
{
    //
    public function proses_login(Request $request) 
    {
        request()->validate(
            [
                'username' => 'required',
                'password' => 'required',
            ]
        );

        $kredensil = $request->only('username','password');

        if(Auth::attempt($kredensil))
        {
            $user = Auth::user();
            if($user->level == 'pengajar')
            {
                return redirect('/dashboardadmin');
            } 
            else if($user->level == 'pelajar')
            {
                return redirect('/dashboardpelajar');
            }
            return redirect()->intended('/dashboard');
        }
        return Redirect::to('/')->with('alert-gagal','Username atau Password salah!');
    }

    public function register_pengajar()
    {
        return view('register', ['level'=>2]);
    }

    public function proses_register_pengajar(Request $request)
    {
        $this->validate($request, [
            'file' => 'required'
        ]);

        // menyimpan data file yang diupload ke variabel $file
        $file = $request->file('file');

        $user = User::create([
            'nama_lengkap' => $request->name,
            'email' => $request->email,
            'username' => $request->username,
            'password' => Hash::make($request->password),
            'level' => 'pelajar',
            'img' => $file->getClientOriginalName(),
        ]);
     
        // isi dengan nama folder tempat kemana file diupload
        $tujuan_upload = 'data_file';
        $file->move($tujuan_upload,$file->getClientOriginalName());

        Session::flash('message', 'Register Berhasil. Akun Anda sudah Aktif silahkan Login menggunakan username dan password.');
        return redirect('/');
    }

    public function register_pelajar()
    {
        return view('register', ['level'=>1]);
    }

    public function proses_register_pelajar(Request $request)
    {
        $user = User::create([
            'nama_lengkap' => $request->name,
            'email' => $request->email,
            'username' => $request->username,
            'password' => Hash::make($request->password),
            'level' => 'pelajar',
        ]);

        Session::flash('message', 'Register Berhasil. Akun Anda sudah Aktif silahkan Login menggunakan username dan password.');
        return redirect('/');
    }

    public function logout(Request $request)
    {
        $request->session()->flush();
        Auth::logout();
        return redirect('/');
    }

    
}
