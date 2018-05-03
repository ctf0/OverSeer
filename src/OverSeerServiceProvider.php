<?php

namespace ctf0\OverSeer;

use Illuminate\Support\ServiceProvider;

class OverSeerServiceProvider extends ServiceProvider
{
    /**
     * Perform post-registration booting of services.
     */
    public function boot()
    {
        $this->packagePublish();
        $this->route();
    }

    /**
     * package resources.
     *
     * @return [type] [description]
     */
    protected function packagePublish()
    {
        // resources
        $this->publishes([
            __DIR__ . '/resources/js' => resource_path('assets/vendor/OverSeer'),
        ], 'assets');
    }

    /**
     * routes.
     *
     * @return [type] [description]
     */
    protected function route()
    {
        app('router')
            ->post('overseer/{title?}')
            ->uses('\ctf0\OverSeer\Controller\OverSeerController@show')
            ->name('overseer')
            ->middleware('web');
    }

    /**
     * Register any package services.
     */
    public function register()
    {
        $this->app->register(\ctf0\PackageChangeLog\PackageChangeLogServiceProvider::class);
    }
}
