<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
//public
Route::post('register', 'Api\\AuthController@register');
Route::post('login', 'Api\\AuthController@login');
// try to get githubid for user given an email
Route::middleware('auth:sanctum')->post('github_id', [UserController::class, 'findGithubIdForUser']);

//Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
 //   return $request->user();
//});

Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::apiResource('tasks', 'TasksApiController');
});

