<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DonHang extends Model
{
    protected $table = 'donhang';

    protected $primaryKey = 'MaDH';

    protected $fillable = ['MaND','MaNVGH','MaNVK','MaQL','MaQTV','TongTien','TenKH','DiaChi','SDT','NgayDat','NgayGiao','MaTT'];

    public function nguoiDung()
    {
        return $this->belongsTo('App\NguoiDung','MaND');
    }

    public function nguoiDungNVGH()
    {
        return $this->belongsTo('App\NguoiDung','MaNVGH');
    }

    public function nguoiDungNVK()
    {
        return $this->belongsTo('App\NguoiDung','MaNVK');
    }

    public function nguoiDungQL()
    {
        return $this->belongsTo('App\NguoiDung','MaQL');
    }

    public function nguoiDungQTV()
    {
        return $this->belongsTo('App\NguoiDung','MaQTV');
    }

    public function cTDonHangs()
    {
        return $this->hasMany('App\CTDonHang','MaDH');
    }

    public function trangThai()
    {
        return $this->belongsTo('App\TrangThai','MaTT');
    }
}
