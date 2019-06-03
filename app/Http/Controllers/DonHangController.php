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
        $users = \auth()->user();
        if ($key ==1 && ($users->MaLND == 2 || $users->MaLND == 3))
        {
            $donhangs = DonHang::orderby('MaDH','desc')->get();

            if ($request->ajax()) {
                return view('admin.donhang.partials.card',compact('donhangs'))->render();
            }

            return view('admin.donhang.partials.card',compact('donhangs'))->render();
        }
        if ($key ==2 && ($users->MaLND == 2 || $users->MaLND == 3))
        {
            $donhangs = DonHang::where('MaTT',1)->orderby('MaDH','desc')->get();
            $nhanviengiaohangs = NguoiDung::where('MaLND',5)->get();

            if ($request->ajax()) {
                return view('admin.donhang.partials.cardXuly',compact(['donhangs','nhanviengiaohangs']))->render();
            }

            return view('admin.donhang.list',compact('donhangs'));
        }
        if ($key ==3)
        {
            $donhangs = DonHang::where('MaTT',2)->orderby('MaDH','desc')->get();

            if ($request->ajax()) {
                return view('admin.donhang.partials.cardDaxuly',compact('donhangs'))->render();
            }

            return view('admin.donhang.list',compact('donhangs'));
        }
        if ($key ==4)
        {
            $nvgiaohang = NguoiDung::find(\auth()->user()->MaND)->MaLND;
            if ($nvgiaohang == 5) {
                $donhangs = DonHang::where('MaTT', 3)->Where('MaNVGH', \auth()->user()->MaND)->orderby('MaDH', 'desc')->get();
            }else{
                $donhangs = DonHang::where('MaTT', 3)->orderby('MaDH', 'desc')->get();
                return view('admin.donhang.partials.card',compact('donhangs'))->render();
            }
            if ($request->ajax()) {
                return view('admin.donhang.partials.cardDanggiao',compact('donhangs'))->render();
            }

            return view('admin.donhang.list',compact('donhangs'));
        }
        if ($key ==5)
        {
            $donhangs = DonHang::where('MaTT',4)->orderby('MaDH','desc')->get();

            if ($request->ajax()) {
                return view('admin.donhang.partials.card',compact('donhangs'))->render();
            }

            return view('admin.donhang.list',compact('donhangs'));
        }
        return view('admin.donhang.partials.forbidden')->render();
    }

    public function xulydonhang(Request $request, $MaDH)
    {
        $MaNVGH = $request->nhanviengh;

        $donhang = DonHang::find($MaDH);

        $MaNN = $request->MaNguoiNhap;
        $nguoinhap = NguoiDung::find($MaNN);
        $Quyen = $nguoinhap->loaind->MaLND;
        if ($donhang && $Quyen == 2)
        {
            $donhang->update(['MaNVGH'=>$MaNVGH,'MaQTV'=>$MaNN,'MaQL'=>null,'MaTT'=>2]);
        }
        if ($donhang && $Quyen == 3)
        {
            $donhang->update(['MaNVGH'=>$MaNVGH,'MaQL'=>$MaNN,'MaQTV'=>null,'MaTT'=>2]);
        }
        return redirect()->back();
    }

    public function xuathang($MaDH)
    {
        $donhang = DonHang::find($MaDH);
        $NVK = \auth()->user();
        $MaLND = $NVK->MaLND;
        if ($donhang && $MaLND == 4){
            $donhang->update(['MaTT'=>3,'MaNVK'=>$NVK->MaND]);
        }else{
            redirect()->route('admin.404');
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
