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
    return view('welcome');
});

Route::auth();

Route::get('/get/{id}', function($id)
{
    $img = Image::canvas(800, 600 * $id, '#ff0000');
    return $img->response();
});

Route::get('image/revokeUser/{image_id}/{user_id}', 'ImageController@revokeUser');

Route::get('image/form', 'ImageController@form');
Route::post('image/submit', 'ImageController@submit');
Route::get('image/get/{id}', 'ImageController@get');
Route::post('image/addUser', 'ImageController@addUser');
Route::get('image/{id}', 'ImageController@showImage');

Route::get('/home', 'HomeController@index');


