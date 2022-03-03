<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class GoodController extends Controller
{
    //
    function index() {
        return view('dashboards.good.index')->with([
            'title' => 'Good User dashboard',
        ]);
    }

    function profile() {
        return view('dashboards.good.profile')->with([
            'title' => 'Good User profile',
        ]);
    }

    function settings() {
        return view('dashboards.good.settings');
    }

    function listusers() {

        $users = User::all();

        return view('dashboards.good.listusers')->with([
            'users' => $users
        ]);

    }

    function adduser() {
        return view('dashboards.good.adduser')->with([
            'title' => 'Új felhasználó'
        ]);
    }

}
