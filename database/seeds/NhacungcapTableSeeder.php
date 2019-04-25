<?php

use Illuminate\Database\Seeder;

class NhacungcapTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $currentTime=date('Y-m-d H:i:s');
        DB::table('nhacungcap')->insert([
            [
                'MaNCC' => 1,
                'TenNCC' => 'Fahasa',
                'DiaChi' => 'TP.Hồ Chí Minh',
                'SDT' => '00000000',
                'created_at' => $currentTime,
                'updated_at' =>$currentTime,
            ],
            [
                'MaNCC' => 2,
                'TenNCC' => 'VivoBook',
                'DiaChi' => 'TP.Hồ Chí Minh',
                'SDT' => '00000000',
                'created_at' => $currentTime,
                'updated_at' =>$currentTime,
            ],
        ]);
    }
}
