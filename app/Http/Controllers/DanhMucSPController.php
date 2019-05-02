<?php

namespace App\Http\Controllers;

use App\DanhMucSP;
use Illuminate\Http\Request;

class DanhMucSPController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $danhmucs = DanhMucSP::all();
        return view('admin.danhmuc.list',compact('danhmucs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.danhmuc.create');
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
            'tenDM' => 'required|unique:danhmucsp|max:155',
        ];
        $customMessages = [
            'required' => 'Bạn phải nhập :attribute !',
            'unique' => ':attribute không được trùng nhau!',
            'max' => ':attribute không được dài quá :max ký tự'
        ];
        $customValidationAttributes = [
            'tenDM' => 'Tên danh mục'
        ];
        $this->validate($request, $rules, $customMessages,$customValidationAttributes);
        $danhmuc = new DanhMucSP();
        $danhmuc->TenDM = $request->tenDM;
        $danhmuc->save();
        return redirect()
            ->route('danhmuc.index')
            ->with('success','Thêm mới danh mục thành công!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\DanhMucSP  $danhMucSPs
     * @return \Illuminate\Http\Response
     */
    public function show(DanhMucSP $danhMucSPs)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\DanhMucSP  $danhMucSPs
     * @return \Illuminate\Http\Response
     */
    public function edit($MaDM)
    {
        $danhmuc = DanhMucSP::find($MaDM);
        return view('admin.danhmuc.edit',compact('danhmuc'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\DanhMucSP  $danhMucSPs
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $rules = [
            'tenDM' => 'required|unique:danhmucsp|max:155',
        ];
        $customMessages = [
            'required' => 'Bạn phải nhập :attribute !',
            'unique' => ':attribute không được trùng nhau!',
            'max' => ':attribute không được dài quá :max ký tự'
        ];
        $customValidationAttributes = [
            'tenDM' => 'Tên danh mục'
        ];
        $this->validate($request, $rules, $customMessages,$customValidationAttributes);
        $danhmuc = DanhMucSP::find($request->MaDM);
        $danhmuc->TenDM = $request->tenDM;
        $danhmuc->save();
        return redirect()
            ->route('danhmuc.index')
            ->with('success','Bạn đã sửa thành công danh mục số '.$danhmuc->MaDM.'!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\DanhMucSP  $danhMucSPs
     * @return \Illuminate\Http\Response
     */
    public function destroy($MaDM)
    {
        $danhmuc = DanhMucSP::find($MaDM);
        if(count($danhmuc->nhomsps)>0){
            return redirect()
                ->route('danhmuc.index')
                ->with('error','Khổng thể xóa danh mục "'.$danhmuc->TenDM.'"!');
        }
        $danhmuc->delete();
        return redirect()
            ->route('danhmuc.index')
            ->with('success','Xóa thành công '.$danhmuc->TenDM.'!');
    }
}
