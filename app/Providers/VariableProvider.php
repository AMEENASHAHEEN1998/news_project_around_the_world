<?php

namespace App\Providers;

use Illuminate\Support\Facades\View;
use App\Http\View\Composer\variable;
use Illuminate\Support\ServiceProvider;


class VariableProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        View::composer('layouts_website.master',variable::class);
    }
}
