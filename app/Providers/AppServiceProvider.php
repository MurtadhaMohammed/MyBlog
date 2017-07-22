<?php

namespace App\Providers;
use View;
use App\Department;

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
       
       //View::share('name','murtadha');
       
       View::composer('*', function($view) {
           $view->with('dep',Department::all());
       });
       
       
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
