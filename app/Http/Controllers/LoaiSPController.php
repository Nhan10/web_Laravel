<?php

namespace App\Http\Controllers;

use App\LoaiSP;
use App\NhomSP;
use Illuminate\Http\Request;

class LoaiSPController extends Controller
{
    public function __construct()
    {
        view()->composer(['admin.loaisanpham.create','admin.loaisanpham.edit'],function ($view){
            $nhomsps = NhomSP::all();
            $view->with('nhomsps',$nhomsps);
        });
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $loaisps = LoaiSP::all();
        return view('admin.loaisanpham.list',compact('loaisps'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.loaisanpham.create');
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
            'tenLoai' => 'required|unique:loaisp|max:155',
        ];
        $customMessages = [
            'tenLoai.required' => 'Bạn phải nhập tên loại sản phẩm!',
            'tenLoai.unique' => 'Tên loại sản phẩm không được trùng nhau!',
            'tenLoai.max' => 'Tên loại sản phẩm không được dài quá :max ký tự'
        ];
        $this->validate($request, $rules, $customMessages);
        $loaisp = new LoaiSP();
        $loaisp->TenLoai = $request->tenLoai;
        $loaisp->MaNSP = $request->maNSP;
        $loaisp->save();
        return redirect()
            ->route('loaisanpham.index')
            ->with('success','Tạo loại sản phẩm thành công!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\LoaiSP  $loaiSPs
     * @return \Illuminate\Http\Response
     */
    public function show(LoaiSP $loaiSPs)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\LoaiSP  $loaiSPs
     * @return \Illuminate\Http\Response
     */
    public function edit($MaLoai)
    {
        $loaisp = LoaiSP::find($MaLoai);
        return view('admin.loaisanpham.edit',compact('loaisp'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\LoaiSP  $loaiSPs
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $MaLoai)
    {
        $rules = [
            'tenLoai' => 'required|unique:loaisp|max:155',
        ];
        $customMessages = [
            'tenLoai.required' => 'Bạn phải nhập tên loại sản phẩm!',
            'tenLoai.unique' => 'Tên loại sản phẩm không được trùng nhau!',
            'tenLoai.max' => 'Tên loại sản phẩm không được dài quá :max ký tự'
        ];
        $this->validate($request, $rules, $customMessages);
        $loaisp = LoaiSP::find($MaLoai);
        $loaisp->TenLoai = $request->tenLoai;
        $loaisp->MaNSP = $request->maNSP;
        $loaisp->save();
        return redirect()
            ->route('loaisanpham.index')
            ->with('success','Sửa loại sản phẩm "'.$loaisp->TenLoai.'" thành công!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\LoaiSP  $loaiSPs
     * @return \Illuminate\Http\Response
     */
    public function destroy($MaLoai)
    {
        $loaiSP = LoaiSP::find($MaLoai);
        if (count($loaiSP->sanPhams)>0){
            return redirect()
                ->route('loaisanpham.index')
                ->with('error','Không thể xóa loại sản phẩm "'.$loaiSP->TenLoai.'"!');
        }
        $loaiSP->delete();
        return redirect()
            ->route('loaisanpham.index')
            ->with('success','Xóa loại sản phẩm "'.$loaiSP->TenLoai.'" thành công!');
    }
}
