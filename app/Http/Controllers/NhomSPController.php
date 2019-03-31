<?php

namespace App\Http\Controllers;

use App\NhomSP;
use App\DanhMucSP;
use Illuminate\Http\Request;

class NhomSPController extends Controller
{
    public function __construct()
    {
        view()->composer(['admin.nhomsanpham.create','admin.nhomsanpham.edit'],function ($view){
            $danhmucs = DanhMucSP::all();
            $view->with('danhmucs',$danhmucs);
        });
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        $nhomsp = NhomSP::all();
        return view('admin.nhomsanpham.list',compact('nhomsp'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
//        $danhmucs = DanhMucSPs::all();
        return view('admin.nhomsanpham.create'/*,compact('danhmucs')*/);
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
            'tenNSP' => 'required|unique:nhomsp|max:155',
        ];
        $customMessages = [
            'tenNSP.required' => 'Bạn phải nhập tên nhóm sản phẩm!',
            'tenNSP.unique' => 'Tên nhóm sản phẩm không được trùng nhau!',
            'tenNSP.max' => 'Tên nhóm sản phẩm không được dài quá :max ký tự'
        ];
        $this->validate($request, $rules, $customMessages);
        $nhomsp = new NhomSP();
        $nhomsp->TenNSP = $request->tenNSP;
        $nhomsp->MaDM = $request->maDM;
        $nhomsp->save();
        return redirect()
            ->route('nhomsanpham.index')
            ->with('success','Tạo nhóm sản phẩm thành công!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\NhomSP  $nhomSPs
     * @return \Illuminate\Http\Response
     */
    public function show(NhomSP $nhomSPs)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\NhomSP  $nhomSPs
     * @return \Illuminate\Http\Response
     */
    public function edit($MaNSP)
    {
        $nhomsp = NhomSP::find($MaNSP);
//        $danhmucs = DanhMucSPs::all();
        return view('admin.nhomsanpham.edit',compact('nhomsp'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\NhomSP  $nhomSPs
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $MaNSP)
    {
        $rules = [
            'tenNSP' => 'required|unique:nhomsp|max:155',
        ];
        $customMessages = [
            'tenNSP.required' => 'Bạn phải nhập tên nhóm sản phẩm!',
            'tenNSP.unique' => 'Tên nhóm sản phẩm không được trùng nhau!',
            'tenNSP.max' => 'Tên nhóm sản phẩm không được dài quá :max ký tự'
        ];
        $this->validate($request, $rules, $customMessages);
        $nhomsp = NhomSP::find($MaNSP);
        $nhomsp->TenNSP = $request->tenNSP;
        $nhomsp->MaDM = $request->maDM;
        $nhomsp->save();
        return redirect()
            ->route('nhomsanpham.index')
            ->with('success','Sửa nhóm sản phẩm số '.$nhomsp->MaNSP.' thành công!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\NhomSP  $nhomSPs
     * @return \Illuminate\Http\Response
     */
    public function destroy($MaNSP)
    {
        $nhomsp = NhomSP::find($MaNSP);
        If(count($nhomsp->loaiSPs)>0){
            return redirect()
                ->route('nhomsanpham.index')
                ->with('error','Khổng thể xóa nhóm sản phẩm "'.$nhomsp->TenNSP.'"!');
        }
        $nhomsp->delete();
        return redirect()
            ->route('nhomsanpham.index')
            ->with('success','Xóa thành công nhóm sản phẩm "'.$nhomsp->TenNSP.'"!');
    }
}
