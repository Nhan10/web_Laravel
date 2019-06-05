<?php

namespace App\Http\Controllers;

use App\CTDonHang;
use App\DonHang;
use App\NguoiDung;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DonHangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $MaLND = \auth()->user()->MaLND;
        if ($MaLND == 2 || $MaLND == 3)
        {
            $donhangs = DonHang::orderby('MaDH','desc')->get();
            return view('admin.donhang.cardQLandAD',compact(['donhangs','title']));
        }
        if ($MaLND == 4)
        {
            $title = 'Danh sách đơn hàng cần xuất kho!';
            $donhangs = DonHang::where('MaTT',2)->orderby('MaDH','desc')->get();
            return view('admin.donhang.cardxuathang',compact(['donhangs','title']));
        }
        if ($MaLND == 5)
        {
            $donhangs = DonHang::where('MaTT', 3)
                ->Where('MaNVGH', \auth()->user()->MaND)
                ->orderby('MaDH', 'desc')
                ->get();
            $title = 'Danh sách đơn hàng cần giao <br> của nhân viên "'.\auth()->user()->TenND.'"! <br>'.'( Có '.$donhangs->count().' đơn hàng cần giao)';
            return view('admin.donhang.cardgiaohang',compact(['donhangs','title']));
        }
    }

    public function locTheoDieuKien(Request $request)
    {
        $key = $request->key;
        //All
        if ($key ==1)
        {
            $donhangs = DonHang::orderby('MaDH','desc')->get();
            if ($request->ajax()) {
                return view('admin.donhang.partials.card',compact('donhangs'))->render();
            }
        }
        //Chờ xử lý
        if ($key ==2)
        {
            $donhangs = DonHang::where('MaTT',1)->orderby('MaDH','desc')->get();
            $nhanviengiaohangs = NguoiDung::where('MaLND',5)->get();
            if ($request->ajax()) {
                return view('admin.donhang.partials.cardXulyajax',compact(['donhangs','nhanviengiaohangs']))->render();
            }
        }
        //đã xủ lý
        if ($key ==3)
        {
            $donhangs = DonHang::where('MaTT',2)->orderby('MaDH','desc')->get();
            $nhanviengiaohangs = NguoiDung::where('MaLND',5)->get();
            if ($request->ajax()) {
                return view('admin.donhang.partials.cardDaxuly',compact(['donhangs','nhanviengiaohangs']))->render();
            }
        }
        //đang giao
        if ($key ==4)
        {
            $donhangs = DonHang::where('MaTT', 3)->orderby('MaDH', 'desc')->get();
            if ($request->ajax()) {
                return view('admin.donhang.partials.cardDanggiao',compact('donhangs'))->render();
            }
        }
        //đã giao
        if ($key ==5)
        {
            $donhangs = DonHang::where('MaTT',4)->orderby('MaDH','desc')->get();
            if ($request->ajax()) {
                return view('admin.donhang.partials.card',compact('donhangs'))->render();
            }
        }
        return view('admin.donhang.partials.forbidden')->render();
    }

    public function xulydonhang(Request $request, $MaDH)
    {
        $MaNVGH = $request->MaNVGH;

        $donhang = DonHang::find($MaDH);

        $Quyen = \auth()->user()->MaLND;
        if ($donhang && $Quyen == 2)
        {
            $donhang->update(['MaNVGH'=>$MaNVGH,'MaQTV'=> \auth()->user()->MaND,'MaQL'=>null,'MaTT'=>2]);
        }
        if ($donhang && $Quyen == 3)
        {
            $donhang->update(['MaNVGH'=>$MaNVGH,'MaQL'=>\auth()->user()->MaND,'MaQTV'=>null,'MaTT'=>2]);
        }
        $donhangs = DonHang::where('MaTT',1)->orderby('MaDH','desc')->get();
        $nhanviengiaohangs = NguoiDung::where('MaLND',5)->get();
        return view('admin.donhang.partials.cardXuLy',compact(['donhangs','nhanviengiaohangs']));
    }

    public function updatexulydonhang(Request $request, $MaDH)
    {
        $MaNVGH = $request->MaNVGH;

        $donhang = DonHang::find($MaDH);

        $ngnhap = \auth()->user();
        $nhanviengiaohangs = NguoiDung::where('MaLND',5)->get();

        $Quyen = \auth()->user()->MaLND;
        if ($donhang && $Quyen == 2)
        {
            $donhang->update(['MaNVGH'=>$MaNVGH,'MaQTV'=> \auth()->user()->MaND,'MaQL'=>null,'MaTT'=>2]);
            $donhangs = DonHang::where('MaTT',2)->orderby('MaDH','desc')->get();
            return view('admin.donhang.partials.cardXuLy',compact(['donhangs','nhanviengiaohangs']));
        }
        //quản lý chỉ được sửa cái do quản lý xử lý
        if ($ngnhap->canEditGH($donhang)==true)
        {
            $donhang->update(['MaNVGH'=>$MaNVGH,'MaQL'=>\auth()->user()->MaND,'MaQTV'=>null,'MaTT'=>2]);
            $donhangs = DonHang::where('MaTT',2)->orderby('MaDH','desc')->get();
            return view('admin.donhang.partials.cardXuLy',compact(['donhangs','nhanviengiaohangs']));
        }
//        dd($ngnhap->canEditGH($donhang));

        $donhangs = DonHang::where('MaTT',2)->orderby('MaDH','desc')->get();
        return view('admin.donhang.partials.cardXuLy',compact(['donhangs','nhanviengiaohangs']))
            ->with('error' ,'Bạn không đủ điều kiện để thực hiện quyền này! <br> Vui lòng liên hệ admin!');
    }

    public function xuathang($MaDH)
    {
        $donhang = DonHang::find($MaDH);
        $NVK = \auth()->user();
        $MaLND = $NVK->MaLND;
        if ($donhang && $MaLND == 4){
            $donhang->update(['MaTT'=>3,'MaNVK'=>$NVK->MaND]);
        }else{
            return redirect()->route('admin.404');
        }
        return redirect()->back();

    }

    public function giaohang($MaDH)
    {
        $donhang = DonHang::find($MaDH);
        $MaNVGH = \auth()->user()->MaND;
        $MaLND = NguoiDung::find($MaNVGH)->MaLND;
//        dd($MaLND);
        if ($donhang && $MaLND == 5){
            $donhang->update(['MaTT'=>4,'NgayGiao'=>date('y-m-d H:i:s')]);
        }else{
            return redirect()->route('admin.404');
        }
        return redirect()->back();
    }

    public function chiTietDonHang($code)
    {
        $donhanged = DonHang::find($code);
        $ctdonhangs = CTDonHang::where('MaDH','=',$donhanged->MaDH)->orderby('MaCTDH','desc')->get();
        $title = 'Chi tiết đơn hàng #'.$donhanged->MaDH;
        return view('admin.donhang.chitietcard',compact(['ctdonhangs','title','donhanged']));
    }
}
