<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function doLogin(Request $request) {
      if (Auth::attempt(['email' => $email, 'password' => $password])  {
             return redirect()->intended('dashboard');
      }
  }
}
