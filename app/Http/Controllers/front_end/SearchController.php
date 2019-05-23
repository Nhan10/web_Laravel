<?php

namespace App\Http\Controllers\front_end;

use App\DanhMucSP;
use App\LoaiSP;
use App\NhomSP;
use App\SanPham;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SearchController extends Controller
{
    public function getSanphamByDanhmuc($MaDM)
    {
        $nhomsps = NhomSP::all();

        $DanhMuced = DanhMucSP::find($MaDM);
        $nhomspOfDanhmucsp = NhomSP::where('MaDM',$MaDM)->get();
        $sanphamByDanhmuc = [];
        foreach ($nhomspOfDanhmucsp as $nhomsp)
        {
            if (count($nhomsp->loaisps)>0) {
                $loaispOfnhomsp = LoaiSP::where('MaNSP', $nhomsp->MaNSP)->get();
                $sanphamByDanhmuc[] = $nhomsp->getSanphamByNhom($loaispOfnhomsp);
            }
        }
        return view('front_end.pages.category',compact(['$nhomspOfDanhmucsp','nhomsps','DanhMuced','sanphamByDanhmuc']));
    }

    public function getSanphamTheoNhom($MaNSP)
    {
//        \Illuminate\Support\Facades\DB::enableQueryLog();
        $nhomsped = NhomSP::find($MaNSP);
//        dd(\Illuminate\Support\Facades\DB::getQueryLog());

        $nhomsps = NhomSP::all();
        $loaispOfnhomsp = LoaiSP::where('MaNSP',$MaNSP)->get();
        $sanphams = $nhomsped->getSanphamByNhom($loaispOfnhomsp);
        return view('front_end.pages.category',compact(['loaispOfnhomsp','nhomsps','nhomsped','sanphams']));
    }

    public function getSanphamTheoLoai($MaLoai)
    {
        $nhomsps = NhomSP::all();
        $loaisped = LoaiSP::find($MaLoai);
        $loaispOfnhomsp = LoaiSP::where('MaNSP',$loaisped->MaNSP)->get();
        $sanphams = [];
        $sanphams[] = $loaisped->sanPhams()->where('MaLoai',$loaisped->MaLoai)->get();
        return view('front_end.pages.category',compact(['loaispOfnhomsp','nhomsps','loaisped','sanphams']));
    }

}
