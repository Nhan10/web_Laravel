<?php

namespace App\Http\Controllers\front_end;

use App\NhomSP;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\SanPham;
use App\LoaiSP;

class HomeController extends Controller
{
    public function Home()
    {
        $sanphamnb = SanPham::orderby('created_at','desc')->take(6)->get();
        $nhomsps = NhomSP::orderby('created_at','desc')->take(2)->get();
        $sanphamOfnhom = array();
        foreach ($nhomsps as $nhomsp) {
            if (count($nhomsp->loaiSPs) > 0){
                $sanphamOfnhom[] = $nhomsp->sanPhams()->take(6)->get();
            }
        }
        return view('front_end.pages.home',compact(['sanphamnb','sanphamOfnhom']));
    }

    public function detailSanPham($MaSP)
    {
        $sanpham = SanPham::find($MaSP);
        return view('front_end.pages.detail',compact('sanpham'));
    }

    public function error404()
    {
        return view('front_end.pages.404');
    }

    public function getCategory()
    {
//        $loaisps = LoaiSP::take(5)->get();
//        $nhomsps = NhomSP::take(5)->get();
        return view('front_end.pages.category');
    }
}
