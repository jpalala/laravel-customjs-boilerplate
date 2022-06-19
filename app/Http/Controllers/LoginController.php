<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
     use AuthenticatesUsers;
    protected $redirectAfterLogout = '/';

    /**
     * Where to redirect users after login.
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
          $this->middleware('guest', ['except' => 'logout']);
      }
     
      public function doLogin(Request $request) {
          if (Auth::attempt(['email' => $email, 'password' => $password])  {
               return redirect()->intended('dashboard');
          }
      }
}
