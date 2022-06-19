<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
  /*
   * Ensure we are authenticated before being able to access 
   */
  public function __construct()
  {
    $this->middleware('auth');
  }

  public function home() {    
    $user = Auth::user();
    $authToken = $user->createToken('auth-token')->plainTextToken;   
    Cookie::queue(Cookie::make('auth-token', $authToken, 60));   
    return view('dashboard'); 
  }
}
