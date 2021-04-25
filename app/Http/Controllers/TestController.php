<?php

namespace App\Http\Controllers;

use App\Services\Facades\ENV;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;

class TestController extends Controller
{
    public function test()
    {
        $a = 1;

        Cache::forever('MRSPEEDY_API_KEY', 'MRSPEEDY_API_KEY');

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
