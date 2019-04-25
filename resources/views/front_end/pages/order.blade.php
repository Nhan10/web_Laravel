@extends('front_end.layouts.master')
@section('content')

<form action="{{route('order.store')}}" method="post">
    @csrf
<div class="container-fluid">
    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header" style="background-color: #74c3de;margin: 0;padding: 0.4em">
                    <p style="font-weight: bold;font-size: 1.3em">Địa chỉ giao hàng</p>
                </div>
                <div class="card-body">
                    <div class="form-row">
                        <div class="col-md-6">
                            <label for="ho">Họ</label>
                            <input type="text" class="form-control" name="ho" id="ho" required>
                        </div>
                        <div class="col-md-6">
                            <label for="ten">Tên</label>
                            <input type="text" class="form-control" name="ten" id="ten" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="diachi">Địa chỉ</label>
                        <input type="text" class="form-control" name="diachi" id="diachi" required>
                    </div>
                    <div class="form-group">
                        <label for="sdt">Số điện thoại</label>
                        <input type="text" class="form-control" name="sdt" id="sdt" required>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card">
                <div class="card-header" style="background-color: #74c3de;margin: 0;padding: 0.4em">
                    <p style="font-weight: bold;font-size: 1.3em">Phương thức thanh toán</p>
                </div>
                <div class="card-body">
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="" id="thanhtoantm" value="thanhtoantm" checked>
                        <label class="form-check-label" for="thanhtoantm">
                            Thanh toán tiền mặt khi nhận hàng
                        </label>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container-fluid" style="margin-top: 1em">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header" style="background-color: #74c3de;margin: 0;padding: 0.4em">
                    <p style="font-weight: bold;font-size: 1.3em">Kiểm tra lại đơn hàng</p>
                </div>
                <div class="card-body">
                    @foreach($carts as $cart)
                        <div class="card-body row">
                            <table class="table">
                                <thead>
                                <tr>
                                    <th scope="col">Hình ảnh</th>
                                    <th scope="col">Tên sách</th>
                                    <th scope="col">Số lượng</th>
                                    <th scope="col">Thành tiền</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td>
                                        <img id="imgShow" src="{{asset('storage/'.$cart->attributes->image)}}" width="60" alt="..." class="img-thumbnail">
                                    </td>
                                    <td>{{$cart->name}}</td>
                                    <td>{{$cart->quantity}}</td>
                                    <td>{{$cart->getPriceSum()}}</td>
                                </tr>
                                </tbody>
                            </table>
                            <table class="table">
                                <tr>
                                    <td>Thành tiền:</td>
                                    <td>{{number_format(Cart::getSubTotal())}}</td>
                                </tr>
                                <tr>
                                    <td>Tổng số tiền:</td>
                                    <td>
                                        {{number_format(Cart::getTotal())}}
                                    </td>
                                </tr>
                            </table>
                        </div>
                    @endforeach
                    <hr>
                        <button type="submit" class="btn btn-danger">Xác nhận đơn hàng</button>
                </div>
            </div>
        </div>
    </div>
</div>

</form>
@endsection