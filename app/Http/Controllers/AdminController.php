<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    //
    function index() {
        return view('dashboards.admin.index')->with([
            'title' => 'Admin',
        ]);
    }

    function profile() {
        return view('dashboards.admin.profile')->with([
            'title' => 'Admin profile',
        ]);
    }

    function settings() {
        return view('dashboards.admin.settings');
    }
}
