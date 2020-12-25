<?php

namespace MasterDmx\LaravelBreadcrumbs;

use Illuminate\Support\ServiceProvider;

class BreadcrumbsServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->mergeConfigFrom( __DIR__.'/../config/breadcrumbs.php', 'breadcrumbs');

        $this->app->bind(BreadcrumbsManager::class);
    }
}
