<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GoodController extends Controller
{
    //
    function index() {
        return view('dashboards.good.index')->with([
            'title' => 'Good User dashboard',
        ]);
    }

    function profile() {
        return view('dashboards.good.profile');
    }

    function settings() {
        return view('dashboards.good.settings');
    }
}
