<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    protected function redirecto(){
        if(Auth::user()->privileg == 0 ){
            return route('superadmin.dashboard');
        } elseif(Auth::user()->privileg == 1) {
            return route('admin.dashboard');
        } elseif(Auth::user()->privileg == 2) {
            return route('user.dashboard');
        }
    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function login(Request $request){
        $input = $request->all();

        if(auth()->attempt(array('email'=>$input['email'],'password'=>$input['password']))){
            if(auth()->user()->privileg == 0) {
                return redirect()->route('superadmin.dashboard');
            } elseif(auth()->user()->privileg == 1) {
                return redirect()->route('admin.dashboard');
            } elseif(auth()->user()->privileg == 2) {
                return redirect()->route('user.dashboard');
            } elseif(auth()->user->is_good()) {
                return redirect()->route('good.dashboard');
            }
        } else {
            return redirect()->route('login')->with('error','Nem megfelelő felhasználónév vagy jelszó!');
        }

    }
}
