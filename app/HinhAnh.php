<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HinhAnh extends Model
{
    protected $table = 'hinhanh';

    protected $primaryKey = 'MaHA';

    protected $fillable = ['MaSP','DuongDan'];

    public function sanPham()
    {
        return $this->belongsTo('App\SanPham','MaSP','MaHA');
    }
}
