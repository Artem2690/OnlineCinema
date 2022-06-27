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

//Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//    return $request->user();
//});

/*
 * User routes
 */

Route::post('/register', 'App\Http\Controllers\Api\v1\UserController@register'); // Register
Route::post('/login', 'App\Http\Controllers\Api\v1\UserController@login'); // login

/*
 * Film routes
 */

Route::group(['middleware' => ['auth']], function () {
    Route::post('/add-film', 'App\Http\Controllers\Api\v1\FilmController@addFilm'); // Add film
});
Route::get('/films','\App\Http\Controllers\Api\v1\FilmController@getFilms');
Route::get('/getAllCategories', '\App\Http\Controllers\Api\v1\FilmController@getGanre');
Route::post('/getFilms', 'App\Http\Controllers\Api\v1\FilmController@searchFilms');
