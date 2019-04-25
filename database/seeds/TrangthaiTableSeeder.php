<?php

use Illuminate\Database\Seeder;

class TrangthaiTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $currentTime=date('Y-m-d H:i:s');
        DB::table('trangthai')->insert([
            [
                'MaTT' => 1,
                'TenTT' => 'Đang xử lý',
                'created_at' => $currentTime,
                'updated_at' => $currentTime,
            ],
            [
                'MaTT' => 2,
                'TenTT' => 'Đã xử lý',
                'created_at' => $currentTime,
                'updated_at' => $currentTime,
            ],
            [
                'MaTT' => 3,
                'TenTT' => 'Đang giao hàng',
                'created_at' => $currentTime,
                'updated_at' => $currentTime,
            ],
            [
                'MaTT' => 4,
                'TenTT' => 'Giao hàng thành công',
                'created_at' => $currentTime,
                'updated_at' => $currentTime,
            ],
            [
                'MaTT' => 5,
                'TenTT' => 'Đã hủy',
                'created_at' => $currentTime,
                'updated_at' => $currentTime,
            ],
        ]);
    }
}
