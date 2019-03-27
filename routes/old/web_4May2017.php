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

Route::group(['namespace' => 'Admin'], function () {
    Route::get('/web88/admin/', 'UsersController@index');
    Route::get('/admin/icons', 'ServicesController@show_icons');
    Route::get('/test', 'CategoriesController@rename_slug');
    Route::post('/auth/login', 'AuthController@doLogin');
    Route::get('/web88/admin/login', 'AuthController@admin_login');
    Route::get('/web88/admin/logout', 'AuthController@admin_logout');
    Route::get('users', 'UsersController@generate_password');
    Route::POST('/admin/get_user_details/', 'UsersController@get_users');
    Route::POST('change_password', 'AuthController@change_password');
    Route::POST('generate_password', 'UsersController@generate_password');
    Route::POST('reset_password', 'AuthController@reset_password');
    Route::get('admin/get_video/{id}', 'IndexPlanController@get_video');
    Route::POST('admin/delete_video', 'IndexPlanController@delete_video');
    Route::POST('admin/save_video', 'IndexPlanController@save_video');
    Route::get('admin/get_video/{id}', 'IndexPlanController@get_video');
    Route::POST('admin/delete_feature_plan', 'ServicesController@delete_feature_plan');
    Route::POST('admin/delete_feature_plan_detail', 'ServicesController@delete_feature_plan_detail');
    Route::POST('admin/save_feature_plan_detail', 'ServicesController@save_feature_plan_detail');
    Route::resource('admin/index-plan', 'IndexPlanController');

    Route::group(['prefix' => 'admin/index-plan/'], function () {
        Route::POST('/delete', 'IndexPlanController@delete');
        Route::POST('image_update', 'IndexPlanController@image_update');
        Route::POST('get_index_plan_details/', 'IndexPlanController@get_index_plan_details');
        Route::POST('get_testimonial_details/', 'IndexPlanController@get_testimonial_details');
        Route::POST('get_videos_details/', 'IndexPlanController@get_videos_details');
        Route::POST('update_sort/', 'IndexPlanController@update_sort');
        Route::POST('update_sort_offer_services/', 'IndexPlanController@update_sort_offer_services');
        Route::POST('cms_update/', 'IndexPlanController@cms_update');
        Route::POST('new_testimonial/', 'IndexPlanController@new_testimonial');
        Route::POST('delete_testimonial/', 'IndexPlanController@delete_testimonial');
        Route::POST('new_service/', 'IndexPlanController@new_service');
        Route::POST('delete_service/', 'IndexPlanController@delete_service');
        Route::POST('get_service/', 'IndexPlanController@get_service');
        Route::POST('heading_edit/{type?}', 'IndexPlanController@heading_edit');

    });
    Route::group(['prefix' => 'admin/cloud_hosting/'], function () {
        Route::get('/', 'CloudHostingController@index');
        Route::get('/new', 'CloudHostingController@create');
        Route::post('/new', 'CloudHostingController@store');
        Route::post('/new_plan', 'CloudHostingController@cloud_hosting_plan');
        Route::get('/edit/{id}', 'CloudHostingController@edit');
        Route::POST('get_details/', 'CloudHostingController@get_details');
        Route::POST('get_details_hp/', 'CloudHostingController@get_details_hp');
        Route::post('/update', 'CloudHostingController@update');
        Route::post('/update_cloud_hosting_plan/{id}', 'CloudHostingController@update_cloud_hosting_plan');
        Route::POST('/delete', 'CloudHostingController@delete');
        Route::POST('/delete_hp', 'CloudHostingController@delete_hp');
        Route::POST('image_update', 'IndexPlanController@image_update');
        Route::POST('get_index_plan_details/', 'IndexPlanController@get_index_plan_details');
        Route::POST('update_sort/', 'CloudHostingController@update_sort');
        Route::POST('cms_update/', 'IndexPlanController@cms_update');
        Route::POST('/delete_all_plans', 'CloudHostingController@delete_all_plans');

    });
    /* Route::group(['prefix' => 'admin/cloud_hosting/'], function(){
    Route::get('/', 'CloudHostingController@index');
    Route::get('/new', 'CloudHostingController@create');
    Route::post('/new', 'CloudHostingController@store');
    Route::post('/new_plan', 'CloudHostingController@cloud_hosting_plan');
    Route::get('/edit/{id}', 'CloudHostingController@edit');
    Route::POST('get_details/', 'CloudHostingController@get_details');
    Route::POST('get_details_hp/', 'CloudHostingController@get_details_hp');
    Route::post('/update', 'CloudHostingController@update');
    Route::post('/update_cloud_hosting_plan/{id}', 'CloudHostingController@update_cloud_hosting_plan');
    Route::POST('/delete', 'CloudHostingController@delete');
    Route::POST('/delete_hp', 'CloudHostingController@delete_hp');
    Route::POST('image_update', 'IndexPlanController@image_update');
    Route::POST('get_index_plan_details/', 'IndexPlanController@get_index_plan_details');
    Route::POST('update_sort/', 'CloudHostingController@update_sort');
    Route::POST('cms_update/', 'IndexPlanController@cms_update');
    Route::POST('/delete_all_plans', 'CloudHostingController@delete_all_plans');

    });*/
    Route::group(['prefix' => 'admin/services'], function () {
        Route::get('/{page}', 'ServicesController@index');
        Route::POST('/pf_details', 'ServicesController@add_pf_details');
        Route::POST('/delete_pf_detail', 'ServicesController@delete_pf_detail');
        Route::POST('/get_details_pf_detail', 'ServicesController@get_details_pf_detail');
        Route::get('/new/{page}', 'ServicesController@add_hosting_plan');
        Route::post('/new/{page}', 'ServicesController@store');
        Route::post('/new_hosting_plan', 'ServicesController@hosting_plan');
        Route::get('/edit/{id}/{page}', 'ServicesController@edit');
        Route::POST('get_details/', 'ServicesController@get_details');
        Route::POST('get_details_hp/', 'ServicesController@get_details_hp');
        Route::post('/update', 'ServicesController@update');
        Route::post('/update_hosting_plan/{id}', 'ServicesController@update_hosting_plan');
        Route::POST('/feature_plan_delete', 'ServicesController@feature_plan_delete');
        Route::POST('/delete_hp', 'ServicesController@delete_hp');
        Route::POST('image_update', 'IndexPlanController@image_update');
        Route::POST('get_index_plan_details/', 'IndexPlanController@get_index_plan_details');
        Route::POST('update_sort/', 'CloudHostingController@update_sort');
        Route::POST('cms_update/', 'IndexPlanController@cms_update');
        Route::POST('/delete_all_plans', 'CloudHostingController@delete_all_plans');
        Route::POST('/save_service_free_domain', 'ServicesController@save_service_free_domain');
        Route::POST('/new_faq', 'ServicesController@new_faq');
        Route::POST('/get_faq', 'ServicesController@get_faq');
        Route::POST('/delete_faq', 'ServicesController@delete_faq');
		Route::POST('/deletebulkfaqs', 'ServicesController@deleteBulkFaqs');

    });
    Route::group(['prefix' => 'admin/domain_pricing'], function () {
        Route::get('/{per_page?}', 'DomainPricingController@index');
        Route::get('/addons/{per_page?}', 'DomainPricingController@index');
        Route::post('/new/{addons?}', 'DomainPricingController@store');
        Route::POST('get_details/', 'DomainPricingController@get_details');
        Route::POST('/delete', 'DomainPricingController@delete');
        Route::post('/update/{addons?}', 'DomainPricingController@update');
        Route::POST('/delete_all', 'DomainPricingController@delete_all_plans');

    });

    Route::group(['prefix' => 'admin'], function () {
        Route::delete('domain_pricing_list/all', 'DomainPricingListController@destroyAll')
            ->name('domain_pricing_list.destroy_all');
        Route::delete('domain_pricing_list/selected', 'DomainPricingListController@destroySelected')
            ->name('domain_pricing_list.destroy_selected');
        Route::resource('domain_pricing_list', 'DomainPricingListController', ['except' => [
            'index', 'create',
        ]]);
    });

    Route::group(['prefix' => 'admin/services_enquiry'], function () {
        Route::get('/{per_page?}', 'ServicesEnquiryController@index');
        Route::get('/addons/{per_page?}', 'ServicesEnquiryController@index');
        Route::post('/new/{addons?}', 'ServicesEnquiryController@store');
        Route::POST('get_details/', 'ServicesEnquiryController@get_details');
        Route::POST('/delete', 'ServicesEnquiryController@delete');
        Route::post('/update/{addons?}', 'ServicesEnquiryController@update');
        Route::POST('/delete_all', 'ServicesEnquiryController@delete_all_plans');
    });

    /*Route::group(['prefix' => 'admin/shared_hosting/'], function(){
    Route::get('/', 'SharedHostingController@index');
    Route::get('/new', 'SharedHostingController@create');
    Route::post('/new', 'SharedHostingController@store');
    Route::post('/new_plan', 'SharedHostingController@hosting_plan');
    Route::get('/edit/{id}', 'SharedHostingController@edit');
    Route::POST('get_details/', 'SharedHostingController@get_details');
    Route::POST('get_details_hp/', 'SharedHostingController@get_details_hp');
    Route::post('/update', 'SharedHostingController@update');
    Route::post('/update_cloud_hosting_plan/{id}', 'SharedHostingController@update_hosting_plan');
    Route::POST('/delete', 'SharedHostingController@delete');
    Route::POST('/delete_hp', 'SharedHostingController@delete_hp');
    Route::POST('image_update', 'IndexPlanController@image_update');
    Route::POST('get_index_plan_details/', 'IndexPlanController@get_index_plan_details');
    Route::POST('update_sort/', 'SharedHostingController@update_sort');
    Route::POST('cms_update/', 'IndexPlanController@cms_update');
    Route::POST('/delete_all_plans', 'SharedHostingController@delete_all_plans');

    });
    Route::group(['prefix' => 'admin/vps_hosting/'], function(){
    Route::get('/', 'VpsHostingController@index');
    Route::get('/new', 'VpsHostingController@create');
    Route::post('/new', 'VpsHostingController@store');
    Route::post('/new_plan', 'VpsHostingController@hosting_plan');
    Route::get('/edit/{id}', 'VpsHostingController@edit');
    Route::POST('get_details/', 'VpsHostingController@get_details');
    Route::POST('get_details_hp/', 'VpsHostingController@get_details_hp');
    Route::post('/update', 'VpsHostingController@update');
    Route::post('/update_cloud_hosting_plan/{id}', 'VpsHostingController@update_hosting_plan');
    Route::POST('/delete', 'VpsHostingController@delete');
    Route::POST('/delete_hp', 'VpsHostingController@delete_hp');
    Route::POST('image_update', 'IndexPlanController@image_update');
    Route::POST('get_index_plan_details/', 'IndexPlanController@get_index_plan_details');
    Route::POST('update_sort/', 'VpsHostingController@update_sort');
    Route::POST('cms_update/', 'IndexPlanController@cms_update');
    Route::POST('/delete_all_plans', 'VpsHostingController@delete_all_plans');

    });
    Route::group(['prefix' => 'admin/dedicated_servers/'], function(){
    Route::get('/', 'DedicatedServersController@index');
    Route::get('/new', 'DedicatedServersController@create');
    Route::post('/new', 'DedicatedServersController@store');
    Route::post('/new_plan', 'DedicatedServersController@hosting_plan');
    Route::get('/edit/{id}', 'DedicatedServersController@edit');
    Route::POST('get_details/', 'DedicatedServersController@get_details');
    Route::POST('get_details_hp/', 'DedicatedServersController@get_details_hp');
    Route::post('/update', 'DedicatedServersController@update');
    Route::post('/update_cloud_hosting_plan/{id}', 'DedicatedServersController@update_hosting_plan');
    Route::POST('/delete', 'DedicatedServersController@delete');
    Route::POST('/delete_hp', 'DedicatedServersController@delete_hp');
    Route::POST('image_update', 'IndexPlanController@image_update');
    Route::POST('get_index_plan_details/', 'IndexPlanController@get_index_plan_details');
    Route::POST('update_sort/', 'DedicatedServersController@update_sort');
    Route::POST('cms_update/', 'IndexPlanController@cms_update');
    Route::POST('/delete_all_plans', 'DedicatedServersController@delete_all_plans');

    });*/
    Route::group(['prefix' => 'admin/general_features/'], function () {
        Route::get('/', 'DedicatedServersController@index');
        Route::post('/new', 'GeneralFeaturesController@store');
        Route::post('/new_plan', 'DedicatedServersController@hosting_plan');
        Route::get('/edit/{id}', 'GeneralFeaturesController@edit');
        Route::POST('heading_edit/', 'GeneralFeaturesController@heading_edit');
        Route::POST('get_details/', 'GeneralFeaturesController@get_details');
        Route::POST('get_details_hp/', 'DedicatedServersController@get_details_hp');
        Route::post('/update', 'GeneralFeaturesController@update');
        Route::post('/update_cloud_hosting_plan/{id}', 'DedicatedServersController@update_hosting_plan');
        Route::POST('/delete', 'GeneralFeaturesController@delete');
        Route::POST('/delete_hp', 'DedicatedServersController@delete_hp');
        Route::POST('image_update', 'IndexPlanController@image_update');
        Route::POST('get_index_plan_details/', 'IndexPlanController@get_index_plan_details');
        Route::POST('update_sort/', 'DedicatedServersController@update_sort');
        Route::POST('cms_update/', 'IndexPlanController@cms_update');
        Route::POST('/delete_all_plans', 'DedicatedServersController@delete_all_plans');

    });
    Route::resource('admin/categories', 'CategoriesController');
    Route::group(['prefix' => 'admin/categories/'], function () {
        Route::POST('/update_sort', 'CategoriesController@update_sort');
        Route::POST('/upload_images', 'CategoriesController@upload_images');
        Route::POST('/category_images_delete', 'CategoriesController@category_images_delete');
        Route::get('/category_images/{category_id}', 'CategoriesController@get_category_images');
		Route::POST('/reload_switcher', 'CategoriesController@reloadSwitcher');
    });
    Route::group(['prefix' => 'admin/pages/'], function () {
        Route::POST('/new', 'PagesController@store');
        Route::POST('/update', 'PagesController@update');
    });
    Route::group(['prefix' => 'clients'], function () {
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
    Route::resource('admin/shared_hosting', 'SharedHostingController');
    Route::resource('admin/vps_hosting', 'VpsHostingController');
});

Route::group(['namespace' => 'Frontend'], function () {
    Route::get('/', 'IndexController@index');
    Route::get('/makeadmin', 'IndexController@makeadmin');
    Route::get('/services/{page}/{preview?}', 'ServicesController@index');
    Route::get('/shared_hosting', 'SharedHostingController@index');
    Route::get('/co_cloud_hosting', 'CoCloudHostingController@index');
    Route::get('/dedicated_servers', 'DedicatedServersController@index');
    Route::get('/register', 'IndexController@client_register');
    Route::get('/dashboard', 'IndexController@client_dashboard');
    Route::get('/my_account', 'IndexController@client_update');
    Route::post('/update_client', 'IndexController@client_account_update');
    Route::post('/get_categories', 'IndexController@get_categories');
    Route::POST('/register', 'IndexController@client_registeration');
    Route::get('get_countries', 'IndexController@get_countries');
    Route::get('get_state/{country_id}', 'IndexController@get_state');
    Route::get('get_city/{state_id}', 'IndexController@get_city');
    Route::POST('/profile_pic_update', 'IndexController@change_profile_pic');
    Route::get('/reset_password', 'IndexController@client_reset_password');
    Route::POST('/unsubscribe_news_letter', 'IndexController@unsubscribe_news_letter');
    Route::POST('/subscribe_news_letter', 'IndexController@subscribe_news_letter');

});
