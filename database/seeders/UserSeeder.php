<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Models\User;
use  App\Models\GroupUser;
class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        // admin 
        foreach(range(1, 1) as $index){
            $name = $faker->name();
            User::create([
                'avatar'=>"https://webmaudep.com/demo/thucpham/tp01/images/product-5.jpg",
                'fullname'=>$name,
                'address'=> $faker->address(),
                'phone' => $faker->phoneNumber(),
                'email'=>"admin@gmail.com",
                'password'=>'$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password,
                'status' => 1,
                'is_admin'=> 1,
                'role_id'=>2
            ]);
        }
        // khách hàng
        foreach(range(1, 1) as $index){
            $name = $faker->name();
            User::create([
                'avatar'=>"https://webmaudep.com/demo/thucpham/tp01/images/product-5.jpg",
                'fullname'=>$name,
                'address'=> $faker->address(),
                'address_detail'=> $faker->address(),
                'phone' => $faker->phoneNumber(),
                'email'=>'user@gmail.com',
                'password'=>'$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password,
                'status' => 1,
                'is_admin'=> 0,
                'role_id'=>1,
                'group_user'=>GroupUser::all()->random()->id
            ]);
        }
    }
}
