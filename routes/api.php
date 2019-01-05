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

 
Route::post('login', 'CustomerController@authenticate');
Route::post('register', 'CustomerController@registerUser');
Route::post('mobile_status','CustomerController@checkUser');
Route::post('send_otp','CustomerController@sendOtp');
Route::post('resend_otp','CustomerController@resendOtp');
Route::post('verify_otp','CustomerController@verifyOtp');

//Route::get('open', 'DataController@open');		


Route::get('category_products/{categoryslug}','CategoryController@categoryData');

// Authenticated routes
Route::group(['middleware' => ['jwt.verify']], function () {

	Route::post('add/address','CustomerController@addAddress');



});

//});
});
