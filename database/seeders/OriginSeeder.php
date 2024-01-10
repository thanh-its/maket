<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;
use App\Models\Origin;

class OriginSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    public function run()
    {
        $data="Afghanistan\r\nAkrotiri và Dhekelia\r\nẢ Rập Saudi\r\nCác tiểu vương quốc Ả Rập Thống nhất\r\nArmenia\r\nAzerbaijan\r\nẤn Độ\r\nLãnh thổ Ấn Độ Dương thuộc Anh\r\nBahrain\r\nBangladesh\r\nBhutan\r\nBrunei\r\nCampuchia\r\nQuần đảo Cocos (Keeling)\r\nĐài Loan\r\nGeorgia/Gruzia\r\nĐảo Giáng sinh\r\nHồng Kông\r\nIndonesia\r\nIran\r\nIraq\r\nIsrael\r\nJordan\r\nKazakhstan\r\nKuwait\r\nKyrgyzstan\r\nLào\r\nLiban\r\nMa Cao\r\nMalaysia\r\nMaldives\r\nMông Cổ\r\nMyanma\r\nNagorno-Karabakh\r\nNepal\r\nNga\r\nNhật Bản\r\nOman\r\nPakistan\r\nQuốc gia Palestine\r\nPhilippines\r\nQatar\r\nSingapore\r\nBắc Síp\r\nSíp\r\nSri Lanka\r\nSyria\r\nTajikistan\r\nThái Lan\r\nĐông Timor\r\nThổ Nhĩ Kỳ\r\nTriều Tiên\r\nHàn Quốc\r\nTrung Quốc\r\nTurkmenistan\r\nUzbekistan\r\nViệt Nam\r\nYemen";
        foreach(explode("\r\n", $data) as $index){
            Origin::create([
                'name' => $index,
            ]);
        }
    }
}
