<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\App;

class SanPham extends Model
{
    protected $table = 'sanpham';

    protected $primaryKey = 'MaSP';

    protected $fillable = [
        'MaLoai','TenSP','Gia','SoLuong','MaTG','MoTa','SoTrang','LoaiBia','KichThuoc',
        'CanNang','NgonNgu','NXB','NamXB','DichGia'
    ];

    public function loaiSP()
    {
        return $this->belongsTo('App\LoaiSP','MaLoai');
    }

    public function hinhAnhs()
    {
        return $this->hasMany('App\HinhAnh','MaSP');
    }

    public function cTDonHangs()
    {
        return $this->hasMany('App\CTDonHang','MaSP');
    }

    public function tacGia()
    {
        return $this->belongsTo('App\TacGia','MaTG');
    }

    public function binhLuans()
    {
        return $this->hasMany('App\BinhLuan','MaSP');
    }

    public function cTPhieuNhaps()
    {
        return $this->hasMany('App\CTPhieuNhap','MaSP');
    }

}
