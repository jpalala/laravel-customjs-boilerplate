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
    if(empty($_COOKIE['auth_token']))
    {
        return 'User auth token missing';
    }
    $subtitle = 'Dashboard!';
    dd($subtitle);
    return view('dashboard', [
        'subtitle' => $subtitle
    ]);
  }
}
