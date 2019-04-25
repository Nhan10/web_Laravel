<?php

namespace App\Http\Controllers\front_end;

use App\NhomSP;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\SanPham;
use App\LoaiSP;

class HomeController extends Controller
{
    public function Home(){
        $sanphams = SanPham::all();
        $loaisps = LoaiSP::take(5)->get();
        $nhomsps = NhomSP::take(5)->get();
        return view('front_end.pages.home',compact(['sanphams','loaisps','nhomsps']));
    }

    public function detailSanPham($MaSP){
        $sanpham = SanPham::find($MaSP);
        return view('front_end.pages.detail',compact('sanpham'));
    }

    public function error404(){
        return view('front_end.pages.404');
    }
}
