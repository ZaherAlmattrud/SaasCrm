<?php

namespace App\Providers;

use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Log;
use App\Models\Business;

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
        //
        Schema::defaultStringLength(191);

        Gate::before(function ($user, $permission) {


            $business = Business::find(session('businessId'));

            if($business->plan->permissions->flatten()->pluck('name')->unique()->contains($permission)){

                return $user->permissions()->contains($permission);

            }else{



               abort('403' , 'The Permission Not Avaliable Now');
               return false ;
            }

       
            
          
        });
    }
}
