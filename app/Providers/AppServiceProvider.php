<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Route;
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

        View::share('menu', \App\Page::published()->get());
        View::share('modules', [
            'page' => 'Pagina\'s',
            'project' => 'Projecten',
            'tag' => 'Tags',
            'user' => 'Gebruikers'
        ]);
    }
}
