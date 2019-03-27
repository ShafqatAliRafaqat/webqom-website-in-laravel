<?php

namespace App\Providers;
use Validator;
use Illuminate\Support\ServiceProvider;
use DB;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
         //require_once app_path() . '/validators.php';
        Validator::extend('number_length', function($attribute, $value, $parameters)
        {
            if (strlen($value) < 4) {
               return false;
            }else{
                return true;
            }
        },"Field must be 4 digit long");

        $platform = DB::getDoctrineConnection()->getDatabasePlatform();
        $platform->registerDoctrineTypeMapping('enum', 'string');
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
