<?php

use Illuminate\Http\Request;

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

route::group(['middleware'=>['api']], function(){
	route::post('signup', 'authController@signup');
	route::post('signin', 'authController@signin');
	route::get('show', 'showController@show');

	route::get('index', 'tutorialController@index');
	route::get('show/{id}', 'tutorialController@show');
	
	
	route::group(['middleware'=>['jwt.auth']], function(){
		//tutorial
		route::post('create', 'tutorialController@create');
		route::put('update/{id}', 'tutorialController@update');
		route::delete('delete/{id}', 'tutorialController@destroy');


		//komentar
		route::post('tambahkomentar', 'komentarController@store');
		route::get('indexkomentar', 'komentarController@index');
		route::get('showkomentar/{id}', 'komentarController@show');
	});

});