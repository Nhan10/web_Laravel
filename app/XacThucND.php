<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class XacThucND extends Model
{
    protected $table = 'xacthucnd';

    protected $primaryKey = 'MaXTND';

    protected $fillable = ['MaND','token'];

    public function nguoiDung()
    {
        return $this->belongsTo('App\NguoiDung','MaND','MaXTND');
    }
}
