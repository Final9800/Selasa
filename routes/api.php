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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
Route::get('books', 'BookController@getAllBooks');
Route::get('books/{id}', 'BookController@getBook');
Route::post('books', 'BookController@createBook');
Route::put('books/{id}', 'BookController@updateBook');
Route::delete('books/{id}', 'BookController@deleteBook');
