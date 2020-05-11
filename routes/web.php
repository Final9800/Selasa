<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/addRole','RoleController@index')->middleware('auth');
route::get('/about',function(){
    return view('about');
})->middleware('auth');
Route::post('/addRole', 'RoleController@store');
Route::get('/addRole/{id}/edit','RoleController@showedit');
Route::post('/addRole/{id}/update','RoleController@update');

Auth::routes();

Route::post('login', [ 'as' => 'login', 'uses' => 'LoginController@show']);
Route::get('/home', 'HomeController@index')->name('home');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
