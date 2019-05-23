<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use App\CTPhieuNhap;
use App\NhaCungCap;
use App\PhieuNhap;
use App\SanPham;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class PhieuNhapController extends Controller
{
    public function __construct()
    {
        view()->composer(['admin.nhaphang.nhaphang'],function ($view){
            $nhacungcaps = NhaCungCap::all();
            $view->with('nhacungcaps',$nhacungcaps);
        });
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sanphams = SanPham::all();
        return view('admin.nhaphang.list',compact('sanphams'));
    }

    public function chonhang(Request $request)
    {
        if (($request->listSP)==null){
            return redirect()->route('nhaphang.index')->with('error','Bạn phải chọn sản phẩm cần nhập !');
        }

        foreach ($request->listSP as $sp)
        {
            $sanpham = SanPham::find($sp);
            $sps[] = $sanpham;
        }
        return view('admin.nhaphang.nhaphang',compact('sps'));
    }

    public function nhaphangct(Request $request)
    {
        $giaban = (integer)SanPham::find($request->MaSP)->Gia;
        $rules = [
            'MaSP' => 'required',
            'MaNCC' => 'required',
            'GiaNhap' => 'required|numeric|between:1,'.$giaban.'',
            'SoLuong' => 'required|integer|min:1',
            'GhiChu' => 'required|max:255',
        ];
        $customMessages = [
            'required' => ':attribute không được để trống !',
            'unique' => ':attribute không được trùng nhau !',
            'max' => ':attribute không được dài quá :max ký tự !',
            'min' => ':attribute phải lớn hơn :min !',
            'between' => ':attribute phải nằm trong khoảng :min và :max !',
            'integer' => ':attribute phải là số nguyên !',
            'numeric' => ':attribute phải là số!'
        ];
        $customName = [
            'MaSP' => 'Sản phẩm',
            'MaNCC' => 'Nhà cung cấp',
            'GiaNhap' => 'Giá nhập',
            'SoLuong' => 'Số lượng',
            'GhiChu' => 'Ghi chú',
        ];
        $validator = Validator::make($request->all(), $rules, $customMessages,$customName);

        if ($validator->fails()) {
            return response()->json(['errors'=>$validator->errors()->all()],422);
        }

        PhieuNhap::addToPN($request->MaSP,$request->MaNCC,$request->GiaNhap,$request->SoLuong,$request->GhiChu);

        if ($request->ajax()){
            return response()->json(['success'=>'Thêm thành công sản phẩm "'.SanPham::find($request->MaSP)->TenSP.'" vào danh sách nhập tạm thời !'],200);
        }
        return redirect()->back()->with('success','Thêm thành công!');
    }

    public function huynhap()
    {
        if (!(Session::get('ctphieunhap'))){
            return redirect()->route('nhaphang.index')->with('error','Nhập hàng thất bại vui lòng kiểm tra lại!');
        }
        Session()->forget('ctphieunhap');
        return redirect()->route('nhaphang.index')->with('success','Hủy nhập thành công');
    }

    public function xacnhan()
    {
        if (!(Session::get('ctphieunhap'))){
            return redirect()->back()->with('error','Bạn phải thêm đầy đủ thông tin!');
        }
        $ctphieunhapss = Session::get('ctphieunhap');
        return view('admin.nhaphang.xacnhan',compact('ctphieunhapss'));
    }

    public function store()
    {
        if (!(Session::get('ctphieunhap'))){
            return redirect()->route('nhaphang.index')->with('error','Nhập hàng thất bại vui lòng kiểm tra lại!');
        }
//        dd($sps);
//        dd(Session::get('ctphieunhap'));

        $total = 0;
        foreach(Session::get('ctphieunhap') as $keys => $ctphieunhaps) {
            $total += (int)(($ctphieunhaps['GiaNhap']) * ($ctphieunhaps['SoLuong']));
        }
//        dd($total);

        $phieunhap = new PhieuNhap();
        $phieunhap->MaND = Auth::user()->MaND;
        $phieunhap->NgayNhap = date('Y-m-d H:i:s');
        $phieunhap->TongTien = $total;
        $phieunhap->GhiChu = '';
        $phieunhap->save();
        $ctphieunhapss = Session::get('ctphieunhap');
//        dd($ctphieunhapss);

        foreach ($ctphieunhapss as $ct)
        {
            $ctphieunhap = new CTPhieuNhap();
            $ctphieunhap->MaPN = $phieunhap->MaPN;
            $ctphieunhap->MaSP = $ct['MaSP'];
            $ctphieunhap->MaNCC = $ct['MaNCC'];
            $ctphieunhap->GiaNhap = $ct['GiaNhap'];
            $ctphieunhap->SoLuong = $ct['SoLuong'];
            $ctphieunhap->TongTien = ($ct['GiaNhap'])*($ct['SoLuong']);
            $ctphieunhap->GhiChu = $ct['GhiChu'];
            $ctphieunhap->save();
            $sanpham = SanPham::find($ct['MaSP']);
            if (($sanpham->SoLuong+$ct['SoLuong']) </*=*/ $ct['SoLuong']) {
                $phieunhap->delete();
//                return redirect()->route('cart.index')->with('status', 'Ordering fail. '.$sanpham->TenSP.' not enough quantity' );
            }
        }
        foreach($ctphieunhapss as $ct){
            $sanpham = SanPham::find($ct['MaSP']);
            $sanpham->SoLuong=$sanpham->SoLuong+$ct['SoLuong'];
            $sanpham->save();
        }
        Session()->forget('ctphieunhap');
        return redirect()->route('nhaphang.index')->with('success','Nhập thành công');
    }
}
