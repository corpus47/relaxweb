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
                ->subject('Sikeres regisztráció!')
                ->from('info@relaxweb.wplabor.hu', 'RelaxWeb');
        });

    }

    public static function after_registration_to_owner($user) {
        if($user == NULL) {
            return redirect('/')->with('message', 'Hiba: ' . __METHOD__);
        }

        $owner_user = UsersController::get_user_by_id($user->owner);

        $email_data = array(
            'name' => $owner_user->name,
            'email' => $owner_user->email,
            'user_name' => $user->name,
            'user_email' => $user->email
        );

        // send email with the template
        Mail::send('emails.after_user_registration_to_owner_email', $email_data, function ($message) use ($email_data) {
            $message->to($email_data['email'], $email_data['name'], $email_data['user_name'],$email_data['user_email'])
                ->subject('Új felhasználó regisztrált!')
                ->from('info@relaxweb.wplabor.hu', 'RelaxWeb');
        });
    }


}
