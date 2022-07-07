<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class configSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('config')->insert([
            'pin' => '2815 mAh',
            'chip' => 'Apple A14 Bionic',
            'memory' => '125GB',
        ]);
        DB::table('config')->insert([
            'memory' => '250GB',
            'chip' => 'Apple A12 Bionic',
            'pin' => '3000 mAh',
        ]);
        DB::table('config')->insert([
            'chip' => 'Apple A13 Bionic',
            'pin' => '2515 mAh',
            'memory' => '500GB',
        ]);
    }
}
