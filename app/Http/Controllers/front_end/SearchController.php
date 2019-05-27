<?php

namespace App\Http\Controllers\front_end;

use App\DanhMucSP;
use App\LoaiSP;
use App\NhomSP;
use App\SanPham;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class SearchController extends Controller
{
    public function getSanphamByDanhmuc($MaDM)
    {
        $DanhMuced = DanhMucSP::find($MaDM);

        $nhomspOfDanhmucsp = $DanhMuced->nhomSPs()->get();
        $sanphamss = array();
//        $nhomsp = new NhomSP();
//        $sanphamByDanhmuc[] = $nhomsp->getSanphamByNhom($nhomspOfDanhmucsp);
        foreach ($nhomspOfDanhmucsp as $nhom) {
            if (count($nhom->sanPhams) > 0) {
                $sanphamss[] = $nhom->sanPhams()->get();
            }
        }
        return view('front_end.pages.category',
            compact(['nhomspOfDanhmucsp','DanhMuced','sanphamss']));
    }

    public function getSanphamTheoNhom($MaNSP)
    {
//        \Illuminate\Support\Facades\DB::enableQueryLog();
        $nhomsped = NhomSP::find($MaNSP);
//        dd(\Illuminate\Support\Facades\DB::getQueryLog());
        $nhomspOfDanhmucsp = NhomSP::where('MaDM',$nhomsped->MaDM)->get();
        $loaispOfnhomsp = $nhomsped->loaiSPs()->get();

        $sanphams = $nhomsped->sanPhams()->get();


        return view('front_end.pages.category',
            compact(['nhomspOfDanhmucsp','loaispOfnhomsp','nhomsped','sanphams']));
    }

    public function getSanphamTheoLoai($MaLoai,$MaNSP)
    {
        $loaisped = LoaiSP::find($MaLoai);
        $nhomsped = NhomSP::find($MaNSP);
        $loaispOfnhomsp = $nhomsped->loaiSPs()->get();
        $nhomspOfDanhmucsp = NhomSP::where('MaDM',$nhomsped->MaDM)->get();
        $sanphams = $loaisped->sanPhams()->get();
        return view('front_end.pages.category',
            compact(['nhomspOfDanhmucsp','loaispOfnhomsp','loaisped','sanphams']));
    }

    public function searchSanphamByloai(Request $request)
    {
        $key = $request->key;
        $timtheo = $request->timtheo;
        $MaLoai = $request->loai;
        if($MaLoai && $timtheo==1){
            $loaisped = LoaiSP::find($MaLoai);
            $nhomsped = NhomSP::find($loaisped->MaNSP);
            $loaispOfnhomsp = $nhomsped->loaiSPs()->get();
            $nhomspOfDanhmucsp = NhomSP::where('MaDM',$nhomsped->MaDM)->get();
            $sanphams = $loaisped->sanPhams()
                                    ->orderby('created_at','desc')->get();
            return view('front_end.pages.category',
                compact(['nhomspOfDanhmucsp','loaispOfnhomsp','loaisped','sanphams']));
        }
        if($MaLoai && $timtheo==2){
            $loaisped = LoaiSP::find($MaLoai);
            $nhomsped = NhomSP::find($loaisped->MaNSP);
            $loaispOfnhomsp = $nhomsped->loaiSPs()->get();
            $nhomspOfDanhmucsp = NhomSP::where('MaDM',$nhomsped->MaDM)->get();
            $sanphams = $loaisped->sanPhams()
                                    ->orderby('Gia','asc')->get();
            return view('front_end.pages.category',
                compact(['nhomspOfDanhmucsp','loaispOfnhomsp','loaisped','sanphams']));
        }
        if($MaLoai && $timtheo==3){
            $loaisped = LoaiSP::find($MaLoai);
            $nhomsped = NhomSP::find($loaisped->MaNSP);
            $loaispOfnhomsp = $nhomsped->loaiSPs()->get();
            $nhomspOfDanhmucsp = NhomSP::where('MaDM',$nhomsped->MaDM)->get();
            $sanphams = $loaisped->sanPhams()
                            ->orderby('Gia','desc')->get();
            return view('front_end.pages.category',
                compact(['nhomspOfDanhmucsp','loaispOfnhomsp','loaisped','sanphams']));
        }
        if($key && $MaLoai && $timtheo==4){
            $loaisped = LoaiSP::find($MaLoai);
            $nhomsped = NhomSP::find($loaisped->MaNSP);
            $loaispOfnhomsp = $nhomsped->loaiSPs()->get();
            $nhomspOfDanhmucsp = NhomSP::where('MaDM',$nhomsped->MaDM)->get();
            $sanphams = $loaisped->sanPhams()
                                ->where('TenSP','like','%'.$key.'%')
                                ->where('SoLuong','>',0)
                                ->orderby('MaSP','desc')->get();
            return view('front_end.pages.category',
                compact(['key','nhomspOfDanhmucsp','loaispOfnhomsp','loaisped','sanphams']));
        }
    }

    /*test*/
    public function searchSanphamByNhom(Request $request)
    {
        $key = $request->key;
        $timtheo = $request->timtheo;
        $MaNhom = $request->nhom;
        if($MaNhom && $timtheo==1){
            $nhomsped = NhomSP::find($MaNhom);
            $nhomspOfDanhmucsp = NhomSP::where('MaDM',$nhomsped->MaDM)->get();
            $loaispOfnhomsp = $nhomsped->loaiSPs()->get();
            $sanphams = $nhomsped->sanPhams()
                ->orderby('created_at','desc')->get();
            return view('front_end.pages.category',
                compact(['nhomspOfDanhmucsp','loaispOfnhomsp','nhomsped','sanphams']));
        }
        if($MaNhom && $timtheo==2){
            $nhomsped = NhomSP::find($MaNhom);
            $nhomspOfDanhmucsp = NhomSP::where('MaDM',$nhomsped->MaDM)->get();
            $loaispOfnhomsp = $nhomsped->loaiSPs()->get();
            $sanphams = $nhomsped->sanPhams()
                ->orderby('Gia','asc')->get();
            return view('front_end.pages.category',
                compact(['nhomspOfDanhmucsp','loaispOfnhomsp','nhomsped','sanphams']));
        }
        if($MaNhom && $timtheo==3){
            $nhomsped = NhomSP::find($MaNhom);
            $nhomspOfDanhmucsp = NhomSP::where('MaDM',$nhomsped->MaDM)->get();
            $loaispOfnhomsp = $nhomsped->loaiSPs()->get();
            $sanphams = $nhomsped->sanPhams()
                ->orderby('Gia','desc')->get();
            return view('front_end.pages.category',
                compact(['nhomspOfDanhmucsp','loaispOfnhomsp','nhomsped','sanphams']));
        }
        if($key && $MaNhom && $timtheo==4){
            $nhomsped = NhomSP::find($MaNhom);
            $nhomspOfDanhmucsp = NhomSP::where('MaDM',$nhomsped->MaDM)->get();
            $loaispOfnhomsp = $nhomsped->loaiSPs()->get();
            $sanphams = $nhomsped->sanPhams()
                ->where('TenSP','like','%'.$key.'%')
                ->where('SoLuong','>',0)
                ->orderby('MaSP','desc')->get();
            return view('front_end.pages.category',
                compact(['key','nhomspOfDanhmucsp','loaispOfnhomsp','nhomsped','sanphams']));
        }
    }

}
