<?php

namespace Ornio\l10n\Providers;

use Illuminate\Support\ServiceProvider;
use Ornio\l10n\Commands\TranslationFetch;

class L10NServiceProvider extends ServiceProvider
{
    /**
     * Boot the service provider.
     *
     * @return void
     */
    public function boot()
    {
        $this->publishes([
              __DIR__.'/../config/l10n.php' => config_path('l10n.php')
        ], 'l10n');

        if ($this->app->runningInConsole()) {
            $this->commands([
                TranslationFetch::class,
            ]);
        }
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {

    }
}
