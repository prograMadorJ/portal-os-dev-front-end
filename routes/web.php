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


    Route::get('/', function () {
        return redirect('/blog');
    });

    /**
     * All routes Here
     */

    // Route::prefix('/')->group(function () {
        /*
         * linhas abaixo comentadas, aguardam implementação futura
         */
//    Route::get('/', 'HomeController@index')->name('home');
//    Route::get('amp', 'HomeController@index')->name('ampHome');
    // });
    /*
     * linhas abaixo comentadas, aguardam implementação futura
     */
//
//Route::prefix('/indicacao')->group(function () {
//    Route::get('/', 'IndicationController@index')->name('indicacao');
//    Route::get('amp', 'IndicationController@index')->name('ampIndicacao');
//});

    Route::prefix('/blog')->group(function () {
        Route::get('/', 'User\ArtigosController@index')->name('blogIndex');
        Route::get('/categoria/{slug}', 'User\ArtigosController@categoryFilter')->name('categoriasBlog');
        Route::get('/artigo/{slug}', 'User\ArtigosController@showPost')->name('blogPost');
        Route::get('/getRequest', 'User\ArtigosController@loadMore')->name('loadMore');
        Route::get('/amp', 'User\ArtigosController@index')->name('ampBlog');
    });

    Route::prefix('/historias')->group(function () {
        Route::get('/', 'User\DepoimentosController@index')->name('historias');
        Route::get('/amp', 'User\DepoimentosController@index')->name('ampHistorias');
    });

    Route::prefix('/sac')->group(function () {
        Route::get('/', 'SacController@index')->name('sac');
        Route::get('/amp', 'SacController@index')->name('ampSac');
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

Route::get('/{error}', 'Pages\ErrorController@pagina404');
Route::get('/{error}/{error2}', 'Pages\ErrorController@pagina404');
Route::get('/{error}/{error2}/{error3}', 'Pages\ErrorController@pagina404');
Route::get('/{error}/{error2}/{error3}/{error4}', 'Pages\ErrorController@pagina404');
Route::get('/{error}/{error2}/{error3}/{error4}/{error5}', 'Pages\ErrorController@pagina404');
