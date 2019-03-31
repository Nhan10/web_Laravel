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
}
