<?php

namespace App\Http\Controllers;

use App\SanPham;
use App\LoaiSP;
use App\TacGia;
use App\HinhAnh;
use Illuminate\Http\Request;

class SanPhamController extends Controller
{
    public function __construct()
    {
        view()->composer(['admin.sanpham.create','admin.sanpham.edit'],function ($view){
            $loaiSPs = LoaiSP::all();
            $tacGias = TacGia::all();
            $view->with('loaiSPs',$loaiSPs);
            $view->with('tacGias',$tacGias);
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
        return view('admin.sanpham.list',compact('sanphams'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.sanpham.create');
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
            'maLoai' => 'required|Numeric',
            'tenSP' => 'required|unique:sanpham|max:255',
            'gia' => 'required|Numeric',
            'maTG' => 'required|Numeric',
            'moTa' => 'required',
            'soTrang' => 'required|Numeric',
            'loaiBia' => 'required|max:155',
            'kichThuoc' => 'required',
            'canNang' => 'required|Numeric',
            'ngonNgu' => 'required|max:255',
            'nXB' => 'required|max:255',
            'namXB' => 'required|Numeric',
            'dichGia' => 'required|max:155',
        ];
        $customMessages = [
            'required' => 'Bạn phải nhập :attribute!',
            'unique' => ':attribute không được trùng nhau!',
            'max' => ':attribute không được dài quá :max ký tự !',
            'Numeric' => ':attribute bạn phải nhập số!',
        ];
        $customValidationAttributes = [
            'maLoai' => 'Mã loại',
            'tenSP' => 'Tên sản phẩm',
            'gia' => 'Giá',
            'maTG' => 'Mã tác giả',
            'moTa' => 'Mô tả',
            'soTrang' => 'Số trang',
            'loaiBia' => 'Loại bìa',
            'kichThuoc' => 'Kích thước',
            'canNang' => 'Cân nặng',
            'ngonNgu' => 'Ngôn ngữ',
            'nXB' => 'Nhà xuất bản',
            'namXB' => 'Năm xuất bản',
            'dichGia' => 'Dịch giả',
        ];
        $this->validate($request, $rules, $customMessages,$customValidationAttributes);

        $sanpham = new SanPham();
        $sanpham->MaLoai = $request->maLoai;
        $sanpham->TenSP = $request->tenSP;
        $sanpham->Gia = $request->gia;
        $sanpham->SoLuong = 0;
        $sanpham->MaTG = $request->maTG;
        $sanpham->MoTa = $request->moTa;
        $sanpham->SoTrang = $request->soTrang;
        $sanpham->LoaiBia = $request->loaiBia;
        $sanpham->KichThuoc = $request->kichThuoc;
        $sanpham->CanNang = $request->canNang;
        $sanpham->NgonNgu = $request->ngonNgu;
        $sanpham->NXB = $request->nXB;
        $sanpham->NamXB = $request->namXB;
        $sanpham->DichGia = $request->dichGia;
        $sanpham->save();
        if($request->file('file_upload')){
            foreach($request->file('file_upload') as $hinhanh){
                $duongdan=$hinhanh->store('images');
                $img= HinhAnh::create([
                    'DuongDan' =>$duongdan,
                    'MaSP' => $sanpham->MaSP
                ]);
            }
        }
        return redirect()
            ->route('sanpham.index')
            ->with('success','Tạo sản phẩm thành công');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\SanPham  $sanPhams
     * @return \Illuminate\Http\Response
     */
    public function show($MaSP)
    {
        $sanpham = SanPham::find($MaSP);
        return view('admin.sanpham.show',compact('sanpham'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\SanPham  $sanPhams
     * @return \Illuminate\Http\Response
     */
    public function edit($MaSP)
    {
        $sanpham = SanPham::find($MaSP);
        return view('admin.sanpham.edit',compact('sanpham'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\SanPham  $sanPhams
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $MaSP)
    {
        $rules = [
            'maLoai' => 'required|Numeric',
            'tenSP' => 'required|unique:sanpham|max:255',
            'gia' => 'required|Numeric',
            'maTG' => 'required|Numeric',
            'moTa' => 'required',
            'soTrang' => 'required|Numeric',
            'loaiBia' => 'required|max:155',
            'kichThuoc' => 'required',
            'canNang' => 'required|Numeric',
            'ngonNgu' => 'required|max:255',
            'nXB' => 'required|max:255',
            'namXB' => 'required|Numeric',
            'dichGia' => 'required|max:155',
        ];
        $customMessages = [
            'required' => 'Bạn phải nhập :attribute!',
            'unique' => ':attribute không được trùng nhau!',
            'max' => ':attribute không được dài quá :max ký tự !',
            'Numeric' => ':attribute bạn phải nhập số!',
        ];
        $customValidationAttributes = [
            'maLoai' => 'Mã loại',
            'tenSP' => 'Tên sản phẩm',
            'gia' => 'Giá',
            'maTG' => 'Mã tác giả',
            'moTa' => 'Mô tả',
            'soTrang' => 'Số trang',
            'loaiBia' => 'Loại bìa',
            'kichThuoc' => 'Kích thước',
            'canNang' => 'Cân nặng',
            'ngonNgu' => 'Ngôn ngữ',
            'nXB' => 'Nhà xuất bản',
            'namXB' => 'Năm xuất bản',
            'dichGia' => 'Dịch giả',
        ];
        $this->validate($request, $rules, $customMessages,$customValidationAttributes);

        $sanpham = SanPham::find($MaSP);
        $sanpham->MaLoai = $request->maLoai;
        $sanpham->TenSP = $request->tenSP;
        $sanpham->Gia = $request->gia;
//        $sanpham->SoLuong = 0;
        $sanpham->MaTG = $request->maTG;
        $sanpham->MoTa = $request->moTa;
        $sanpham->SoTrang = $request->soTrang;
        $sanpham->LoaiBia = $request->loaiBia;
        $sanpham->KichThuoc = $request->kichThuoc;
        $sanpham->CanNang = $request->canNang;
        $sanpham->NgonNgu = $request->ngonNgu;
        $sanpham->NXB = $request->nXB;
        $sanpham->NamXB = $request->namXB;
        $sanpham->DichGia = $request->dichGia;
        $sanpham->save();
        if($request->file('file_upload')){
            foreach($request->file('file_upload') as $hinhanh){
                $duongdan=$hinhanh->store('images');
                $img= HinhAnh::create([
                    'DuongDan' =>$duongdan,
                    'MaSP' => $sanpham->MaSP
                ]);
            }
        }
        return redirect()
            ->route('sanpham.index')
            ->with('success','Sửa sản phẩm "'.$sanpham->TenSP.'" thành công');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\SanPham  $sanPhams
     * @return \Illuminate\Http\Response
     */
    public function destroy($MaSP)
    {
        $sanpham = SanPham::find($MaSP);
        if(count($sanpham->cTPhieuNhaps)>0 || count($sanpham->cTDonHangs)>0 || count($sanpham->binhLuans)>0){
            return redirect()
                ->route('sanpham.index')
                ->with('error','Khổng thể xóa sản phẩm "'.$sanpham->TenSP.'"!');
        }
        $sanpham->delete();
        return redirect()
            ->route('sanpham.index')
            ->with('success','Xóa thành công sản phẩm "'.$sanpham->TenSP.'"!');
    }
}
