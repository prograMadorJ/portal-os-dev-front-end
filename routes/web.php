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
		return redirect('/blog');
	});

	/**
	 * All routes Here
	 */

	Route::group(['prefix' =>'blog'], function() {
		Route::get('/', 'User\ArtigosController@index')->name('blogIndex');
		Route::get('/categoria/{slug}', 'User\ArtigosController@categoryFilter')->name('categoriasBlog');
		Route::get('/artigo/{slug}', 'User\ArtigosController@showPost')->name('blogPost');
		Route::get('/mais', 'User\ArtigosController@loadMore')->name('loadMore');
	});

    Route::prefix('/')->group(function () {
        Route::redirect('/','/blog');
        Route::redirect('/amp','/blog/amp');
        /*
         * linhas abaixo comentadas, aguardam implementação futura
         */
//    Route::get('/', 'HomeController@index')->name('home');
//    Route::get('amp', 'HomeController@index')->name('ampHome');
    });

    /*
     * linhas abaixo comentadas, aguardam implementação futura
     */
//
//Route::prefix('/indicacao')->group(function () {
//    Route::get('/', 'IndicationController@index')->name('indicacao');
//    Route::get('amp', 'IndicationController@index')->name('ampIndicacao');
//});

    // Route::prefix('/blog')->group(function () {
    //     Route::get('/', 'BlogController@index')->name('blog');
    //     Route::get('/amp', 'BlogController@index')->name('ampBlog');
    // });

    Route::prefix('/post')->group(function () {
        Route::get('/', 'PostController@index')->name('post');
        Route::get('/amp', 'PostController@index')->name('ampPost');
    });

    Route::prefix('/historias')->group(function () {
        Route::get('/','StoriesController@index')->name('historias');
        Route::get('/amp','StoriesController@index')->name('ampHistorias');
    });

    Route::prefix('/sac')->group(function () {
        Route::get('/','SacController@index')->name('sac');
        Route::get('/amp','SacController@index')->name('ampSac');
        Route::get('/getUF', 'SacController@getCity')->name('extCity');
        Route::post('/send', 'SacController@mailSender')->name('sendSac');
    });
    /*
     * linhas abaixo comentadas, aguardam implementação futura
     */
//Route::prefix('/cadastrar')->group(function () {
//    Route::get('/', 'RegisterController@index')->name('cadastrar');
//    Route::get('/amp', 'RegisterController@index')->name('ampCadastrar');
//});
//
//Route::prefix('/login')->group(function () {
//    Route::get('/','LoginController@index')->name('login');
//    Route::get('/amp','LoginController@index')->name('ampLogin');
//});
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
