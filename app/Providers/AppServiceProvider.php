<?php

namespace App\Providers;

use App\Models\Cart;
use App\Models\Category;
use App\Models\General;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;

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
        view::composer('*', function($view){
            $view->with('settings', General::get()->first());
            $view->with('categories', Category::get());
            $view->with('cartProduct', Cart::with('products')->where('ip_address', request()->ip())->get());
        });

        Paginator::useBootstrap();
    }
}
