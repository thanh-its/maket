<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;
use App\Models\User;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function createSlug($str, $delimiter = '-'){

        $slug = strtolower(trim(preg_replace('/[\s-]+/', $delimiter, preg_replace('/[^A-Za-z0-9-]+/', $delimiter, preg_replace('/[&]/', 'and', preg_replace('/[\']/', '', iconv('UTF-8', 'ASCII//TRANSLIT', $str))))), $delimiter));
        return $slug;
    
    } 
    public function run()
    {
        $faker = Faker::create();
        foreach(range(1, 10) as $index){
            $name = $faker->name();
            $slug =  $this->createSlug($name);
            DB::table('categories')->insert([
                'nameCate' => $name,
                'banner'=>'images/category/cat-'.rand(1,5).'.jpg',
                'slug' => $slug,
                'users_id'=>User::all()->random()->id,
            ]);
        }
        // DB::table('categories')->insert([
        //     [
        //         'nameCate' => 'Củ quả các loại', 
        //         'banner' => 'images/category/cat-1.jpg',
        //         'slug' => $this->createSlug('nameCate'),
        //         'users_id' => '3'

        //     ],
        //     [
        //         'nameCate' => 'Rau các loại',
        //         'banner' => 'images/category/cat-2.jpg',
        //         'slug' => $this->createSlug('nameCate'),
        //         'users_id' => '4'
        //     ],
        //     [
        //         'nameCate' => 'Thực phẩm',
        //         'banner' => 'images/category/cat-3.jpg',
        //         'slug' => $this->createSlug('nameCate'),
        //         'users_id' => '2'
        //     ],
        //     [
        //         'nameCate' => 'Trái cây',
        //         'banner' => 'images/category/cat-4.jpg',
        //         'slug' => $this->createSlug('nameCate'),
        //         'users_id' => '5'
        //     ],
        //     [
        //         'nameCate' => 'Các loại nấm',
        //         'banner' => 'images/category/cat-5.jpg',
        //         'slug' => $this->createSlug('nameCate'),
        //         'users_id' => '6'
        //     ]
        // ]);
    }
}
