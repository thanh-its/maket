<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class SaleProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('sale_product')->insert([
            [
                'product_id' => '3',
                'sale_id' => '2'
            ],
            [
                'product_id' => '4',
                'sale_id' => '3'
            ],
            [
                'product_id' => '5',
                'sale_id' => '1'
            ],
            [
                'product_id' => '6',
                'sale_id' => '4'
            ],
            [
                'product_id' => '8',
                'sale_id' => '3'
            ],
            [
                'product_id' => '9',
                'sale_id' => '5'
            ]
            ]);
    }
}
