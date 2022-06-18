<?php

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Laravel\Socialite\Facades\Socialite;

class GithubAuthController extends Controller
{
  public function redirect(Request $request) 
  {
    return Socialite::driver('github')->redirect();
  }

  public function callback(Request $request) {
    $githubUser = Socialite::driver('github')->user();
    $uuid = Str::uuid()->toString();

    $user = new User();
    $password = bcrypt($uuid); //if github login, password should needs reset to be set
     
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
