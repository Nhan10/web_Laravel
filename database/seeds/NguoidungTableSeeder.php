<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class NguoidungTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $currentTime=date('Y-m-d H:i:s');
        DB::table('nguoidung')->insert([
            [
                'MaND' => 1,
                'TenND' => Str::random(10),
                'email' => 'hovannhan.php@gmail.com',
                'password' => '$2y$10$7c565QlZCU54BHNnR.Wt4.q/is7Gis83igawDCjp4YrP5JL6fUEjG',
                'DiaChi' => 'Điện phong, Điện Bàn, Quảng Nam',
                'SDT' => '9999999',
                'active' => 1,
                'MaLND' => 2,
                'created_at' => $currentTime,
                'updated_at' => $currentTime,
            ],
            [
                'MaND' => 2,
                'TenND' => Str::random(10),
                'email' => 'hovannhan@gmail.com',
                'password' => '$2y$10$7c565QlZCU54BHNnR.Wt4.q/is7Gis83igawDCjp4YrP5JL6fUEjG',
                'DiaChi' => 'Điện phong, Điện Bàn, Quảng Nam',
                'SDT' => '9999999',
                'active' => 1,
                'MaLND' => 1,
                'created_at' => $currentTime,
                'updated_at' => $currentTime,
            ],
            [
                'MaND' => 3,
                'TenND' => Str::random(10),
                'email' => 'tranvantu.php@gmail.com',
                'password' => '$2y$10$7c565QlZCU54BHNnR.Wt4.q/is7Gis83igawDCjp4YrP5JL6fUEjG',
                'DiaChi' => 'Điện phương, Điện Bàn, Quảng Nam',
                'SDT' => '9999999',
                'active' => 1,
                'MaLND' => 1,
                'created_at' => $currentTime,
                'updated_at' => $currentTime,
            ],
            [
                'MaND' => 4,
                'TenND' => Str::random(10),
                'email' => 'duongtanvinh.php@gmail.com',
                'password' => '$2y$10$7c565QlZCU54BHNnR.Wt4.q/is7Gis83igawDCjp4YrP5JL6fUEjG',
                'DiaChi' => 'Quảng Nam',
                'SDT' => '9999999',
                'active' => 1,
                'MaLND' => 1,
                'created_at' => $currentTime,
                'updated_at' => $currentTime,
            ],
            [
                'MaND' => 5,
                'TenND' => Str::random(10),
                'email' => 'tanthiha.ruby@gmail.com',
                'password' => '$2y$10$7c565QlZCU54BHNnR.Wt4.q/is7Gis83igawDCjp4YrP5JL6fUEjG',
                'DiaChi' => 'Điện phong, Điện Bàn, Quảng Nam',
                'SDT' => '9999999',
                'active' => 1,
                'MaLND' => 1,
                'created_at' => $currentTime,
                'updated_at' => $currentTime,
            ],
        ]);
    }
}
