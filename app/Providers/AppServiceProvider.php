<?php

namespace App\Providers;

use App\Models\Brand;
use App\Models\Color;
use App\Models\Size;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        
    }
    public function boot(): void
    {
        view()->composer(['admin.pages.product.form',], function ($view) {

            $brands = Brand::select('id', 'name')->get();
            $colors = Color::select('id', 'name')->get();
            $sizes = Size::select('id', 'name')->get();

            $view->with(['brands' => $brands,'colors' => $colors,'sizes' => $sizes]);
        });
    }
}
