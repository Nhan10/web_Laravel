<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TacGia extends Model
{
    protected $table = 'tacgia';

    protected $primaryKey = 'MaTG';

    protected $fillable = ['TenTG','DiaChi','SDT'];

    public function sanPhams()
    {
        return $this->hasMany('App\SanPham','MaTG');
    }
}
