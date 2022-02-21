<?php

namespace App\Http\Controllers;

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

}
