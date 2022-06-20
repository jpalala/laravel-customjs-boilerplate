<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
class UserController extends Controller
{
  public function findGithubIdForUser(Request $request) {
    $email = $request->input('email');
    $user = User::select('github_id')::where('email',$email)->first();
    if($user) {
        $response = ['githubId' => $user->github_id];
        return response($response, 200);
    } else {
        $message = 'User not found';
        return response(['message' => $message],204);
    }
  }
}
