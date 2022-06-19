<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\GithubAuthController;

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
Route::post('login',[LoginController::class, 'doLogin'])->name('login');


Route::get('/auth/github',[GithubAuthController::class, 'redirect']);
Route::get('/auth/github/callback', [GithubAuthController::class, 'handleCallback']);
Route::get('/dashboard', function () {
    return view('dashboard');
});
Route::get('/logout', LogoutController::class); //delete user session here

