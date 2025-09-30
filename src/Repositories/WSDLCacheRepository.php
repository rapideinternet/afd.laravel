<?php

namespace SIVI\LaravelAFD\Repositories;

use Carbon\Carbon;
use Illuminate\Support\Facades\Cache;

class WSDLCacheRepository implements \SIVI\AFDConnectors\Repositories\Contracts\WSDLCacheRepository
{
    protected string $prefix = 'wsdl_cache';

    /**
     * @param $key
     */
    public function has($key): bool
    {
        return Cache::has($this->getKey($key));
    }

    protected function getKey($key)
    {
        return sprintf('%s_%s', $this->prefix, $key);
    }

    /**
     * @param $key
     */
    public function get($key)
    {
        return Cache::get($this->getKey($key));
    }

    /**
     * @param $key
     * @param $value
     */
    public function add($key, $value, Carbon $expiresAt): void
    {
        Cache::add($this->getKey($key), $value, $expiresAt);
    }

    public function setPrefix(string $prefix): void
    {
        $this->prefix = $prefix;
    }
}
