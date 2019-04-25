<?php

use Illuminate\Database\Seeder;

class LoaispTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $currentTime=date('Y-m-d H:i:s');
        DB::table('loaisp')->insert([
            [
                'MaLoai' => 1,
                'TenLoai' => 'Truyện ngắn',
                'MaNSP' => 2,
                'created_at' => $currentTime,
                'updated_at' =>$currentTime,
            ],
            [
                'MaLoai' => 2,
                'TenLoai' => 'Ngôn tình',
                'MaNSP' => 2,
                'created_at' => $currentTime,
                'updated_at' =>$currentTime,
            ],
            [
                'MaLoai' => 3,
                'TenLoai' => 'Tiểu thuyết',
                'MaNSP' => 2,
                'created_at' => $currentTime,
                'updated_at' =>$currentTime,
            ],
            [
                'MaLoai' => 4,
                'TenLoai' => 'Truyện dài',
                'MaNSP' => 2,
                'created_at' => $currentTime,
                'updated_at' =>$currentTime,
            ],
        ]);
    }
}
