<?php

header("Cache-Control: no-cache, must-revalidate");
	header('Access-Control-Allow-Origin:  *');
	header('Access-Control-Allow-Methods:  POST, GET, OPTIONS, PUT, DELETE');
	header('Access-Control-Allow-Headers:  Content-Type, X-Auth-Token, Origin, Authorization');

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
//Route::group(['prefix' => 'api'], function () {
	
	Route::group(['namespace' => 'Api'], function () {

 Route::post('register', 'CustomerController@register');
Route::post('login', 'CustomerController@checkuser');
//Route::get('open', 'DataController@open');		


Route::get('category_products/{categoryslug}','CategoryController@categoryData');
Route::group(['middleware' => ['jwt.verify']], function () {

	Route::resource('product','ProductController');

	Route::post('hello',function()
{
	echo 'success';
});


});

//});
});
