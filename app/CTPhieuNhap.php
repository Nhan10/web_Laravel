<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CTPhieuNhap extends Model
{
    protected $table = 'ctphieunhap';

    protected $primaryKey = 'MaCTPN';

    protected $fillable = ['MaPN','MaSP','MaNCC','GiaNhap','SoLuong','TongTien','GhiChu'];

    public function sanPham()
    {
        return $this->belongsTo('App\SanPham','MaSP','MaCTPN');
    }

    public function phieuNhap()
    {
        return $this->belongsTo('App\PhieuNhap','MaPN','MaCTPN');
    }

    public function nhaCungCap()
    {
        return $this->belongsTo('App\NhaCungCap','MaNCC');
    }
}
