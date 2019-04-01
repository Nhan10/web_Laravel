<?php

namespace App\Http\Controllers;

use App\NhaCungCap;
use Illuminate\Http\Request;

class NhaCungCapController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $nhacungcaps = NhaCungCap::all();
        return view('admin.nhacungcap.list',compact('nhacungcaps'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.nhacungcap.create');
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
            'tenNCC' => 'required|unique:nhacungcap|max:155',
            'diaChi' => 'required|max:155',
            'sDT' => 'required|max:15',
        ];
        $customMessages = [
            'tenNCC.required' => 'Bạn phải nhập tên nhà cung cấp!',
            'tenNCC.unique' => 'Tên nhà cung cấp không được trùng nhau!',
            'tenNCC.max' => 'Tên nhà cung cấp không được dài quá :max ký tự',

            'diaChi.required' => 'Bạn phải nhập địa chỉ!',
            'diaChi.max' => 'Địa chỉ không được dài quá :max ký tự',

            'sDT.required' => 'Bạn phải nhập số điện thoại!',
            'sDT.max' => 'Số điện thoại không được dài quá :max ký tự'
        ];
        $this->validate($request, $rules, $customMessages);
        $nhacungcap = new NhaCungCap();
        $nhacungcap->TenNCC = $request->tenNCC;
        $nhacungcap->DiaChi = $request->diaChi;
        $nhacungcap->SDT = $request->sDT;
        $nhacungcap->save();
        return redirect()
            ->route('nhacungcap.index')
            ->with('success','Thêm nhà cung cấp thành công');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\NhaCungCap  $nhaCungCaps
     * @return \Illuminate\Http\Response
     */
    public function show(NhaCungCap $nhaCungCaps)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\NhaCungCap  $nhaCungCaps
     * @return \Illuminate\Http\Response
     */
    public function edit($MaNCC)
    {
        $nhacungcap = NhaCungCap::find($MaNCC);
        return view('admin.nhacungcap.edit',compact('nhacungcap'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\NhaCungCap  $nhaCungCaps
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $MaNCC)
    {
        $rules = [
            'tenNCC' => 'required|unique:nhacungcap|max:155',
            'diaChi' => 'required|max:155',
            'sDT' => 'required|max:15',
        ];
        $customMessages = [
            'tenNCC.required' => 'Bạn phải nhập tên nhà cung cấp!',
            'tenNCC.unique' => 'Tên nhà cung cấp không được trùng nhau!',
            'tenNCC.max' => 'Tên nhà cung cấp không được dài quá :max ký tự',

            'diaChi.required' => 'Bạn phải nhập địa chỉ!',
            'diaChi.max' => 'Địa chỉ không được dài quá :max ký tự',

            'sDT.required' => 'Bạn phải nhập số điện thoại!',
            'sDT.max' => 'Số điện thoại không được dài quá :max ký tự'
        ];
        $this->validate($request, $rules, $customMessages);
        $nhacungcap = NhaCungCap::find($MaNCC);
        $nhacungcap->TenNCC = $request->tenNCC;
        $nhacungcap->DiaChi = $request->diaChi;
        $nhacungcap->SDT = $request->sDT;
        $nhacungcap->save();
        return redirect()
            ->route('nhacungcap.index')
            ->with('success','Bạn đã sửa thành công danh mục số '.$nhacungcap->MaNCC.'!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\NhaCungCap  $nhaCungCaps
     * @return \Illuminate\Http\Response
     */
    public function destroy($MaNCC)
    {
        $nhacungcap = NhaCungCap::find($MaNCC);
        If(count($nhacungcap->phieuNhaps)>0){
            return redirect()
                ->route('nhacungcap.index')
                ->with('error','Khổng thể xóa nhà cung cấp "'.$nhacungcap->TenNCC.'"!');
        }
        $nhacungcap->delete();
        return redirect()
            ->route('nhacungcap.index')
            ->with('success','Xóa thành công nhà cung cấp "'.$nhacungcap->TenNCC.'"!');
    }
}
