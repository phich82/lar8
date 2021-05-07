<?php

namespace App\Http\Controllers;

use App\Events\GlobalEvent;
use App\Events\TestEvent;
use App\Events\TestQueue;
use App\Listeners\TestListnerSubscriber;
use App\Services\Facades\ENV;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Event;

class TestController extends Controller
{
    public function test()
    {
        $a = 1;

        Cache::forever('MRSPEEDY_API_KEY', 'MRSPEEDY_API_KEY');

        Event::dispatch('admin:test', ['a' => 100, 'b' => 20, 'c' => 40]);
        GlobalEvent::dispatch([]);
        TestQueue::dispatch(['subtotal' => 6000]);
        TestEvent::dispatch([1, 2, 3, 4]);
        Event::dispatch('Web::Login', ['a' => 200, 'b' => 500]);

        // var_dump(ENV::MRSPEEDY_API_KEY());
        // ENV::save('MRSPEEDY_API_KEY', ENV::MRSPEEDY_API_KEY().'_updated');
        // ENV::destroy(['MRSPEEDY_API_BASE_URL']);
        dd(
            Cache::get('MRSPEEDY_API_KEY'),
            ENV::get('MRSPEEDY_API_KEY'),
            ENV::MRSPEEDY_API_KEY(),
            ENV::MRSPEEDY_API_BASE_URL(),
            ENV::AHAMOVE_MAX_AMOUNT(),
        );
        echo phpinfo();
    }
}
