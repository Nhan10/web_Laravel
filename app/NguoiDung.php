<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use DB;
use Mail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class NguoiDung extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = 'nguoidung';
    protected $primaryKey = 'MaND';
//    protected $guarded = 'nguoidungs';
    protected $fillable = [
        'TenND', 'email', 'password','DiaChi','SDT','GioiTinh','NgaySinh','active','MaLND'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function loaiND()
    {
        return $this->belongsTo('App\LoaiND','MaLND');
    }

    public function xacThucNDs()
    {
        return $this->hasMany('App\XacThucND','MaND');
    }

    public function binhLuans()
    {
        return $this->hasMany('App\BinhLuan','MaND');
    }

    public function phieuNhaps()
    {
        return $this->hasMany('App\PhieuNhap','MaND');
    }

    public function donHangs()
    {
        return $this->hasMany('App\DonHang','MaND');
    }

    public function donHangNVGHs()
    {
        return $this->hasMany('App\DonHang','MaNVGH');
    }

    public function donHangNVKs()
    {
        return $this->hasMany('App\DonHang','MaNVK');
    }

    public function donHangQLs()
    {
        return $this->hasMany('App\DonHang','MaQL');
    }

    public function donHangQTVs()
    {
        return $this->hasMany('App\DonHang','MaQTV');
    }

    public function is_quyen()
    {
        return $this->getAttribute('MaLND');
    }

    public function is_admin()
    {
        return $this->getAttribute('MaLND') == 2;
    }

    public function send_code_mail(NguoiDung $nguoiDung){
        $nguoiDung['link'] = str_random(30);

        DB::table('xacthucnd')->insert(['MaND'=>$nguoiDung['MaND'],'token'=>$nguoiDung['link']]);

        Mail::send('front_end.pages.activation1', $nguoiDung->toArray(), function($message) use ($nguoiDung){
            $message->to($nguoiDung['email']);
            $message->subject('Bookstore - Xác thực người dùng');
        });
    }

    public function owns(DonHang $donHang)
    {
        return /*$this->MaND == $donHang->MaQTV ||*/ $this->MaND == $donHang->MaQL;
    }
    public function canEditGH(DonHang $donHang)
    {
        return $this->owns($donHang);
    }

}
