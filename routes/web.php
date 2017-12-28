<?php

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

Route::group(['middleware' => ['set_cookies', 'load_scripts']], function () {

	Route::get('/home', function() {
		return redirect('/');
	});

	/**
	 * All routes Here
	 */


});

Route::get('/sitemap.xml', 'HomeController@sitemap');
Route::get('/robots.txt', 'HomeController@robots');

// require ('Admin.php');

// Redirect

Route::get('/{error}', 'HomeController@pagina404');
Route::get('/{error}/{error2}', 'HomeController@pagina404');
Route::get('/{error}/{error2}/{error3}', 'HomeController@pagina404');
Route::get('/{error}/{error2}/{error3}/{error4}', 'HomeController@pagina404');
Route::get('/{error}/{error2}/{error3}/{error4}/{error5}', 'HomeController@pagina404');
