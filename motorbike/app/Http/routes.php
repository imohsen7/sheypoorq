<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('splash');
});
Route::auth();

Route::get('/' , 'HomeController@getlist');
Route::get('/list/{id?}', [ 'as' => 'product.id' , 'uses' => 'HomeController@getlist' ] );
Route::post('/list', 'HomeController@getlist');
Route::get('/home', 'HomeController@index');
Route::get('/addnew', 'HomeController@addnew');
Route::post('/addnewbike','HomeController@addnewbike');
