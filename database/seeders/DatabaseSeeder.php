<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Database\Seeders\BlogSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(RoleSeed::class);
        $this->call(PermissionSeed::class);
        $this->call(PermissionRoleSeed::class);
        $this->call(ConfigSeeder::class);
        $this->call(GroupUserSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(SupplierSeeder::class);
        $this->call(OriginSeeder::class);
        $this->call(CategorySeeder::class);
        // $this->call(SaleSeeder::class);
        $this->call(ProductSeeder::class);
        $this->call(OrderSeeder::class);
        $this->call(CateBlogSeeder::class);
        $this->call(BlogSeeder::class);
    }
}
