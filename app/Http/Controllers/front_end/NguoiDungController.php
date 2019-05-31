<?php

namespace App\Http\Controllers\front_end;

use App\CTDonHang;
use App\DonHang;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\NguoiDung;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class NguoiDungController extends Controller
{
    public function capNhapThongTinCaNhan()
    {
        if (isset(auth()->user()->MaND)){
            $nguoidung = NguoiDung::find(auth()->user()->MaND);
            return view('front_end.pages.capnhatthongtinnguoidung',compact('nguoidung'));
        }
        return redirect()->route('login');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\NguoiDung  $NguoiDung
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $rules = [
            'tenND' => 'required|max:155',
//            'email' => 'required',
//            'password' => 'required|min:8',
            'diaChi' => 'required|max:155',
            'sDT' => 'required|max:10',
        ];
        $customMessages = [
            'required' => ':attribute không được để trống!',
            'max' => ':attribute không được dài quá :max ký tự',
//            'min' => ':attribute phải dài hơn :min ký tự'
        ];
        $customValidationAttributes = [
            'tenND' => 'Tên người dùng',
//            'email' => 'email',
//            'password' => 'Mật khẩu',
            'diaChi' => 'Địa chỉ',
            'sDT' => 'Số điện thoại',
        ];
        $this->validate($request, $rules, $customMessages,$customValidationAttributes);

        $nguoidung = NguoiDung::find($id);
        $nguoidung->TenND = $request->tenND;
//        $nguoidung->email = $request->email;
//        $nguoidung->password = Hash::make($request->password);
        $nguoidung->DiaChi = $request->diaChi;
        $nguoidung->GioiTinh = $request->gioiTinh;
        $nguoidung->NgaySinh = $request->ngaySinh;
        $nguoidung->SDT = $request->sDT;
        $nguoidung->save();
        return redirect()->route('nguoidung.cntt')->with('success','Sửa người dùng thành công!');
    }

    public function getDonHang()
    {
        if (isset(auth()->user()->MaND))
        {
            $nguoidung = auth()->user();
            $donhangs = DonHang::where('MaND','=',$nguoidung->MaND)->orderby('MaDH','desc')->paginate(10);
            return view('front_end.pages.quanlydonhang',compact(['nguoidung','donhangs']));
        }
        return redirect()->route('login');
    }

    public function getCTDonHang(Request $request)
    {
        if (isset(auth()->user()->MaND))
        {
            $nguoidung = auth()->user();
            $MaDH = $request->code;
            $donhanged = DonHang::where('MaND','=',$nguoidung->MaND)->where('MaDH','=',$MaDH)->first();

            $ctdonhangs = CTDonHang::where('MaDH','=',$MaDH)->orderby('MaCTDH','desc')->get();
            return view('front_end.pages.quanlydonhangct',compact(['nguoidung','donhanged','ctdonhangs']));
        }
        return redirect()->route('login');
    }

    public function getDoiMatKhau()
    {
        if (isset(auth()->user()->MaND))
        {
            $nguoidung = auth()->user();
            return view('front_end.pages.doimatkhau',compact(['nguoidung']));
        }
        return redirect()->route('login');
    }

    public function doiMatKhau(Request $request,$MaND)
    {
        if (isset(auth()->user()->MaND))
        {
            Validator::extend('passwordcheck', function ($attribute, $value, $parameters, $validator) {

                return Hash::check($value, current($parameters));

            });
            $rules = [
                'password' => 'required|min:8|passwordcheck:' . Auth::user()->password.'',
                'newpassword' => 'required|min:8|confirmed|different:password'
            ];
            $customMessages = [
                'required' => ':attribute không được để trống!',
                'min' => ':attribute phải dài hơn :min ký tự',
                'confirmed' => 'Mật khẩu nhập lại không giống :attribute',
                'passwordcheck' => ':attribute không đúng',
                'different' => ':attribute không được trùng với mật khẩu cũ'
            ];
            $customValidationAttributes = [
                'password' => 'Mật khẩu',
                'newpassword' => 'Mật khẩu mới'
            ];
            $this->validate($request, $rules, $customMessages,$customValidationAttributes);

            $nguoidung = NguoiDung::find($MaND);
            $nguoidung->password = Hash::make($request->newpassword);
            $nguoidung->save();
            Auth::logout();
            return redirect()->route('login')->with('success','Đổi mật khẩu thành công! Vui lòng đăng nhập lại!');
        }
        return redirect()->route('login');
    }
}
