<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ReviewSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('reviews')->insert([
            [
                'product_id' => '2',
                'customer_id' => '3',
                'number_star' => '5',
                'content' => 'Rau tươi, xanh, shop phục vụ rất tốt',
                'status' => '1'
            ],
            [
                'product_id' => '6',
                'customer_id' => '2',
                'number_star' => '5',
                'content' => 'Nho tươi, ngọt, chất lượng hơn mong đợi ạ',
                'status' => '1'
            ],
            [
                'product_id' => '7',
                'customer_id' => '4',
                'number_star' => '5',
                'content' => 'Dâu tươi, ngọt, shop giao hàng nhanh mình mới đặt mà đã nhận được luôn rồi',
                'status' => '1'
            ],
            [
                'product_id' => '11',
                'customer_id' => '5',
                'number_star' => '5',
                'content' => 'Chất lượng sản phẩm tuyệt vời',
                'status' => '1'
            ],
            [
                'product_id' => '13',
                'customer_id' => '6',
                'number_star' => '5',
                'content' => 'Thịt tươi, ngon, chất lượng hơn mong đợi ạ',
                'status' => '1'
            ]
        ]);
    }
}
