<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(LoaindTableSeeder::class);
         $this->call(NguoidungTableSeeder::class);
         $this->call(DanhmucspTableSeeder::class);
        $this->call(NhomspTableSeeder::class);
        $this->call(LoaispTableSeeder::class);
        $this->call(TacgiaTableSeeder::class);
        $this->call(SanphamTableSeeder::class);
        $this->call(HinhanhTableSeeder::class);
        $this->call(TrangthaiTableSeeder::class);
        $this->call(NhacungcapTableSeeder::class);
    }
}
