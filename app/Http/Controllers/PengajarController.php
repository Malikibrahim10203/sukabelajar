<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class PengajarController extends Controller
{
    //
    public function index()
    {
        $materi = DB::table('materi')->leftJoin('users', 'materi.id', '=', 'users.id')
        ->get();

        if(!Auth::check()) {
            return redirect('/');
        } else {
            return view('dashboard.dashboard', compact('materi'));
        }
    }

    public function tambah()
    {
        return view('action.tambah');
    }

    public function proses_tambah(Request $request)
    {
        $this->validate($request, [
            'file' => 'required'
        ]);

        // menyimpan data file yang diupload ke variabel $file
        $file = $request->file('file');

        DB::table('materi')->insert([
            'id'=>Auth::User()->id,
            'nama_materi'=>$request->nama_materi,
            'deskripsi'=>$request->deskripsi,
            'img_catalog' => $file->getClientOriginalName(),
            'modal' => Str::random(5),
        ]);

        $tujuan_upload = 'data_file';
        $file->move($tujuan_upload,$file->getClientOriginalName());

        return redirect("/dashboardadmin");
    }

    public function hapus($id)
    {
        DB::table('materi')->where('id_materi',$id)->delete();
            
        return redirect('/dashboardadmin');
    }

    public function edit($id)
    {
        $materi = DB::table('materi')->where('id_materi', $id)->get();

        

        return view('action.edit', ['materi' => $materi]);
    }

    public function proses_edit(Request $request)
    {
        DB::table('materi')->where('id_materi', $request->id_materi)->update([
            'nama_materi' => $request->nama_materi,
            'deskripsi'   => $request->deskripsi,
        ]);

        return redirect('/dashboardadmin');
    }
}
