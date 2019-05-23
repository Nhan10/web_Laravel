<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\LoaiSP;

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

    public function countSanPhamByNhom(NhomSP $nhomSP)
    {
        $count = 0;
        foreach ($nhomSP->loaiSPs as $loaiSP)
        {
            $count += count($loaiSP->sanPhams);
        }
        return $count;
    }


    public function getSanphamByNhom($loaispOfnhomsp)
    {
        $sanphams = [];
        foreach ($loaispOfnhomsp as $loai)
        {
            $sanphams[] = $loai->sanPhams()->where('MaLoai',$loai->MaLoai)->get();
        }
        return $sanphams;
    }
}
