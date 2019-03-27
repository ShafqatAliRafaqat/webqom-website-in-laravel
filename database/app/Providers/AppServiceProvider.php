<?php

namespace App\Providers;
use Validator;
use Illuminate\Support\ServiceProvider;

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
