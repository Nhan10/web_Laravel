<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DonHang extends Model
{
    protected $table = 'donhang';

    protected $primaryKey = 'MaDH';

    protected $fillable = ['MaND','TongTien','TenKH','DiaChi','SDT','NgayDat','NgayGiao','MaTT'];

    public function nguoiDung()
    {
        return $this->belongsTo('App\NguoiDung','MaND','MaDH');
    }

    public function cTDonHangs()
    {
        return $this->hasMany('App\CTDonHang','MaDH');
    }

    public function trangThai()
    {
        return $this->belongsTo('App\TrangThai','MaTT','MaDH');
    }
}
