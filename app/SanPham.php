<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SanPham extends Model
{
    protected $table = 'sanpham';

    protected $primaryKey = 'MaSP';

    protected $fillable = [
        'MaLoai','TenSP','Gia','SoLuong','MaTG','MoTa','SoTrang','LoaiBia','KichThuoc',
        'CanNang','NgonNgu','NXB','NamXB','DichGia','MaNCC'
    ];

    public function loaiSP()
    {
        return $this->belongsTo('App\LoaiSP','MaLoai','MaSP');
    }

    public function hinhAnhs()
    {
        return $this->hasMany('App\HinhAnh','MaSP');
    }

    public function nhaCungCap()
    {
        return $this->belongsTo('App\NhaCungCap','MaNCC');
    }

    public function cTDonHangs()
    {
        return $this->hasMany('App\CTDonHang','MaSP');
    }

    public function tacGia()
    {
        return $this->belongsTo('App\TacGia','MaTG','MaSP');
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
