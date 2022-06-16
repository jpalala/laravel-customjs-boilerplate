<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\CallbackProvider;
use App\Http\Controllers\RedirectController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function (Request $request) {
    return view('welcome', ['title' => 'Laravel Svelte Vite']);
});
Route::get('/callback', CallbackProvider::class);
//save whatever deetails we get to the database here and start a permanent
Route::get('/authenticate/{code}', function ($code) {
    //dd(session('code'));

    $auth_token = github_exchange_tokens($code);
    if(is_string($auth_token)) {
        dd($auth_token);
    }  else {
        return view('welcome_session', [
            'sessions' => 'whatever'
        ]);
    }

});
Route::get('/reset', RedirectController::class);

