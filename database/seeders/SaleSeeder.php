<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SaleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('sales')->insert([
            [   'code' => 'MBGD20',
                'count' => '20',
                'discount_percent' => '10',
                'active' => '0',
                'time_start' => '10',
                'time_end' => '12'
            ],
        ]);
    }
}
