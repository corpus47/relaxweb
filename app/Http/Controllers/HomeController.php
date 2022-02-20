<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if(Auth::check() && Auth::user()->id == config('global.good_user')){
            return view('dashboards.good.index')->with(['title' => 'Kezdőlap - GOD']);
        } elseif(Auth::check() && Auth::user()->privileg == 0){
            return view('dashboards.superadmin.index')->with(['title' => 'Kezdőlap - SuperAdmin']);
        } elseif(Auth::check() && Auth::user()->privileg == 1){
            return view('dashboards.admin.index')->with(['title' => 'Kezdőlap - Admin']);
        } elseif(Auth::check() && Auth::user()->privileg == 2){
            return view('dashboards.user.index')->with(['title' => 'Kezdőlap - Felhasználó']);
        }
    }
}
