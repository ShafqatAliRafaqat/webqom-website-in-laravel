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


Route::group(['namespace' => 'Admin'], function() {
        Route::get('/web88/admin/', 'UsersController@index');
        Route::post('/auth/login', 'AuthController@doLogin');
        Route::get('/web88/admin/login', 'AuthController@admin_login');
        Route::get('/web88/admin/logout', 'AuthController@admin_logout');
        Route::get('users', 'UsersController@generate_password');
        Route::POST('/admin/get_user_details/', 'UsersController@get_users');
        Route::POST('change_password', 'AuthController@change_password');
        Route::POST('generate_password', 'UsersController@generate_password');
        Route::POST('reset_password', 'AuthController@reset_password');
        Route::resource('admin/index-plan', 'IndexPlanController');
        Route::group(['prefix' => 'admin/index-plan/'], function(){
            Route::POST('/delete', 'IndexPlanController@delete');
            Route::POST('image_update', 'IndexPlanController@image_update');
            Route::POST('get_index_plan_details/', 'IndexPlanController@get_index_plan_details');
            Route::POST('update_sort/', 'IndexPlanController@update_sort');
            Route::POST('cms_update/', 'IndexPlanController@cms_update');

        });
        Route::group(['prefix' => 'admin/cloud_hosting/'], function(){
            Route::get('/', 'CloudHostingController@index');
            Route::get('/new', 'CloudHostingController@create');
            Route::post('/new', 'CloudHostingController@store');
            Route::post('/new_plan', 'CloudHostingController@cloud_hosting_plan');
            Route::get('/edit/{id}', 'CloudHostingController@edit');
            Route::POST('get_details/', 'CloudHostingController@get_details');
            Route::post('/update', 'CloudHostingController@update');
            Route::post('/update_cloud_hosting_plan/{id}', 'CloudHostingController@update_cloud_hosting_plan');
            Route::POST('/delete', 'CloudHostingController@delete');
            Route::POST('image_update', 'IndexPlanController@image_update');
            Route::POST('get_index_plan_details/', 'IndexPlanController@get_index_plan_details');
            Route::POST('update_sort/', 'CloudHostingController@update_sort');
            Route::POST('cms_update/', 'IndexPlanController@cms_update');
            Route::POST('/delete_all_plans', 'CloudHostingController@delete_all_plans');

        });
        Route::resource('admin/categories', 'CategoriesController');
        Route::group(['prefix' => 'admin/categories/'], function(){
            Route::POST('/update_sort', 'CategoriesController@update_sort');
        });
        Route::group(['prefix' => 'admin/pages/'], function(){
            Route::POST('/new', 'PagesController@store');
            Route::POST('/update', 'PagesController@update');
        });
        Route::group(['prefix' => 'clients'], function(){
            Route::get('/listing', 'ClientsController@index');
            Route::POST('/search_clients', 'ClientsController@search_clients');
            Route::post('/create', 'ClientsController@store');
            Route::post('/delete', 'ClientsController@delete');
            Route::get('/edit/{id}', 'ClientsController@edit');
            Route::POST('/update', 'ClientsController@update');
            Route::POST('/delete_all_clients', 'ClientsController@delelte_all');
            Route::get('/export', 'ClientsController@export_csv');

    });
        Route::resource('admin/co_cloud_hosting', 'CoCloudHostingController');
		Route::resource('admin/dedicated_servers', 'DedicatedServersController');
});


Route::group(['namespace' => 'Frontend'], function() {
    Route::get('/', 'IndexController@index');
    Route::get('/cloud_hosting', 'CloudHostingController@index');
    Route::get('/co_cloud_hosting', 'CoCloudHostingController@index');
	Route::get('/dedicated_servers', 'DedicatedServersController@index');
    Route::get('/register', 'IndexController@client_register');
    Route::get('/dashboard', 'IndexController@client_dashboard');
    Route::get('/my_account', 'IndexController@client_update');
    Route::post('/update_client', 'IndexController@client_account_update');
    Route::POST('/register', 'IndexController@client_registeration');
    Route::get('get_countries', 'IndexController@get_countries');
    Route::get('get_state/{country_id}', 'IndexController@get_state');
    Route::get('get_city/{state_id}', 'IndexController@get_city');
    Route::POST('/profile_pic_update', 'IndexController@change_profile_pic');
    Route::get('/reset_password', 'IndexController@client_reset_password');
    Route::POST('/unsubscribe_news_letter', 'IndexController@unsubscribe_news_letter');
    Route::POST('/subscribe_news_letter', 'IndexController@subscribe_news_letter');
    
});
Route::get('/home', 'HomeController@index');


