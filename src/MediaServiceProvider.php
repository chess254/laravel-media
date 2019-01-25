<?php

namespace Optix\Media;

use Illuminate\Support\ServiceProvider;

class MediaServiceProvider extends ServiceProvider
{
    public function boot()
    {
        // Migrations
        if (! class_exists('CreateMediaTable')) {
            $this->publishes([
                __DIR__ . '/../database/migrations/create_media_table.stub' => database_path(
                    'migrations/' . date('Y_m_d_His', time()) . '_create_media_table.php'
                )
            ], 'migrations');
        }

        // Config
        $this->publishes([
            __DIR__ . '/../config/media.php' => config_path('media.php')
        ], 'config');
    }

    public function register()
    {
        $this->app->singleton(ConversionManager::class);
    }
}
