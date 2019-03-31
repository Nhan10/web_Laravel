<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PhieuNhap extends Model
{
    protected $table = 'phieunhap';

    protected $primaryKey = 'MaPN';

    protected $fillable = ['MaND','NgayNhap'];

    public function nguoiDung()
    {
        return $this->belongsTo('App\NguoiDung','MaND','MaPN');
    }

    public function cTPhieuNhaps()
    {
        return $this->hasMany('App\CTPhieuNhap','MaPN');
    }
}
