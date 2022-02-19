<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        //dd($data);
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'phone' => ['required', 'string', 'min:10','max:12','regex:/^(?:\+)?(\d{9,11})$/'],
            'mobile' => ['required', 'string', 'min:10','max:12','regex:/^(?:\+)?(\d{9,11})$/'],
            'zipcode' => ['required', 'numeric', 'digits:4'],
            'city' => [ 'required', 'string'],
            'address' => [ 'required', 'string'],
            'account_number' => ['numeric', 'digits:24'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'terms' => ['required','in:agree']
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'phone' => $data['phone'],
            'mobile' => $data['mobile'],
            'zipcode' => $data['zipcode'],
            'city' => $data['city'],
            'address' => $data['address'],
            'account_number' => $data['account_number'],
            'owner'=> config('global.good_user')
        ]);
    }
}
