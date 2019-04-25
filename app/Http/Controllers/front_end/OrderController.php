<?php

namespace App\Http\Controllers\front_end;

use App\SanPham;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Cart;
use App\DonHang;
use App\CTDonHang;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $carts = Cart::getContent();
        return view('front_end.pages.order',compact('carts'));
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
        $donhang = new DonHang();
        $donhang->MaND = Auth::user()->MaND;
        $donhang->TongTien = Cart::getTotal();
        $donhang->TenKH = $request->ho." ".$request->ten;
        $donhang->DiaChi = $request->diachi;
        $donhang->SDT = $request->sdt;
        $donhang->MaTT = 1;
        $donhang->NgayDat = date('y-m-d');
        $donhang->save();
        $cart = Cart::getContent();
        foreach($cart as $item){
            $ctdonhang = new CTDonHang();
            $ctdonhang->MaDH = $donhang->MaDH;
            $ctdonhang->MaSP = $item->id;
            $ctdonhang->SoLuong = $item->quantity;
            $ctdonhang->Gia = $item->price;
            $ctdonhang->TongTienCT = $item->price * $item->quantity;
            $ctdonhang->save();
            $sanpham = SanPham::find($item->id);
            if ($sanpham->SoLuong < $item->quantity) {
                $donhang->delete();
                return redirect()->route('cart.index')->with('status', 'Ordering fail. '.$sanpham->TenSP.' not enough quantity' );
            }
        }
        foreach($cart as $item){
            $sanpham = SanPham::find($item->id);
            $sanpham->SoLuong=$sanpham->SoLuong-$item->quantity;
            $sanpham->save();
        }
        Cart::clear();
        return redirect()->route('cart.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
