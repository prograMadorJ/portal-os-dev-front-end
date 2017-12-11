const { mix } = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel application. By default, we are compiling the Sass
 | file for the application as well as bundling up all the JS files.
 |
 */

mix.js('resources/assets/js/home/app.js', 'public/js/home')
	.js('resources/assets/js/blog/app.js', 'public/js/blog')
	.js('resources/assets/js/produtos/app.js', 'public/js/produtos')
	.js('resources/assets/js/clinicas/app.js', 'public/js/clinicas')
	.js('resources/assets/js/institucional/app.js', 'public/js/institucional')
	.js('resources/assets/js/depoimentos/app.js', 'public/js/depoimentos')
	.js('resources/assets/js/testes/app.js', 'public/js/testes')
	.js('resources/assets/js/curriculos/app.js', 'public/js/curriculos')
	// .js('resources/assets/js/sw.js', 'public')
	.js('resources/assets/js/Admin/app.js', 'public/js/site-admin')

	.sass('resources/assets/sass/home/app.scss', 'public/css/home')
	.sass('resources/assets/sass/blog/app.scss', 'public/css/blog')
	.sass('resources/assets/sass/produtos/app.scss', 'public/css/produtos')
	.sass('resources/assets/sass/clinicas/app.scss', 'public/css/clinicas')
	.sass('resources/assets/sass/institucional/app.scss', 'public/css/institucional')
	.sass('resources/assets/sass/depoimentos/app.scss', 'public/css/depoimentos')
	.sass('resources/assets/sass/testes/app.scss', 'public/css/testes')
	.sass('resources/assets/sass/curriculos/app.scss', 'public/css/curriculos')
	.sass('resources/assets/sass/Admin/app.scss', 'public/css/site-admin');
