<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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
    // TODO: verify email..
    $user = User::updateOrCreate([
        'github_id' => $githubUser->id,
    ], [
        'name' => $githubUser->name,
        'email' => $githubUser->email,
        'password' => $password,
        'preffered_login' => 'github',
    ]);

    Auth::login($user);

    return $this->authenticated($request, $user);

  }

  /**
     * create auth token for user
     */
  protected function create_auth_cookie($user)
  {
    $token = $user->createToken('auth_token')->plainTextToken;
  }


  /**
     * Handle response after user authenticated
     * Generate a session and store token
     * @param Request $request
     * @param Auth $user
     *
     * @return \Illuminate\Http\Response
    */
  protected function authenticated(Request $request, $user)
  {
    $this->create_auth_cookie($user);
    return redirect()->intended('dashboard');
  } 

  // example query from db (only for authenticated)
  public function get_github_id(Request $request)
  {
    $request->input('id'); 
    UserbearerToken();

  }

}
