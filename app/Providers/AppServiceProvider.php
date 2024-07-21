<?php

namespace App\Providers;

// use Illuminate\Auth\Access\Gate;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;
use App\Models\User;
use Illuminate\Support\Facades\Gate;

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
        // Blade::if('admin', function () {
        //     return Auth::check() && Auth::user()->username == 'admin';
        // });
        Paginator::useBootstrapFive();

        Gate::define('pakar', function (User $user) {
            return $user->role === 'pakar';
        });

        Gate::define('kelurahan', function (User $user) {
            return $user->role === 'kelurahan';
        });
    }
}
