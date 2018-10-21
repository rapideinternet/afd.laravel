<?php namespace SIVI\LaravelAFD;

use Illuminate\Support\ServiceProvider;

class AfdServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadMigrationsFrom(__DIR__ . '/../migrations');
        $this->publishes(
            [
                __DIR__ . '/../config/afd.php' => config_path('afd.php'),
            ]
        );
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {

        /**
         * Repositories
         */

        $this->app->bind(\SIVI\AFD\Repositories\Contracts\AttributeRepository::class,
            \SIVI\AFD\Repositories\JSON\AttributeRepository::class);

        $this->app->bind(\SIVI\AFD\Repositories\Contracts\CodeListRepository::class,
            \SIVI\AFD\Repositories\JSON\CodeListRepository::class);

        $this->app->bind(\SIVI\AFD\Repositories\Contracts\CodeRepository::class,
            \SIVI\AFD\Repositories\Model\CodeRepository::class);

        $this->app->bind(\SIVI\AFD\Repositories\Contracts\EntityRepository::class,
            \SIVI\AFD\Repositories\JSON\EntityRepository::class);

        $this->app->bind(\SIVI\AFD\Repositories\Contracts\MessageRepository::class,
            \SIVI\AFD\Repositories\Model\MessageRepository::class);

        /**
         * Parsers
         */
        $this->app->bind(\SIVI\AFD\Parsers\Contracts\XMLParser::class,
            \SIVI\AFD\Parsers\XMLParser::class);

    }
}
