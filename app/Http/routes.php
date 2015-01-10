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

Route::get('/', 'WelcomeController@index');

Route::get('/403', function(){
	return '403 Home';
});

Route::get('home', 'HomeController@index');

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);

$router->group(['middleware' => 'auth'], function($router)
{

	//
	$router->get('admin', function()
	{
		return View::make('admin.index');
	});

	Route::resource('users', 'UsersController');
	Route::resource('pages', 'PagesController');

	//
	$router->get('login', function()
	{
		return View::make('admin.login');
	});

});