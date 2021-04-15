<?php

namespace App\Providers;

use App\Models\BusinessUnit;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;
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
        //
        
       
       $saBus = BusinessUnit::all()->where('area_name','VSA');
       $lesothoBus = BusinessUnit::all()->where('area_name','LES');
       View::share( 'saBus', $saBus );
       View::share( 'lesothoBus', $lesothoBus );
 

    }
}
