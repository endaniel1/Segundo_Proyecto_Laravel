<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller {
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
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct() {
        $this->middleware('guest')->except('logout');
    }
//aqui puedo ver o redirecionar por medio de mas logica en vez de con la variavle de redirecionamemiento esta funcion mas q todo se utiliza para q cuando sea niveles de usurario
    protected function redirectTo() {

        if (Auth::user()->type == "admin") {
            return "admin";
        } else if (Auth::user()->type == "member") {
            return "/";
            dd("falta crear la vista de member");
        }
    }
}
