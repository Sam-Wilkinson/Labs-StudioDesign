<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App;

class ImageServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        /**
         * Registers the Image Resizing Service 
         */
        $this->app->bind('ImageResize', function()
        {
        return new App\Services\imageResize;
        });

        /**
         * Registers the Image Delete Service
         */
        $this->app->bind('ImageDelete', function()
        {
        return new App\Services\ImageDelete;
        });
    }
}
