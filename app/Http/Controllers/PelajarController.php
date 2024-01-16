<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class PelajarController extends Controller
{
    //
    public function index()
    {
        if(!Auth::check()) {
            return redirect('/');
        } else {
            return view('dashboard.dashboard');
        }
    }
}
