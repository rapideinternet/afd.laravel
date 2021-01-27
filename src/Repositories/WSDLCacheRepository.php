<?php namespace SIVI\LaravelAFD\Repositories;

use Carbon\Carbon;
use Illuminate\Support\Facades\Cache;
use SIVI\AFDConnectors\Connectors\Contracts\TIMEConnector;

class WSDLCacheRepository implements \SIVI\AFDConnectors\Repositories\Contracts\WSDLCacheRepository
{
    public function __construct()
    {
        $this->app->resolving(TIMEConnector::class, function ($timeConnector, $app) {
            $timeConnector->setCacheRepository($app->make(\SIVI\AFDConnectors\Repositories\Contracts\WSDLCacheRepository::class));
        });
    }

    /**
     * @param $key
     * @return bool
     */
    public function has($key): bool
    {
        return Cache::has($key);
    }

    /**
     * @param $key
     * @return mixed
     */
    public function get($key)
    {
        return Cache::get($key);
    }

    /**
     * @param $key
     * @param $value
     * @param Carbon $expiresAt
     */
    public function add($key, $value, Carbon $expiresAt): void
    {
        Cache::add($key, $value, $expiresAt);
    }
}