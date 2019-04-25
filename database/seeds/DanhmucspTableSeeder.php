<?php

use Illuminate\Database\Seeder;

class DanhmucspTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $currentTime=date('Y-m-d H:i:s');
        DB::table('danhmucsp')->insert([
            [
                'MaDM' => 1,
                'TenDM' => 'Khác',
                'created_at' => $currentTime,
                'updated_at' => $currentTime,
            ],
            [
                'MaDM' => 2,
                'TenDM' => 'Sách nước ngoài',
                'created_at' => $currentTime,
                'updated_at' => $currentTime,
            ],
            [
                'MaDM' => 3,
                'TenDM' => 'Sách trong nước',
                'created_at' => $currentTime,
                'updated_at' => $currentTime,
            ]
        ]);
    }
}
