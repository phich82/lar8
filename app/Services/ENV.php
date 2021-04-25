<?php

namespace App\Services;

use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class ENV
{
    private $cache;
    private static $table = 'environments';
    
    /**
     * __construct
     *
     * @param  string $storeType
     * @return void
     */
    public function __construct($storeType = 'environment')
    {
        if (!$this->cache) {
            $this->cache = Cache::store($storeType);
        }
    }
    
    /**
     * __call
     *
     * @param  string $key
     * @param  array $arguments
     * @return mixed
     */
    public function __call($key, $arguments)
    {
        if (in_array($key, ['get', 'save', 'destroy'])) {
            return $this->{$key}(...$arguments);
        }
        return $this->get($key, ...$arguments);
    }
    
    /**
     * Save to cache
     *
     * @param  string $key
     * @param  mixed $value
     * @return void
     */
    public function save($key, $value)
    {
        $this->cache->forever($key, $value);
    }
    
    /**
     * Get from cache
     *
     * @param  string $key
     * @return mixed
     */
    public function get($key)
    {
        return $this->cache->rememberForever($key, function () use ($key) {
            try {
                $value = DB::table(self::$table)->where('name', $key)->first()->value;
                Log::info("[Get environment variable from database] => {$key}={$value}");
                return $value;
            } catch (\Exception $e) {
                $message = "[Get environment variable from database][Error] => Environment Variable '{$key}' not exist.";
                Log::error($message);
                throw new \Exception($message);
            }
        });
    }
    
    /**
     * Destroy from cache
     *
     * @param  string|array|bool $key
     * @return void
     */
    public function destroy($key)
    {
        // Clear the entire cache
        if ($key === true) {
            return $this->cache->flush();
        }
        if (is_string($key)) {
            $key = [$key];
        }
        foreach ($key as $k) {
            if ($this->cache->has($k)) {
                $this->cache->forget($k);
            }
        }
    }
}
