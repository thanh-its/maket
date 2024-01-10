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
            [
                'number_sale' => '20',
                'discount_percent' => '10',
                'active' => '0',
                'time_start' => '10',
                'time_end' => '12'
            ],
            [
                'number_sale' => '10',
                'discount_percent' => '13',
                'active' => '1',
                'time_start' => '16',
                'time_end' => '17'
            ],
            [
                'number_sale' => '30',
                'discount_percent' => '15',
                'active' => '0',
                'time_start' => '18',
                'time_end' => '19'
            ],
            [
                'number_sale' => '20',
                'discount_percent' => '20',
                'active' => '0',
                'time_start' => '09',
                'time_end' => '10'
            ],
            [
                'number_sale' => '12',
                'discount_percent' => '25',
                'active' => '0',
                'time_start' => '19',
                'time_end' => '20'
            ],
        ]);
    }
}
