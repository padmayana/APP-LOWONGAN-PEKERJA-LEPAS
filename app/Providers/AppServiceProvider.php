<?php

namespace App\Providers;
use App\Models\User;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;

use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Blade;


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
        Paginator::useBootstrap();
        Blade::directive('currency', function ( $expression ) { return "Rp. <?php echo number_format($expression,0,',','.'); ?>"; });
        Gate::define('Klien', function (User $user) {
            return $user->level === 'Klien';
        });
        Gate::define('Freelancer', function (User $user) {
            return $user->level === 'Freelancer';
        });
        Gate::define('Admin', function (User $user) {
            return $user->level === 'Admin';
        });
    }
}
