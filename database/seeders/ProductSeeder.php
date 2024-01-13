<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use  App\Models\Category;
use  App\Models\Supplier;
use  App\Models\User;
use  App\Models\Origin;
use Illuminate\Support\Facades\DB;
class ProductSeeder extends Seeder
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
        foreach(range(1,50) as $index){
            $name = $faker->name();
            $slug =  $this->createSlug($name);
            DB::table('products')->insert([
                'namePro' => $name,
                'image' => 'images/products/product-'.rand(1,12).'.jpg',
                'quantity' => rand(1, 1000),
                'price' => rand(3000, 10000000),
                'discounts'=>rand(0, 100),
                'status' => rand(0, 1),
                'category_id' => Category::all()->random()->id,
                'supplier_id' => Supplier::all()->random()->id,
                'users_id'=>User::all()->random()->id,
                'slug' => $slug,
                'Description' => $faker->text(100),
                'origin_id'=>Origin::all()->random()->id,
            ]);
        }
    }
}
