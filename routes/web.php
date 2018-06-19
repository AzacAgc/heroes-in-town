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

// Ruta principal "Página de inicio de la acplicación"
Route::get('/', function () {
    return view('auth.login');
})->name('ingresar');

// Grupo de rutas, después de ser verificado
Route::group(['prefix' => 'principal', 'middleware'	=>	'auth'], function() {

	// Vista del mapa + menu
	Route::get('inicio', function() {
		return view('principal.principal');
	})->name('inicio');

	Route::get('denuncia/datos', [
	    'uses'  => 'DenunciaController@denuncias',
	    'as'    => 'denuncia.datos'
	]);
	Route::get('denuncia/est', [
	    'uses'  => 'DenunciaController@estadisticas',
	    'as'    => 'denuncia.est'
	]);
	Route::get('denuncia/cant', [
	    'uses'  => 'DenunciaController@denUsuario',
	    'as'    => 'denuncia.cant'
	]);

	Route::resource('denuncia', 'DenunciaController',
		['only'	=>	['store', 'denuncias', 'estadisticas', 'denUsuario'] ]
	);

});

// Route::group(['prefix' => 'admin'], function() {

// 	Route::resource('numem', 'NumEmergenciaController');

// });


// Grupo de rutas por defecto de laravel
Auth::routes();

// Rutas para autenticar mediante Facebook
Route::get('auth/{provider}',
	'Auth\SocialAuthController@redirectToProvider')->name('social.auth');
Route::get('auth/{provider}/callback',
	'Auth\SocialAuthController@handleProviderCallback');

