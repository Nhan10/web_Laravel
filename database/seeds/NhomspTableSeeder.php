<?php

use Illuminate\Database\Seeder;

class NhomspTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $currentTime=date('Y-m-d H:i:s');
        DB::table('nhomsp')->insert([
            [
                'MaNSP' => 1,
                'TenNSP' => 'Sách học ngoại ngữ',
                'MaDM' => 3,
                'created_at' => $currentTime,
                'updated_at' => $currentTime,
            ],
            [
                'MaNSP' => 2,
                'TenNSP' => 'Văn học',
                'MaDM' => 3,
                'created_at' => $currentTime,
                'updated_at' => $currentTime,
            ],
            [
                'MaNSP' => 3,
                'TenNSP' => 'Kinh tế',
                'MaDM' => 3,
                'created_at' => $currentTime,
                'updated_at' => $currentTime,
            ],
            [
                'MaNSP' => 4,
                'TenNSP' => 'Sách thiếu nhi',
                'MaDM' => 3,
                'created_at' => $currentTime,
                'updated_at' => $currentTime,
            ],
            [
                'MaNSP' => 5,
                'TenNSP' => 'Kỹ năng sống',
                'MaDM' => 3,
                'created_at' => $currentTime,
                'updated_at' => $currentTime,
            ],
            [
                'MaNSP' => 6,
                'TenNSP' => 'Sách tham khảo',
                'MaDM' => 3,
                'created_at' => $currentTime,
                'updated_at' => $currentTime,
            ],
        ]);
    }
}
