<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class NhaCungCap extends Model
{
    protected $table = 'nhacungcap';

    protected $primaryKey = 'MaNCC';

    protected $fillable = ['TenNCC','DiaChi','SDT'];

    public function sanPhams()
    {
        return $this->hasMany('App\SanPham','MaNCC');
    }
}
