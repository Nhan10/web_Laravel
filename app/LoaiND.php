<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LoaiND extends Model
{
    protected $table = 'loaind';

    protected $primaryKey = 'MaLND';

    protected $fillable = ['TenLoai'];

    public function nguoiDungs()
    {
        return $this->hasMany('App\NguoiDung','MaLND');
    }
}
