<?php namespace SIVI\LaravelAFD\Repositories;

use Carbon\Carbon;
use Illuminate\Support\Facades\Cache;

class WSDLCacheRepository implements \SIVI\AFDConnectors\Repositories\Contracts\WSDLCacheRepository
{
    protected string $prefix = 'wsdl_cache';

    /**
     * @param $key
     * @return bool
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
     * @return mixed
     */
    public function get($key)
    {
        return Cache::get($this->getKey($key));
    }

    /**
     * @param $key
     * @param $value
     * @param Carbon $expiresAt
     */
    public function add($key, $value, Carbon $expiresAt): void
    {
        Cache::add($this->getKey($key), $value, $expiresAt);
    }

    /**
     * @param string $prefix
     */
    public function setPrefix(string $prefix): void
    {
        $this->prefix = $prefix;
    }
}