<?php

use Illuminate\Database\Seeder;

class TacgiaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $currentTime=date('Y-m-d H:i:s');
        DB::table('tacgia')->insert([
            [
                'MaTG' => 1,
                'TenTG' => 'Nguyễn Nhật Ánh',
                'DiaChi' => 'TP.Hồ Chí Minh',
                'SDT' => '0000000',
                'GioiThieu' => 'Nguyễn Nhật Ánh là tên và cũng là bút danh của một nhà văn Việt Nam chuyên viết cho tuổi mới lớn.
Thuở nhỏ ông theo học tại các trường Tiểu La, Trần Cao Vân và Phan Chu Trinh. Từ 1973 Nguyễn Nhật Ánh chuyển vào sống tại Sài Gòn, theo học ngành sư phạm. Ông đã từng đi Thanh niên xung phong, dạy học, làm công tác Đoàn Thanh niên Cộng Sản Hồ Chí Minh. Từ 1986 đến nay ông là phóng viên nhật báo Sài Gòn Giải Phóng, lần lượt viết về sân khấu, phụ trách mục tiểu phẩm, phụ trách trang thiếu nhi và hiện nay là bình luận viên thể thao trên báo Sài Gòn Giải Phóng Chủ nhật với bút danh Chu Đình Ngạn. Ngoài ra, Nguyễn Nhật Ánh còn có những bút danh khác như Anh Bồ Câu, Lê Duy Cật, Đông Phương Sóc, Sóc Phương Đông,...',
                'created_at' => $currentTime,
                'updated_at' => $currentTime,
            ],
            [
                'MaTG' => 2,
                'TenTG' => 'Mèo Maverick',
                'DiaChi' => 'TP.Hồ Chí Minh',
                'SDT' => '01010101',
                'GioiThieu' => null,
                'created_at' => $currentTime,
                'updated_at' => $currentTime,
            ],
        ]);
    }
}
