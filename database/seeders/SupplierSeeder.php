<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use  App\Models\Supplier;
use Illuminate\Support\Facades\DB;

class SupplierSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        foreach(range(1,10) as $index){
            Supplier::create([
                'nameSupplier' =>  $faker->name(),
                'address' => $faker->address(),
                'phone' => $faker->phoneNumber(),
                'status' => rand(0,1)
            ]);

            // DB::table('suppliers')->insert([
            //     [
            //         'nameSupplier' => 'Công ty TNHH thực phẩm Hoàng Đông',
            //         'address' => 'Phòng 201, Nhà C6 Mai Động, Quận Hoàng Mai, Hà Nội',
            //         'phone' => '(04) 22182181 – 024. 2217 1661',
            //         'status' => '1'
            //     ],
            //     [
            //         'nameSupplier' => 'Công Ty Exp Việt Nam',
            //         'address' => 'Phòng 302 tòa nhà Thông Tấn, Xuân Phương, quận, Nam Từ Liêm, Hà Nội ',
            //         'phone' => '0966 484 808',
            //         'status' => '1'
            //     ],
            //     [
            //         'nameSupplier' => 'Doanh Nghiệp Tư Nhân Ngọc Cường',
            //         'address' => 'Tổ 3 Vọng La, Vọng La, Đông Anh, Hà Nội',
            //         'phone' => '0989891764',
            //         'status' => '1'
            //     ],
            //     [
            //         'nameSupplier' => 'Công Ty FamFood',
            //         'address' => 'TT10 – 39, KĐT Mới Văn Phú, P. Phú La, Q. Hà Đông, Hà Nội',
            //         'phone' => '0327 003003',
            //         'status' => '0'
            //     ],
            //     [
            //         'nameSupplier' => 'Công Ty Vifoodshop',
            //         'address' => '54 HH03D, Khu Đô Thị Thanh Hà – Mường Thanh, Cự Khê, Hà Đông, Hà Nội',
            //         'phone' => '0989333999',
            //         'status' => '1'
            //     ]
            // ]);

        }
    }
}