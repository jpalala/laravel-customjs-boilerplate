<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
class UserController extends Controller
{
  public function findGithubIdForUser(Request $request) {
    $email = $request->input('email');
    $user = User::where('email' $email)->first();
    return $user->github_id;
  }
}
