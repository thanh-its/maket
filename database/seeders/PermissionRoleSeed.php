<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Permissions;
use Illuminate\Support\Facades\DB;
class PermissionRoleSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Permissions::where('parent_id', '>', '0')->get()->map(function ($permission) {
            DB::table('permissions_roles')->insert([
                'permmission_id' => $permission->id,
                'role_id' => '2',
            ]);
        });
    }
}
