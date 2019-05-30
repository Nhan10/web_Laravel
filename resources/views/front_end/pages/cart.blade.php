@extends('front_end.layouts.master')
@section('content')
    <style>
        .product_name{
            color: #333;
        }
        .product_name:hover{
            color: #333;
        }
        .product_price{
            font-size: 16px;
            margin-bottom: 5px;
            font-weight: 500;
            padding-top: 0;
            color: #333;
            text-align: right;
        }
        .lbl-shopping-cart{
            color: #333;
            font-size: 18px;
            text-transform: uppercase;
            font-weight: 400;
            margin-bottom: 12px;
        }
        .lbl-shopping-cart span{
            font-size: 14px;
            text-transform: none;
            font-weight: 300;
            color: #333;
        }
        .banner{
             margin: 0;
             padding: 0;
             width: 100%;
         }
        .banner img{
            margin: 0.4em 0;
            padding: 0;
            width: 100%;
        }
    </style>
    {{--@include('front_end.layouts.sidebar')--}}
    <div class="container-fluid" style="margin-top: 1em">
        <div class="row justify-content-center">
            @if($carts->count()>0)
                <div class="col-md-12">
                    <h5 class="lbl-shopping-cart">Giỏ hàng <span>({{$carts->count()}} sản phẩm)</span></h5>
                </div>
            <div class="col-md-9">
                <div class="card">
                    @foreach($carts as $cart)
                        <div class="card-body row">
                            <div class="col-md-2">
                                <img id="imgShow" src="{{asset('storage/'.$cart->attributes->image)}}" width="100" alt="..." class="img-thumbnail">
                            </div>
                            <div class="col-md-6 pl-0">
                                <h5><a href="{{route('home.detail',$cart->id)}}" class="text-decoration-none product_name">{{$cart->name}}</a></h5>
                                <p style="color: #777" class="mb-3">- Tác giả: {{$cart->attributes->tacgia}}</p>
                                {{--<a href="javascript:document.getElementById('deletecart-form').submit()">--}}
                                    {{--<span class="glyphicon glyphicon-trash">Xóa</span>--}}
                                {{--</a>--}}
                                <form id="deletecart-form" action="{{ route('cart.destroy',$cart->id) }}" method="post" >
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="btn btn-outline-light" style="color: red">Xóa</button>
                                </form>
                            </div>
                            <div class="col-md-2 p-0 product_price">{{number_format($cart->price) }} đ</div>
                            <div class="col-md-2 pr-0">
                                <input type="number" name="quantity" class="form-control" value="{{$cart->quantity}}" style="width: 5em;text-align: center">
                            </div>
                        </div>
                        <hr>
                    @endforeach
                        <div class="row">
                            <div class="col-md-12" style="margin: 0 0 0.5em 0.5em">
                                <a href="{{route('cart.empty')}}" class="btn btn-danger" style="color: #fff">Xóa giỏ hàng</a>
                                <a href="{{route('home.index')}}" class="btn btn-success" style="">Cập nhật giỏ hàng</a>
                            </div>
                        </div>
                </div>
            </div>
            <div class="col-md-3" style="padding-left: 0 ">
                <div class="container-fluid">
                    <div class="card row">
                        <div class="p-3">
                            <p class="m-0">Tạm tính: {{Cart::getSubTotal()}}</p>
                        </div>
                        <hr class="m-0">
                        <div class="p-3">
                            <p class="m-0">Thành tiền: {{Cart::getTotal()}}</p>
                        </div>
                    </div>
                    <div class="row">
                        <a href="{{route('cart.order')}}" class="btn btn-danger mt-2 col-md-12">Tiến hành đặt hàng</a>
                    </div>
                </div>
                <div class="container-fluid">
                    <div class="row">
                        <div class="banner">
                            <img src="{{asset('image/slide1.png')}}" alt="">
                        </div>
                    </div>
                </div>
            </div>
            @else
                <div class="col-md-8" style="margin-bottom: 22em;margin-top: 1em">
                    <h3>Giỏ hàng trống</h3>
                    <p>Chưa có sản phẩm trong giỏ hàng của bạn.</p>
                    <p>Click <a href="{{route('home.index')}}">vào đây</a> để quay lại trang chủ.</p>
                </div>
            @endif
        </div>
    </div>
@endsection
