<?php

namespace App\Services\Facades;

use App\Services\ENV as ServicesENV;
use Illuminate\Support\Facades\Facade;


/**
 * @method static void save(string $key, mixed $value, mixed $default)
 * @method static void get(string $key)
 * @method static void destroy(string|array|bool $key)
 * @method static string MRSPEEDY_API_KEY() [Value of 'name' column in 'environments' table]
 * @method static string MRSPEEDY_API_BASE_URL() [Value of 'name' column in 'environments' table]
 * @method static string MRSPEEDY_MAX_AMOUNT() [Value of 'name' column in 'environments' table]
 * @method static string MRSPEEDY_CURRENCY() [Value of 'name' column in 'environments' table]
 * @method static string LALAMOVE_API_KEY() [Value of 'name' column in 'environments' table]
 * @method static string LALAMOVE_API_BASE_URL() [Value of 'name' column in 'environments' table]
 * @method static string LALAMOVE_MAX_AMOUNT() [Value of 'name' column in 'environments' table]
 * @method static string LALAMOVE_CURRENCY() [Value of 'name' column in 'environments' table]
 * @method static string AHAMOVE_API_KEY() [Value of 'name' column in 'environments' table]
 * @method static string AHAMOVE_API_BASE_URL() [Value of 'name' column in 'environments' table]
 * @method static string AHAMOVE_MAX_AMOUNT() [Value of 'name' column in 'environments' table]
 * @method static string AHAMOVE_CURRENCY() [Value of 'name' column in 'environments' table]
 */
class ENV extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return ServicesENV::class;
    }
}
