<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class LinkServiceProvider extends ServiceProvider
{

    public function register()
    {
        $this->app->bind('linkService', 'App\Services\LinkLogic');
    }


    public function boot()
    {
        //
    }
}
