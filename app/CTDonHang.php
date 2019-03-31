<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CTDonHang extends Model
{
    protected $table = 'ctdonhang';

    protected $primaryKey = 'MaCTDH';

    protected $fillable = ['MaDH','MaSP','Gia','SoLuong'];

    public function sanPham()
    {
        return $this->belongsTo('App\SanPham','MaSP','MaCTDH');
    }

    public function donHang()
    {
        return $this->belongsTo('App\DonHang','MaDH','MaCTDH');
    }
}
