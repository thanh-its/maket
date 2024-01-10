<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Permissions;

class PermissionSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach (config('permissions.permission') as $module) {
            $permission = Permissions::create([
                'name' => $this->convert_vi_to_en($module["name"]),
                'desc' => $module["desc"],
                'parent_id' => 0,
                'key_code' => ''
            ]);

            foreach (config('permissions.action') as $value_module) {

                Permissions::create([
                    'name' => $this->convert_vi_to_en($value_module . ' ' . $module["name"]),
                    'desc' => "",
                    'parent_id' => $permission->id,
                    'key_code' => $this->slugify($value_module . ' ' . $module["name"]),

                ]);
            }
        };
    }

    // chuyển đổi text gạch ngang ở mỗi khoảng trắng : xin chao => xin-chao
    public function slugify($text, string $divider = '-')
    {
        $text = $this->convert_vi_to_en($text);
        // replace non letter or digits by divider

        $text = preg_replace('~[^\pL\d]+~u', $divider, $text);
        // trim
        $text = trim($text, $divider);

        // remove duplicate divider
        $text = preg_replace('~-+~', $divider, $text);

        // lowercase
        $text = strtolower($text);

        if (empty($text)) {
            return 'n-a';
        }

        return strtoupper($text);
    }
    // chuyển đổi text sang chữ thường thành chữ hoa không dấu
    function convert_vi_to_en($str)
    {
        $str = preg_replace("/(à|á|ạ|ả|ã|â|ầ|ấ|ậ|ẩ|ẫ|ă|ằ|ắ|ặ|ẳ|ẵ)/", "a", $str);
        $str = preg_replace("/(è|é|ẹ|ẻ|ẽ|ê|ề|ế|ệ|ể|ễ)/", "e", $str);
        $str = preg_replace("/(ì|í|ị|ỉ|ĩ)/", "i", $str);
        $str = preg_replace("/(ò|ó|ọ|ỏ|õ|ô|ồ|ố|ộ|ổ|ỗ|ơ|ờ|ớ|ợ|ở|ỡ)/", "o", $str);
        $str = preg_replace("/(ù|ú|ụ|ủ|ũ|ư|ừ|ứ|ự|ử|ữ)/", "u", $str);
        $str = preg_replace("/(ỳ|ý|ỵ|ỷ|ỹ)/", "y", $str);
        $str = preg_replace("/(đ)/", "d", $str);
        $str = preg_replace("/(À|Á|Ạ|Ả|Ã|Â|Ầ|Ấ|Ậ|Ẩ|Ẫ|Ă|Ằ|Ắ|Ặ|Ẳ|Ẵ)/", "A", $str);
        $str = preg_replace("/(È|É|Ẹ|Ẻ|Ẽ|Ê|Ề|Ế|Ệ|Ể|Ễ)/", "E", $str);
        $str = preg_replace("/(Ì|Í|Ị|Ỉ|Ĩ)/", "I", $str);
        $str = preg_replace("/(Ò|Ó|Ọ|Ỏ|Õ|Ô|Ồ|Ố|Ộ|Ổ|Ỗ|Ơ|Ờ|Ớ|Ợ|Ở|Ỡ)/", "O", $str);
        $str = preg_replace("/(Ù|Ú|Ụ|Ủ|Ũ|Ư|Ừ|Ứ|Ự|Ử|Ữ)/", "U", $str);
        $str = preg_replace("/(Ỳ|Ý|Ỵ|Ỷ|Ỹ)/", "Y", $str);
        $str = preg_replace("/(Đ)/", "D", $str);
        //$str = str_replace(" ", "-", str_replace("&*#39;","",$str));
        return strtoupper($str);
    }
}
