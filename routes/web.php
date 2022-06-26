<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\GithubAuthController;
use Illuminate\Support\Facades\Auth;

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

Route::post('login',[LoginController::class, 'authenticate'])->name('login');

Route::get('/auth/github',[GithubAuthController::class, 'redirect']);

Route::get('/auth/github/callback', [GithubAuthController::class, 'handleCallback']);

Route::get('dashboard',
    function () {
        $user = Auth::user();
        if(!$user || empty($_COOKIE['XSRF-TOKEN'])) {
            redirect('login');
        }

        return view('dashboard', ['authToken' => $_COOKIE['XSRF-TOKEN']]);
    }
)->middleware('auth')->name('dashboard');

Route::get('/logout', LogoutController::class); //delete user session here

// generate tokens
Route::post('/tokens/create', function (Request $request) {
    $token = $request->user()->createToken($request->token_name);

    return ['token' => $token->plainTextToken];
});

// for testing
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['middleware' => ['auth/sanctum'], 'prefix' => 'pub',  'as' => 'pub-'], function () {
    require __DIR__ . '/pub/articles.php';
    require __DIR__ . '/pub/announcements.php';
});
