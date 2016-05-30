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
    return view('index');
}); 

	Route::get('/contacto/obtener', 'ContactoController@obtener');
	Route::post('/contacto/storeAgenda', 'ContactoController@storeAgenda');


Route::get('chat', function () {
    return view('chat');
}); 
	Route::get('/chat/obtener', 'ChatController@obtener');
	Route::post('/chat/storeChat', 'ChatController@storeChat');
	Route::post('/chat/storeChatt', 'ChatController@storeChatt');

