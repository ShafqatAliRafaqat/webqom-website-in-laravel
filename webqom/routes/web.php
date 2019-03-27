<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/


Auth::routes();

Route::get('/web88/admin/login', function (Request $request) {
    return view("admin.admin_login");
});
Route::group(['namespace' => 'Admin'], function() {
    Route::get('/web88/admin/', 'UsersController@index');
    Route::post('/auth/login', 'AuthController@doLogin');
    Route::get('users', 'UsersController@generate_password');
    Route::POST('change_password', 'AuthController@change_password');
    Route::POST('generate_password', 'UsersController@generate_password');
    Route::group(['prefix' => 'clients'], function(){
        Route::get('/', 'ClientsController@index');
        Route::post('/create', 'ClientsController@store');
        
        Route::post('/delete', 'ClientsController@delete');
    });
});


Route::group(['namespace' => 'Frontend'], function() {
    Route::get('/', 'IndexController@index');
    Route::get('/register', 'IndexController@client_register');
    Route::get('/dashboard', 'IndexController@client_dashboard');
    Route::get('/my_account', 'IndexController@client_update');
    Route::post('clients/update', 'IndexController@client_account_update');
    Route::POST('/register', 'IndexController@client_registeration');
    Route::get('get_countries', 'IndexController@get_countries');
    Route::get('get_state/{country_id}', 'IndexController@get_state');
    Route::get('get_city/{state_id}', 'IndexController@get_city');
    
});
Route::get('/home', 'HomeController@index');
