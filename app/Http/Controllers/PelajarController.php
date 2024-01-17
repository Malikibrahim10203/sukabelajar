<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class PelajarController extends Controller
{
    //
    public function index()
    {
        $materi = DB::table('materi')->leftJoin('users', 'materi.id', '=', 'users.id')
        ->get();

        $transaksi = DB::table('materi')
        ->join('transaksi', 'materi.id_materi', '=', 'transaksi.id_materi')
        ->join('users', 'transaksi.id', '=', 'users.id')
        ->where('transaksi.id', '=', Auth::User()->id)
        ->get();

        if(!Auth::check()) {
            return redirect('/');
        } else {
            return view('dashboard.dashboard', ['materi'=>$materi, 'transaksi'=>$transaksi]);
        }
    }

    public function proses_beli(Request $request)
    {
        DB::table('transaksi')->insert([
            'id_materi'=>$request->id_materi,
            'id'=>Auth::User()->id,
            'modal_transaksi'=> Str::random(5),
        ]);

        return redirect("/dashboardpelajar");
    }
}
