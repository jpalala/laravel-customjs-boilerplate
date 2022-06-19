<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;

use App\Models\User;
use Laravel\Socialite\Facades\Socialite;

class GithubAuthController extends Controller
{
    /**
   * Redirect the user to the GitHub authentication page.
   *
   * @return \Illuminate\Http\Response
   */
  public function redirect(Request $request) 
  {
    return Socialite::driver('github')->redirect();
  }

  /**
   * Obtain the user information from GitHub.
   *
   * @return \Illuminate\Http\Response
   */
  public function handleCallback(Request $request) {
    $githubUser = Socialite::driver('github')->user();
    $uuid = Str::uuid()->toString();

    $user = new User();
    $password = bcrypt($uuid); // password can be random because no existing user exist.

    $user = User::updateOrCreate([
        'github_id' => $githubUser->id,
    ], [
        'name' => $githubUser->name,
        'email' => $githubUser->email,
        'password' => $password,
        'preffered_login' => 'github',
    ]);
 
    Auth::login($user);
    return redirect('dashboard');
  }
}
