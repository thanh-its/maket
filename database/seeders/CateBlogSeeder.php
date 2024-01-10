<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;
use  App\Models\User;
class CateBlogSeeder extends Seeder
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
        foreach(range(1,5) as $index){
            $name = $faker->name();
            $slug =  $this->createSlug($name);
            DB::table('category_blogs')->insert([
                'name' => $name,
                'slug' => $slug,
                'users_id'=>User::all()->random()->id,
            ]);
    }
}
}
