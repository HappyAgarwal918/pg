<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Models\notification;
use App\Models\logo;
use App\Models\footer;
use App\Models\pages;

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
        //
        $notifications=notification::get();
        $frontend['logo']=logo::get();
        $frontend['footer']=footer::first();
        $frontend['footerlinks']=pages::where('footer_links', 1)->get();
        $frontend['menu']=pages::where('primary_menu', 1)->get();
        
        View::share(compact('frontend')); 
    }
}
