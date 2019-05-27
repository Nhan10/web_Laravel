<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DanhMucSP extends Model
{
    protected $table ='danhmucsp';

    protected $primaryKey = 'MaDM';

    protected $fillable = ['TenDM'];

    public function nhomSPs()
    {
        return $this->hasMany('App\NhomSP','MaDM');
    }

    public function loaiSPs()
    {
        return $this->hasManyThrough('App\LoaiSP', 'App\NhomSP','MaDM','MaNSP');
    }

    public function countSanPhamByDanhMuc(DanhMucSP $danhMucSP)
    {
        $count = 0;
        foreach ($danhMucSP->nhomSPs as $nhomSP)
        {
            foreach ($nhomSP->loaiSPs as $loaiSP)
            {
                $count += count($loaiSP->sanPhams);
            }
        }
        return $count;
    }
}
