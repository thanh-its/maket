<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('customers')->insert([
            [
                'name' => 'Vũ Xuân Thanh',
                'avatar' => '',
                'email' => 'thanhvu18@gmail.com',
                'password' => bcrypt('123456789'),
                'address' => 'Quỳnh Thụ, Thái Bình',
                'phone' => '0365478953'
            ],
            [
                'name' => 'Nguyễn Thị Ngân',
                'avatar' => '',
                'email' => 'ngannguyen@gmail.com',
                'password' => bcrypt('123456789'),
                'address' => 'Hải Dương',
                'phone' => '0528134987'
            ],
            [
                'name' => 'Nguyễn Mai Hương',
                'avatar' => '',
                'email' => 'maihuong@gmail.com',
                'password' => bcrypt('123456789'),
                'address' => 'Bắc Giang',
                'phone' => '0363874921'
            ],
            [
                'name' => 'Trần Ngọc Lan',
                'avatar' => '',
                'email' => 'ngoclan289@gmail.com',
                'password' => bcrypt('123456789'),
                'address' => 'Nam Định',
                'phone' => '0368749272'
            ],
            [
                'name' => 'Trần Ngọc Tường Vi',
                'avatar' => '',
                'email' => 'tươngvi0909@gmail.com',
                'password' => bcrypt('123456789'),
                'address' => 'Hải Dương',
                'phone' => '0368763972'
            ],
            [
                'name' => 'Hoàng Thị Ngọc Huyền',
                'avatar' => '',
                'email' => 'huyenhoang0309@gmail.com',
                'password' => bcrypt('123456789'),
                'address' => 'Hồ Chí Minh',
                'phone' => '0368786392'
            ],
            [
                'name' => 'Hoàng Nam Long',
                'avatar' => '',
                'email' => 'namlong@gmail.com',
                'password' => bcrypt('123456789'),
                'address' => 'Hà Nội',
                'phone' => '0972364892'
            ],
            [
                'name' => 'Trương Hoài Nam',
                'avatar' => '',
                'email' => 'hoainam@gmail.com',
                'password' => bcrypt('123456789'),
                'address' => 'Hà Nội',
                'phone' => '0363698473'
            ]
        ]);
    }
}
