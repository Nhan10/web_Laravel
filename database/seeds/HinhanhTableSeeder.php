<?php

use Illuminate\Database\Seeder;

class HinhanhTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $currentTime=date('Y-m-d H:i:s');
        DB::table('hinhanh')->insert([
            [
                'MaHA' => 1,
                'MaSP' => 1,
                'DuongDan' => 'images/default.png',
                'created_at' => $currentTime,
                'updated_at' =>$currentTime,
            ],
            [
                'MaHA' => 2,
                'MaSP' => 2,
                'DuongDan' => 'images/default.png',
                'created_at' => $currentTime,
                'updated_at' =>$currentTime,
            ],
        ]);
    }
}
