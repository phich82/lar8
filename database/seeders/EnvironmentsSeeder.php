<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EnvironmentsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $datetime = date('Y-m-d H:i:s');
        DB::table('environments')->insert([
            [
                'name'  => 'MRSPEEDY_API_BASE_URL',
                'value' => 'https://mrspeedy.vn/api',
                'group' => 'MRSPEEDY',
                'created_at' => $datetime,
                'updated_at' => $datetime
            ],
            [
                'name'  => 'MRSPEEDY_API_KEY',
                'value' => '8w34PDuozCXLHwhnt81nCbuOF8dTzxnEl4LHvuV5KGsXCeoS6qUBMOH7ZWHVx6tsEnIzuERixekEBHkgXCbMoDA9INfeJWD1si9g',
                'group' => 'MRSPEEDY',
                'created_at' => $datetime,
                'updated_at' => $datetime
            ],
            [
                'name'  => 'MRSPEEDY_MAX_AMOUNT',
                'value' => 30000000,
                'group' => 'MRSPEEDY',
                'created_at' => $datetime,
                'updated_at' => $datetime
            ],
            [
                'name'  => 'MRSPEEDY_CURRENCY',
                'value' => 'VND',
                'group' => 'MRSPEEDY',
                'created_at' => $datetime,
                'updated_at' => $datetime
            ],
            [
                'name'  => 'LALAMOVE_API_BASE_URL',
                'value' => 'https://lalamove.com/api',
                'group' => 'LALAMOVE',
                'created_at' => $datetime,
                'updated_at' => $datetime
            ],
            [
                'name'  => 'LALAMOVE_API_KEY',
                'value' => 'oKjuOPgpEaVyqbxyDgEwf6OEssM8SgryeXyuh2pV8Ahy3gTZ75GptJDDuV0CW824aWZQCneSvrBCJQ5qwMTNnmgVsccj6H9Wqbot',
                'group' => 'LALAMOVE',
                'created_at' => $datetime,
                'updated_at' => $datetime
            ],
            [
                'name'  => 'LALAMOVE_MAX_AMOUNT',
                'value' => 50000000,
                'group' => 'LALAMOVE',
                'created_at' => $datetime,
                'updated_at' => $datetime
            ],
            [
                'name'  => 'LALAMOVE_CURRENCY',
                'value' => 'VND',
                'group' => 'LALAMOVE',
                'created_at' => $datetime,
                'updated_at' => $datetime
            ],
            [
                'name'  => 'AHAMOVE_API_BASE_URL',
                'value' => 'https://ahamove.com/api',
                'group' => 'AHAMOVE',
                'created_at' => $datetime,
                'updated_at' => $datetime
            ],
            [
                'name'  => 'AHAMOVE_API_KEY',
                'value' => 'gEqDBfFp2gZn5Vwoyra3zzNoLkkgk24iRLiPHtJhvUlINOXWnUuxxHZsFCRZpmSrFyimkgT6hWbkLWf632FUkaX0aUuuw90A0VhV',
                'group' => 'AHAMOVE',
                'created_at' => $datetime,
                'updated_at' => $datetime
            ],
            [
                'name'  => 'AHAMOVE_MAX_AMOUNT',
                'value' => 50000000,
                'group' => 'AHAMOVE',
                'created_at' => $datetime,
                'updated_at' => $datetime
            ],
            [
                'name'  => 'AHAMOVE_CURRENCY',
                'value' => 'VND',
                'group' => 'AHAMOVE',
                'created_at' => $datetime,
                'updated_at' => $datetime
            ],
        ]);
    }
}
