<?php

namespace Database\Seeders;

use App\Models\Permissions;
use Illuminate\Database\Seeder;
use App\Models\Roles;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Exception;
use Illuminate\Support\Facades\Schema;

class RoleSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (!Schema::hasTable('permissions') || !Schema::hasTable('roles')) {
            return ;
      }
        Roles::create([
            'name' => "Khách hàng",
            'desc' => "Tài khoản của Khách hàng",
            'status' => 1,
        ]);

        // lấy thông tin tất cả các quyền
        $permissions = Permissions::where('parent_id', '!=', 0)->get('id');
        $data = [];
        foreach ($permissions as $p) {
            $data[] = $p->id;
        };

        try {
            DB::beginTransaction();
            $role =  Roles::create([
                'name' => "ADMIN",
                'desc' => "Tài khoản của admin",
                'status' => 1,
            ]);

            Roles::create([
                'name' => "Người bán hàng",
                'desc' => "Tài khoản của người bán hàng",
                'status' => 1,
            ]);
            $role->permissions()->attach($data);
            DB::commit();
        } catch (Exception $exception) {
            Log::info($exception);
            DB::rollBack();
        }
    }
}
