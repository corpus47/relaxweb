<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    //

    public static function get_user_by_id($user_id = NULL) {

        if($user_id != NULL) {
            return User::find($user_id);
        } else {
            return NULL;
        }

    }
}
