<?php

namespace App\Http\Controllers\front_end;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Cart;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $carts = Cart::getContent();
        return view('front_end.pages.cart',compact('carts'));
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
//        if (Auth::check()){
//            $MaND = Auth::user()->MaND;
//
//            $id = $request->id;
//            $name = $request->name;
//            $price = $request->price;
//            $quantity = $request->quantity;
//            $attributes = array(
//                'image' => $request->image,
//                'tacgia' => $request->tacgia,
//
//            );
//
//            $carts = \Cart::session($MaND)->add($id, $name, $price, $quantity, $attributes);
//            return redirect()->route('home.sanpham');
//        }else{
            $carts = Cart::add([
                'id' => $request->id,
                'name' => $request->name,
                'price' => $request->price,
                'quantity' => $request->quantity,
                'attributes' => array(
                    'image' => $request->image,
                    'tacgia' => $request->tacgia,
                )
            ]);
//        }

        return redirect()->back();
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
        Cart::remove($id);
        return redirect()->route('cart.index');
    }

    public function emptyCarts(){
        Cart::clear();
        return redirect()->route('home.index');
    }

    public function order(){
        if (!(Auth::check() && (count(Cart::getContent())))>0){
            return redirect()->route('login');
        }
        else{
            return redirect()->route('order.index');
        }
    }
}
