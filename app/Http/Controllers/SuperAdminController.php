<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SuperAdminController extends Controller
{
    //
    function index() {
        return view('dashboards.superadmin.index')->with([
            'title' => 'Super Admin kezdőlap',
        ]);
    }

    function profile() {
        return view('dashboards.superadmin.profile');
    }

    function settings() {
        return view('dashboards.superadmin.settings');
    }
}
