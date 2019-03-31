<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TrangThai extends Model
{
    protected $table = 'trangthai';

    protected $primaryKey = 'MaTT';

    protected $fillable = ['TenTT'];

    public function donHangs()
    {
        return $this->hasMany('App\DonHang','MaTT');
    }
}
