<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CTPhieuNhap extends Model
{
    protected $table = 'ctphieunhap';

    protected $primaryKey = 'MaCTPN';

    protected $fillable = ['MaPN','MaSP','GiaNhap','SoLuong','GhiChu'];

    public function sanPham()
    {
        return $this->belongsTo('App\SanPham','MaSP','MaCTPN');
    }

    public function phieuNhap()
    {
        return $this->belongsTo('App\PhieuNhap','MaPN','MaCTPN');
    }
}
