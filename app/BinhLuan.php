<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BinhLuan extends Model
{
    protected $table = 'binhluan';

    protected $primaryKey = 'MaBL';

    protected $fillable = ['MaND','MaSP','NoiDung','NgayBL'];

    public function sanPham()
    {
        return $this->belongsTo('App\SanPham','MaSP','MaBL');
    }

    public function nguoiDung()
    {
        return $this->belongsTo('App\NguoiDung','MaND','MaBL');
    }
}
