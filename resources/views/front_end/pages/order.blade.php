@extends('front_end.layouts.master')
@section('content')

    <style>
        .TieuDe{
            font-weight: 700;
            font-size: 1em;
            color: #333;
            margin-bottom: 0;
        }
        .note{
            margin-top: 10px;
            color: #505050;
            font-size: 13px;
            text-align: left;
        }
    </style>
<form action="{{route('order.store')}}" method="post">
    @csrf
<div class="container-fluid mt-2">
    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header" style="background-color: #74c3de;margin: 0;padding: 0.4em">
                    <p class="TieuDe">Địa chỉ giao hàng</p>
                </div>
                <div class="card-body pb-0">
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
            <div class="card mt-3">
                <div class="card-header" style="background-color: #74c3de;margin: 0;padding: 0.4em">
                    <p class="TieuDe">Phương thức thanh toán</p>
                </div>
                <div class="card-body">
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="thanhtoan" id="thanhtoantm" value="thanhtoantm">
                        <label class="form-check-label" for="thanhtoantm">
                            Thanh toán tiền mặt khi nhận hàng
                        </label>
                    </div><div class="form-check">
                        <input class="form-check-input" type="radio" name="thanhtoan" id="thanhtoanpaypal" value="thanhtoanpaypal">
                        <label class="form-check-label" for="thanhtoanpaypal">
                            Thanh toán paypal
                        </label>
                    </div>
                </div>
            </div>
            <div class="col-md-12 p-0 mt-2">
                <button type="submit" class="btn btn-danger" style="width: 30%">ĐẶT MUA</button>
                <p class="note m-0 mt-1">(Xin vui lòng kiểm tra lại đơn hàng trước khi Đặt Mua)</p>
            </div>
        </div>
        <div class="col-md-4 pl-0">
            <div class="card">
                <div class="card-header" style="background-color: #74c3de;margin: 0;padding: 0.4em">
                    <p class="TieuDe">Đơn Hàng <span style="color: #000;font-weight: normal;font-size: 0.9em">({{$carts->count()}} sản phẩm)</span></p>
                </div>
                <div class="card-body m-0 p-0">
                    <div class="card-body row pt-0 pb-0">
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th>Tên sách</th>
                                <th>Số lượng</th>
                                <th>Thành tiền</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($carts as $cart)
                                <tr>
                                    <td>{{$cart->name}}</td>
                                    <td>X &nbsp;&nbsp;&nbsp;{{$cart->quantity}}</td>
                                    <td>{{$cart->getPriceSum()}}</td>
                                </tr>
                            @endforeach
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
                </div>
            </div>
        </div>
    </div>
</div>

</form>
@endsection