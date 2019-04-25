<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Session;

class PhieuNhap extends Model
{
    protected $table = 'phieunhap';

    protected $primaryKey = 'MaPN';

    protected $fillable = ['MaND','NgayNhap','GhiChu'];

    public function nguoiDung()
    {
        return $this->belongsTo('App\NguoiDung','MaND','MaPN');
    }

    public function cTPhieuNhaps()
    {
        return $this->hasMany('App\CTPhieuNhap','MaPN');
    }

    public static function addToPN($MaSP,$MaNCC,$GiaNhap,$SoLuong)
    {
        $ctphieunhap = Session::get('ctphieunhap');
        $ctphieunhap[$MaSP] = [
            "MaSP" => $MaSP,
            "MaNCC" => $MaNCC,
            "GiaNhap" => $GiaNhap,
            "SoLuong" => $SoLuong,
            "GhiChu" => '',
        ];

        Session::put('ctphieunhap', $ctphieunhap);
        //dd(Session::get('cart'));
//        return redirect()->back();
    }

}
