<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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
Route::group(['namespace' => 'App\Http\Controllers\Auth',], function () {
    Route::post('register', 'RegisterController');
    Route::post('login', 'LoginController');
//    Route::post('login', [AuthController::class, 'login']);
});

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['middleware' => 'auth:sanctum'], function() {
    Route::post('logout', 'App\Http\Controllers\Auth\LogoutController');
});

Route::group(['namespace' => 'App\Http\Controllers\Tasks', 'prefix' => 'tasks'], function () {
    Route::get('/', 'IndexController');
    Route::post('/', 'StoreController');
    Route::get('/{task}', 'ShowController');
    Route::put('/{task}', 'UpdateController');
    Route::delete('/{task}', 'DestroyController');
});