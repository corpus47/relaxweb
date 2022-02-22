<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Http\Controllers\UsersController;

class SendEmailController extends Controller
{
    //
    public static function after_registration_to_user($user_id = NULL) {

        if($user_id == NULL) {
            return redirect('/')->with('message', 'Hiba: ' . __METHOD__);
        }

        $user = UsersController::get_user_by_id($user_id);

        $email_data = array(
            'name' => $user->name,
            'email' => $user->email,
        );

        // send email with the template
        Mail::send('emails.after_user_registration_email', $email_data, function ($message) use ($email_data) {
            $message->to($email_data['email'], $email_data['name'])
                ->subject('Welcome to Relaxweb')
                ->from('info@relaxweb.wplabor.hu', 'RelaxWeb');
        });

    }

    public static function after_registration_to_owner($owner_id) {
        if($owner_id == NULL) {
            return redirect('/')->with('message', 'Hiba: ' . __METHOD__);
        }

        $user = UsersController::get_user_by_id($owner_id);

        $email_data = array(
            'name' => $user->name,
            'email' => $user->email,
        );

        // send email with the template
        Mail::send('emails.after_user_registration_to_owner_email', $email_data, function ($message) use ($email_data) {
            $message->to($email_data['email'], $email_data['name'])
                ->subject('Welcome to Relaxweb')
                ->from('info@relaxweb.wplabor.hu', 'RelaxWeb');
        });
    }


}
