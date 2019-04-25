<?php

use Illuminate\Database\Seeder;

class LoaindTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $currentTime=date('Y-m-d H:i:s');
        DB::table('loaind')->insert([
            [
                'MaLND' => 1,
                'TenLoai' => 'Khách hàng',
                'created_at' => $currentTime,
                'updated_at' => $currentTime,
            ],
            [
                'MaLND' => 2,
                'TenLoai' => 'Admin',
                'created_at' => $currentTime,
                'updated_at' => $currentTime,
            ],
            [
                'MaLND' => 3,
                'TenLoai' => 'Quản lý',
                'created_at' => $currentTime,
                'updated_at' => $currentTime,
            ],
            [
                'MaLND' => 4,
                'TenLoai' => 'Nhân viên kho',
                'created_at' => $currentTime,
                'updated_at' => $currentTime,
            ],
            [
                'MaLND' => 5,
                'TenLoai' => 'Nhân viên giao hàng',
                'created_at' => $currentTime,
                'updated_at' => $currentTime,
            ],
        ]);
    }
}
