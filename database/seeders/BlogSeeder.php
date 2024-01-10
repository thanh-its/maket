<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;
use  App\Models\User;
use  App\Models\CategoryBlog;
class BlogSeeder extends Seeder
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
        // $faker = Faker::create();
        // foreach(range(1,300) as $index){
        //     $name = $faker->name();
        //     $slug =  $this->createSlug($name);
        //     DB::table('blogs')->insert([
        //         'name_blog' => $name,
        //         'slug_blog' => $slug,
        //         'image' => 'images/products/product-'.rand(1,12).'.jpg',
        //         'short_description' => $faker->text(300),
        //         'users_id'=>User::all()->random()->id,
        //         'cate_blog_id' => CategoryBlog::all()->random()->id,
        //         'status' => 1,
        //         'description' => $faker->text(600),
        //         'created_at' => date("Y-m-d h:i:s"),
        //         'updated_at' => date("Y-m-d h:i:s"),
        //     ]);
        // }
        
    }
}
