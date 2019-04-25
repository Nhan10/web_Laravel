<?php

namespace App\Http\Controllers;

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
            return redirect()->route('nhaphang.index')->with('error','Bạn phải chọn hàng cần nhập!');
        }

        foreach ($request->listSP as $sp)
        {
            $sanpham = SanPham::find($sp);
            $sps[] = $sanpham;
        }
        return view('admin.nhaphang.nhaphang',compact('sps'));
    }

    public function nhaphangct(Request $request,$masp)
    {
        $rules = [
            'MaSP' => 'required',
            'MaNCC' => 'required',
            'GiaNhap' => 'required',
            'SoLuong' => 'required',
        ];
        $customMessages = [
            'required' => ':attribute không được để trống!',
            'unique' => ':attribute không được trùng nhau!',
            'max' => ':attribute không được dài quá :max ký tự',
            'min' => ':attribute phải dài hơn :min ký tự'
        ];
        $customName = [
            'MaSP' => 'Sản phẩm',
            'MaNCC' => 'Nhà cung cấp',
            'GiaNhap' => 'Giá nhập',
            'SoLuong' => 'Số lượng',
        ];
        $this->validate($request, $rules, $customMessages,$customName);

        PhieuNhap::addToPN($request->MaSP,$request->MaNCC,$request->GiaNhap,$request->SoLuong);

        if ($request->ajax()){
            return response()->json(['success'=>'Thêm thành công!']);
        }
        return redirect()->back()->with('success','Thêm thành công!');
    }

    public function huynhap()
    {
        Session()->forget('ctphieunhap');
        return redirect()->route('nhaphang.index')->with('success','Hủy nhập thành công');
    }

    public function xacnhan()
    {
        $ctphieunhapss = Session::get('ctphieunhap');
        return view('admin.nhaphang.xacnhan',compact('ctphieunhapss'));
    }

    public function store()
    {
//        dd($sps);
//        dd(Session::get('ctphieunhap'));
        $phieunhap = new PhieuNhap();
        $phieunhap->MaND = Auth::user()->MaND;
        $phieunhap->NgayNhap = date('Y-m-d H:i:s');
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
            $ctphieunhap->GhiChu = $ct['GhiChu'];
            $ctphieunhap->save();
            $sanpham = SanPham::find($ct['MaSP']);
            if (($sanpham->SoLuong+$ct['SoLuong']) <= $ct['SoLuong']) {
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
