<?php

use Illuminate\Database\Seeder;

class SanphamTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $currentTime=date('Y-m-d H:i:s');
        DB::table('sanpham')->insert([
            [
                'MaSP' => 1,
                'MaLoai' => 1,
                'TenSP' => 'Tôi Thấy Hoa Vàng Trên Cỏ Xanh',
                'Gia' => 87000,
                'SoLuong' => 0,
                'MaTG' => 1,
                'MoTa' => 'Ta bắt gặp trong Tôi Thấy Hoa Vàng Trên Cỏ Xanh một thế giới đấy bất ngờ và thi vị non trẻ với những suy ngẫm giản dị thôi nhưng gần gũi đến lạ. Câu chuyện của Tôi Thấy Hoa Vàng Trên Cỏ Xanh có chút này chút kia, để ai soi vào cũng thấy mình trong đó, kiểu như lá thư tình đầu đời của cu Thiều chẳng hạ ngây ngô và khờ khạo.

Nhưng Tôi Thấy Hoa Vàng Trên Cỏ Xanh hình như không còn trong trẻo, thuần khiết trọn vẹn của một thế giới tuổi thơ nữa. Cuốn sách nhỏ nhắn vẫn hồn hậu, dí dỏm, ngọt ngào nhưng lại phảng phất nỗi buồn, về một người cha bệnh tật trốn nhà vì không muốn làm khổ vợ con, về một người cha khác giả làm vua bởi đứa con tâm thầm của ông luôn nghĩ mình là công chúa, Những bài học về luân lý, về tình người trở đi trở lại trong day dứt và tiếc nuối.

Tôi Thấy Hoa Vàng Trên Cỏ Xanh lắng đọng nhẹ nhàng trong tâm tưởng để rồi ai đã lỡ đọc rồi mà muốn quên đi thì thật khó.',
                'SoTrang' => 378,
                'LoaiBia' => 'Bìa mềm',
                'KichThuoc' => '300x250',
                'CanNang' => 900,
                'NgonNgu' => 'Tiếng việt',
                'NXB' => 'Nhà Xuất Bản Trẻ',
                'NamXB' => 2018,
                'DichGia' => null,
                'created_at' => $currentTime,
                'updated_at' => $currentTime,
            ],
            [
                'MaSP' => 2,
                'MaLoai' => 1,
                'TenSP' => 'Khi Tài Năng Không Theo Kịp Giấc Mơ',
                'Gia' => 57000,
                'SoLuong' => 0,
                'MaTG' => 2,
                'MoTa' => 'Khi ước mơ đủ lớn, hiện thực sẽ trở nên bé nhỏ!

Ai đó đã từng nói chiếc quần tất trắng tinh của người vũ công là để che đi những vết thương do luyện tập. Họ giấu đôi chân sưng đỏ trong chiếc quần tất trắng, mặc bộ váy rực rỡ nhất, mỉm cười đứng trên sân khấu tràn ngập ánh đèn, chìm đắm trong điệu nhảy cùng tiếng nhạc du dương. Khi tấm màn sân khấu khép lại, cơ thể họ đau đớn muốn lả đi, nhưng đổi lại họ nhận được tiếng vỗ tay ngợi khen của cả thế giới.',
                'SoTrang' => 256,
                'LoaiBia' => 'Bìa mềm',
                'KichThuoc' => '300x250',
                'CanNang' => 900,
                'NgonNgu' => 'Tiếng việt',
                'NXB' => '	Nhà Xuất Bản Thế Giới',
                'NamXB' => 2018,
                'DichGia' => null,
                'created_at' => $currentTime,
                'updated_at' => $currentTime,
            ],
        ]);
    }
}
