<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class NhomSP extends Model
{
    protected $table = 'nhomsp';

    protected $primaryKey = 'MaNSP';

    protected $fillable = ['TenNSP','MaDM'];

    public function danhMucSP()
    {
        return $this->belongsTo('App\DanhMucSP','MaDM');
    }

    public function loaiSPs()
    {
        return $this->hasMany('App\LoaiSP','MaNSP');
    }
}
