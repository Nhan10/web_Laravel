<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Session;

class PhieuNhap extends Model
{
    protected $table = 'phieunhap';

    protected $primaryKey = 'MaPN';

    protected $fillable = ['MaND','NgayNhap','TongTien','GhiChu'];

    public function nguoiDung()
    {
        return $this->belongsTo('App\NguoiDung','MaND','MaPN');
    }

    public function cTPhieuNhaps()
    {
        return $this->hasMany('App\CTPhieuNhap','MaPN');
    }

    public static function addToPN($MaSP,$MaNCC,$GiaNhap,$SoLuong,$GhiChu)
    {
        $ctphieunhap = Session::get('ctphieunhap');
//        if (isset($ctphieunhap[$MaSP]))
//        {
//            $ctphieunhap[$MaSP]['SoLuong']+=$SoLuong;
//        }
//        else{
            $ctphieunhap[$MaSP] = [
                "MaSP" => $MaSP,
                "MaNCC" => $MaNCC,
                "GiaNhap" => $GiaNhap,
                "SoLuong" => $SoLuong,
                "GhiChu" => $GhiChu,
            ];
//        }

        Session::put('ctphieunhap', $ctphieunhap);
        //dd(Session::get('cart'));
//        return redirect()->back();
    }
}
