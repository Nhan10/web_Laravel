<?php

namespace App\Http\Controllers;

use App\LoaiND;
use Illuminate\Http\Request;
use App\NguoiDung;
use DB;
use Mail;
use Illuminate\Support\Facades\Hash;

class NguoiDungController extends Controller
{
    public function __construct()
    {
        view()->composer(['admin.nguoidung.phanquyen'],function ($view){
            $loainds = LoaiND::all();
            $view->with('loainds',$loainds);
        });
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $nguoidungs = NguoiDung::all();
        return view('admin.nguoidung.list',compact('nguoidungs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $loainds = LoaiND::all();
        return view('admin.nguoidung.create',compact('loainds'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = [
            'tenND' => 'required|max:155',
            'email' => 'required|unique:nguoidung',
            'password' => 'required|min:8',
            'diaChi' => 'required|max:155',
            'sDT' => 'required|max:10',
        ];
        $customMessages = [
            'required' => ':attribute không được để trống!',
            'unique' => ':attribute không được trùng nhau!',
            'max' => ':attribute không được dài quá :max ký tự',
            'min' => ':attribute phải dài hơn :min ký tự'
        ];
        $customValidationAttributes = [
            'tenND' => 'Tên người dùng',
            'email' => 'email',
            'password' => 'Mật khẩu',
            'diaChi' => 'Địa chỉ',
            'sDT' => 'Số điện thoại',
        ];
        $this->validate($request, $rules, $customMessages,$customValidationAttributes);

        $nguoidung = new NguoiDung();
        $nguoidung->TenND = $request->tenND;
        $nguoidung->email = $request->email;
        $nguoidung->password = Hash::make($request->password);
        $nguoidung->DiaChi = $request->diaChi;
        $nguoidung->SDT = $request->sDT;
        $nguoidung->GioiTinh = $request->gioiTinh;
        $nguoidung->NgaySinh = $request->ngaySinh;
        $nguoidung->active = 0;
        $nguoidung->MaLND = $request->MaLND;
        $nguoidung->save();
        $nguoidung->send_code_mail($nguoidung);
        return redirect()->route('nguoidung.index')->with('success','Tạo người dùng thành công!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\NguoiDung  $NguoiDung
     * @return \Illuminate\Http\Response
     */
    public function show($MaND)
    {
        $nguoidung = NguoiDung::find($MaND);
        return view('admin.nguoidung.phanquyen',compact('nguoidung'));
//        return view('admin.nguoidung.partials.modalPhanQuyen',compact(['nguoidung','loainds']));
    }

    public function phanquyen(Request $request, $MaND)
    {
        $nguoidung = NguoiDung::find($MaND);
        $nguoidung->MaLND = $request->MaLND;
        $nguoidung->save();
        return redirect()->route('nguoidung.index')->with('success','Phân quyền thành công!');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\NguoiDung  $NguoiDung
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $nguoidung = NguoiDung::find($id);
        return view('admin.nguoidung.edit',compact('nguoidung'));
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
            'password' => 'required|min:8',
            'diaChi' => 'required|max:155',
            'sDT' => 'required|max:10',
        ];
        $customMessages = [
            'required' => ':attribute không được để trống!',
            'unique' => ':attribute không được trùng nhau!',
            'max' => ':attribute không được dài quá :max ký tự',
            'min' => ':attribute phải dài hơn :min ký tự'
        ];
        $customValidationAttributes = [
            'tenND' => 'Tên người dùng',
//            'email' => 'email',
            'password' => 'Mật khẩu',
            'diaChi' => 'Địa chỉ',
            'sDT' => 'Số điện thoại',
        ];
        $this->validate($request, $rules, $customMessages,$customValidationAttributes);

        $nguoidung = NguoiDung::find($id);
        $nguoidung->TenND = $request->tenND;
//        $nguoidung->email = $request->email;
        $nguoidung->password = Hash::make($request->password);
        $nguoidung->DiaChi = $request->diaChi;
        $nguoidung->GioiTinh = $request->gioiTinh;
        $nguoidung->NgaySinh = $request->ngaySinh;
        $nguoidung->SDT = $request->sDT;
        $nguoidung->save();
        return redirect()->route('nguoidung.index')->with('success','Sửa người dùng thành công!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\NguoiDung  $NguoiDung
     * @return \Illuminate\Http\Response
     */
    public function destroy($MaND)
    {
        $nguoidung = NguoiDung::find($MaND);
        if (count($nguoidung->binhLuans)>0 || count($nguoidung->phieuNhaps)>0 || count($nguoidung->donHangs)>0)
        {
            return redirect()->route('nguoidung.index')->with('error','Không thể xóa người dùng này!');
        }
        $nguoidung->delete();
        return redirect()->route('nguoidung.index')->with('success','Xóa người đùng thành công!');
    }

    public function userActivation($token)
    {
        $check = DB::table('xacthucnd')->where('token', $token)->first();
        if (!is_null($check)) {
            $nguoidung = NguoiDung::find($check->MaND);
            if ($nguoidung->active == 1) {
                return redirect()->to('login')->with('success', "Bạn đã xác thực!.");

            }
            $nguoidung->active = 1;
            $nguoidung->save();
            DB::table('xacthucnd')->where('token', $token)->delete();
            return redirect()->to('login')->with('success', "Xác thực thành công!.");
        }
        return redirect()->to('login')->with('warning', "Mã code của bạn có vấn đề!");
    }

}
