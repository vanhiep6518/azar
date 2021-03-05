<?php

namespace App\Providers;

use App\Models\ConstructionCat;
use App\Models\FurnitureCat;
use App\Models\Price;
use App\Models\PriceCat;
use App\Models\ProjectCat;
use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\View;

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
        $cats['project'] = ProjectCat::all();
        $cats['furniture'] = FurnitureCat::all();
        $cats['construction'] = ConstructionCat::all();
        $cats['price'] = PriceCat::with('prices')->get();
        View::share('cats', $cats);
        Paginator::useBootstrap();
    }
}
