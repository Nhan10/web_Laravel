<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LoaiSP extends Model
{
    protected $table = 'loaisp';

    protected $primaryKey = 'MaLoai';

    protected $fillable = ['TenLoai','MaNSP'];

    public function nhomSP()
    {
        return $this->belongsTo('App\NhomSP','MaNSP');
    }

    public function sanPhams()
    {
        return $this->hasMany('App\SanPham','MaLoai');
    }

    public function countSanPhamByLoai(LoaiSP $loaiSP)
    {
        $count = count($loaiSP->sanPhams);
        return $count;
    }
}
