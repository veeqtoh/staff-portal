<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

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

    protected function redirectTo()
    {
        if(auth()->user()->role === 0){
            return RouteServiceProvider::STAFF;
       
        }elseif(auth()->user()->role === 1){
            return RouteServiceProvider::HR;
        
        }elseif(auth()->user()->role === 3){
            return RouteServiceProvider::ADMIN;
        
        }elseif(auth()->user()->role === 4){
            return RouteServiceProvider::MD;
        
        }elseif(auth()->user()->role === 5){
            return RouteServiceProvider::CREW;
        
        }
        return '/home';
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
}
