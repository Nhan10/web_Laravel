@extends('front_end.layouts.master')
@section('content')
    {{--@include('front_end.layouts.sidebar')--}}
    <div class="container-fluid" style="margin-top: 1em">
        <div class="row justify-content-center">
            @if($carts->count()>0)
            <div class="col-md-9">
                <div class="card shadow mb-4">
                    @foreach($carts as $cart)
                        <div class="card-body row">
                            <div class="col-md-2">
                                <img id="imgShow" src="{{asset('storage/'.$cart->attributes->image)}}" width="300" alt="..." class="img-thumbnail">
                            </div>
                            <div class="col-md-6">
                                <h5>{{$cart->name}}</h5>
                                <p>- Tác giả: {{$cart->attributes->tacgia}}</p>
                                {{--<a href="javascript:document.getElementById('deletecart-form').submit()">--}}
                                    {{--<span class="glyphicon glyphicon-trash">Xóa</span>--}}
                                {{--</a>--}}
                                <form id="deletecart-form" action="{{ route('cart.destroy',$cart->id) }}" method="post" >
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="btn btn-light" style="color: red">Xóa</button>
                                </form>
                            </div>
                            <div class="col-md-2">{{number_format($cart->price)}}</div>
                            <div class="col-md-2">
                                <input type="number" name="quantity" class="form-control" value="{{$cart->quantity}}" style="width: 3em;">
                            </div>
                        </div>
                        <hr>
                    @endforeach
                        <div class="card-footer">
                            <a href="{{route('cart.empty')}}" class="btn btn-outline-primary" style="width: 200px;">Xóa giỏ hàng</a>
                            <a href="{{route('home.index')}}" class="btn btn-outline-primary" style="width: 200px;">Cập nhật giỏ hàng</a>
                        </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card shadow mb-4">
                    <div class="row justify-content-center">
                        <div class="col-md-11">
                            <p>Tạm tính: {{Cart::getSubTotal()}}</p>
                            <p>Thành tiền: {{Cart::getTotal()}}</p>
                            <hr>
                        </div>
                    </div>

                    <a href="{{route('cart.order')}}" class="btn btn-danger">Tiến hành đặt hàng</a>
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
