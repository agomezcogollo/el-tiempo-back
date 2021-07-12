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

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::post('register', 'App\Http\Controllers\UserController@register')->name('Register');
Route::post('login', 'App\Http\Controllers\UserController@authenticate')->name('Login');
Route::post('/uploadxls', [App\Http\Controllers\SkillsController::class, 'uploadxls'])->name('Carga-Xls');

Route::group(['middleware' => ['jwt.verify','cors']], function() {

    Route::post('user','App\Http\Controllers\UserController@getAuthenticatedUser')->name('Get-User');
    Route::apiResource('skills', App\Http\Controllers\SkillsController::class);
    Route::post('/showSkill', [App\Http\Controllers\SkillsController::class, 'showSkill']);

});