<?php
use Illuminate\Support\Facades\Storage;
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

Route::get('/',function()
{
	return redirect()->intended('admin/login');
});

Route::group(['prefix' => 'admin'], function () {
	Route::group(['namespace' => 'Admin'], function () {
Route::post('/login','AdminController@checkLogin');

Route::get('/login','AdminController@login');

});
});

Route::group(['prefix' => 'admin'], function () {
	
	Route::group(['namespace' => 'Admin'], function () {

		Route::group(['middleware' => 'admin'], function () {



Route::resource('product','ProductController');
Route::get('get_products','ProductController@getProducts');
Route::post('/upload_product_image','ProductController@uploadProductImage');
Route::post('/delete_product_image','ProductController@deleteProductImage');
Route::get('/categorytree','ProductController@categoryTree');
Route::post('product/images/{product}','ProductController@productImages');
Route::delete('delete/product_image/{productimage}/{product}','ProductController@deleteImage');
Route::get('get_product_options/{productoption}','ProductController@get_product_options');

Route::post('product_option/{product}','ProductController@add_product_option');

Route::delete('delete_attribute/{productattribute}/{product}','ProductController@deleteAttribute');

Route::put('product_option_edit/{productattribute}','ProductController@update_product_attribute');

//filter on product

			//Route::get('/productFilters/{product}','ProductController@productFilters');
			Route::post('/addproductfilter/{product}','ProductController@addproductFilters');
			Route::delete('/deleteProductfilter/{product_filter}','ProductController@deleteProductfilter')->name('productFilter.destroy');

			//end

Route::get('/logout','AdminController@logout');








});

   });

      });

Route::get('s3',function()
{
	$my_file = 'file.txt';
$handle = fopen($my_file, 'w') or die('Cannot open file:  '.$my_file);
$data = 'Test data to see if this works!';
fwrite($handle, $data);

$storagePath = Storage::disk('s3')->put("gg", $my_file, 'public');

print_r($storagePath);


});