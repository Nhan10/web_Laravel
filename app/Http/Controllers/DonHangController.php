<?php

namespace App\Http\Controllers;

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
        $donhangs = DonHang::all();
        return view('admin.donhang.list',compact('donhangs'));
    }

    public function locTheoDieuKien(Request $request)
    {
        $key = $request->key;
        if ($key ==1)
        {
            $donhangs = DonHang::orderby('MaDH','desc')->get();

            if ($request->ajax()) {
                return view('admin.donhang.partials.card',compact('donhangs'))->render();
            }

            return view('admin.donhang.list',compact('donhangs'));
        }
        if ($key ==2)
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

    public function xuathang(Request $request, $MaDH)
    {
        $donhang = DonHang::find($MaDH);
        $MaNVK = $request->MaNVK;
        $nvkho = NguoiDung::find($MaNVK)->MaLND;
        if ($donhang && $nvkho == 4){
            $donhang->update(['MaTT'=>3,'MaNVK'=>$MaNVK]);
        }else{
            return '404';
        }
        return redirect()->back();

    }

    public function giaohang(Request $request, $MaDH)
    {
        $donhang = DonHang::find($MaDH);
        $MaNVGH = $request->MaNVGH;
        $nvgiaohang = NguoiDung::find($MaNVGH)->MaLND;
        if ($donhang && $nvgiaohang == 5){
            $donhang->update(['MaTT'=>4,'NgayGiao'=>date('y-m-d')]);
        }else{
            return '404';
        }
        return redirect()->back();
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\DonHang  $donHangs
     * @return \Illuminate\Http\Response
     */
    public function show(DonHang $donHangs)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\DonHang  $donHangs
     * @return \Illuminate\Http\Response
     */
    public function edit(DonHang $donHangs)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\DonHang  $donHangs
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, DonHang $donHangs)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\DonHang  $donHangs
     * @return \Illuminate\Http\Response
     */
    public function destroy(DonHang $donHangs)
    {
        //
    }
}
