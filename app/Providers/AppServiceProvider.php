<?php

namespace App\Providers;

use App\Http\View\Composers\MainData;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        app()->singleton('lang',function(){
            if (session()->has('lang')) {
                return session()->get('lang');
            } else {
                return 'ar';
            }

        });
        View::composer(['*'],MainData::class);
        Schema::defaultStringLength(191);
    }
}
