<?php

namespace App\Providers;

use App\Models\Cart;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        View::composer('*', function($view){
            $view->with('cartProduct', Cart::where('ip_address', request()->ip())->with('product')->get());
            $view->with('cartProductCount', Cart::where('ip_address', request()->ip())->count());
        });
    }
}
