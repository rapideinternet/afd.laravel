<?php namespace SIVI\LaravelAFD\Providers;

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
                __DIR__ . '/../../config/afd.php' => config_path('afd.php'),
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
         * Transformers
         */
        $this->app->bind(\SIVI\AFD\Transformers\Contracts\EDITransformer::class,
            \SIVI\AFD\Transformers\EDITransformer::class);

        $this->app->bind(\SIVI\AFD\Transformers\Contracts\XMLTransformer::class,
            \SIVI\AFD\Transformers\XMLTransformer::class);

        /**
         * Resolvers
         */
        $this->app->bind(\SIVI\AFD\Resolvers\Contracts\MessageImplementationResolver::class,
            \SIVI\LaravelAFD\Resolvers\MessageImplementationResolver::class);

        $this->app->bind(\SIVI\AFD\Resolvers\Contracts\EntityImplementationResolver::class,
            \SIVI\LaravelAFD\Resolvers\EntityImplementationResolver::class);

        /**
         * Processors
         */
        $this->app->bind(\SIVI\AFD\Processors\Content\Contracts\TwoPassProcessor::class,
            \SIVI\AFD\Processors\Content\TwoPassProcessor::class);

        $this->app->bind(\SIVI\AFD\Processors\Message\Contracts\MessageProcessor::class,
            \SIVI\AFD\Processors\Message\MessageProcessor::class);

        $this->app->bind(\SIVI\AFD\Processors\Entity\Contracts\EntityProcessor::class,
            \SIVI\AFD\Processors\Entity\EntityProcessor::class);

        /**
         * Parsers
         */
        $this->app->bind(\SIVI\AFD\Parsers\Contracts\XMLParser::class,
            \SIVI\AFD\Parsers\XMLParser::class);

        $this->app->bind('afd.parsers.xml',
            \SIVI\AFD\Parsers\XMLParser::class);

        $this->app->bind(\SIVI\AFD\Parsers\Contracts\EDIParser::class,
            \SIVI\AFD\Parsers\EDIParser::class);

        $this->app->bind('afd.parsers.edi',
            \SIVI\AFD\Parsers\EDIParser::class);

        /**
         * Services
         */
        $this->app->bind(\SIVI\AFD\Services\Contracts\ParserService::class,
            \SIVI\AFD\Services\ParserService::class);

        /**
         * Config
         */
        $this->app->bind(\SIVI\AFDConnectors\Config\Contracts\TIMEConfig::class,
            \SIVI\LaravelAFD\Connectors\TIMEConfig::class);

        /**
         * Connectors
         */
        $this->app->bind(\SIVI\AFDConnectors\Connectors\Contracts\TIMEConnector::class,
            \SIVI\AFDConnectors\Connectors\TIMEConnector::class);
    }
}
