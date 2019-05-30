@extends('front_end.layouts.master')
@section('content')
    <style>
        .menu-nd{
            background-color: #f4f4f4;
        }
        .menu-nd ul {
            list-style-type: none;
            margin: 0;
            padding: 0;
            width: 100%;
            background-color: #f1f1f1;
        }

        .menu-nd ul li a {
            display: block;
            color: #333;
            padding-top: 10px;
            padding-bottom: 10px;
            padding-left: 0;
            text-decoration: none;
        }

        .menu-nd ul li a.active {
            background-color: #f4f4f4;
            color: #333;
        }

        .menu-nd ul li a:hover:not(.active) {
            background-color: #c6c9c9;
            color: #333;
        }
        .menu-nd ul li a i{
            font-size: 18px;
            height: auto;
            text-align: center;
            width: 40px;
            margin: auto;
            color: #999;
        }
        .profiles{
            background: 0 0;
            padding: 10px 5px 5px;
            background-color: #f1f1f1;
            border-bottom: 1px solid #ffffff;
        }
        .profiles .image{
            width: 45px;
            height: 45px;
            overflow: hidden;
            float: left;
            margin-right: 10px;
            margin-bottom: 0;
        }
        .profiles .image img{
            border-radius: 50%;
        }
        .profiles .name{
            font-size: 13px;
            margin-bottom: 4px;
            color: #242424;
            margin-top: 4px;
            font-family: Roboto;
            font-weight: 300;
        }
        .profiles h6{
            margin: 0;
            font-family: Roboto;
            font-size: 16px;
            font-weight: 400;
            font-style: normal;
            font-stretch: normal;
            color: #242424;
        }
        .content-right{
            background-color: #f1f1f1;
        }
        .have-margin{
            margin-bottom: 15px;
            font-family: Roboto;
            font-size: 19px;
            font-weight: 300;
            font-style: normal;
            font-stretch: normal;
            color: #242424;

        }

        .payment-2 h3,.address-1 h3{
            font-weight: 400;
            margin-top: 0;
            margin-bottom: 15px;
            font-family: Roboto;
            font-size: 13px;
            text-transform: uppercase;
            color: #242424;
        }
        .address-1 p, .payment-2 p{
            font-size: 13px;
            margin-top: 5px;
            margin-bottom: 0;
        }
        .address-1 .name{
            font-weight: 500;
            color: #242424;
            text-transform: uppercase;
            margin-bottom: 10px;
        }
    </style>
    <div class="row mt-2">
        @include('front_end.pages.partials.menukhachhang')
        <div class="col-md-9">
            <div class="content-right row  ml-0 p-0">
                <div class="container">
                    <div class="row">
                        <h1 class="have-margin col-md-6 mb-3 mt-3">Chi tiết đơn hàng #{{$donhanged->MaDH}} - {{$donhanged->trangThai->TenTT}}</h1>
                        <p class="date col-md-6" style="margin-top: 16px;text-align: right"><span>Ngày đặt hàng:  </span>{{date_format($donhanged->created_at, 'H:i d-m-Y')}}</p>
                    </div>
                </div>

                <div class="container">
                    <div class="row">
                        <div class="col-md-6 pr-1 address-1">
                            <h3>Địa chỉ người nhận</h3>
                            <div class="card p-2">
                                <p class="name mt-0">{{$donhanged->TenKH}}</p>
                                <p class="mt-0"><span>Địa chỉ: </span>{{$donhanged->DiaChi}}</p>
                                <p><span>Điện thoại: </span>{{$donhanged->SDT}}</p>
                            </div>
                        </div>
                        <div class="col-md-6 pl-1 payment-2">
                            <h3>Hình thức thanh toán</h3>
                            <div class="card p-2">
                                <p>Thanh toán tiền mặt khi nhận hàng</p>
                            </div>
                        </div>
                    </div>
                    <div class="card rounded my-3 p-4 ">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>Ảnh</th>
                                    <th>Sản phẩm</th>
                                    <th>Giá</th>
                                    <th>Số lượng</th>
                                    <th>Giảm giá</th>
                                    <th>Tạm tính</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($ctdonhangs as $ctdonhang)
                                    <tr>
                                        <td>
                                            <img src="{{asset('storage/'.$ctdonhang->sanPham->hinhAnhs[0]->DuongDan)}}" width="50" alt="{{$ctdonhang->sanPham->TenSP}}">
                                        </td>
                                        <td>
                                            <a href="{{route('home.detail',$ctdonhang->MaSP)}}">{{$ctdonhang->sanPham->TenSP}}</a>
                                        </td>
                                        <td>{{$ctdonhang->Gia}}&nbsp;₫</td>
                                        <td>{{$ctdonhang->SoLuong}}</td>
                                        <td>0 &nbsp;₫</td>
                                        <td>{{$ctdonhang->TongTienCT}}&nbsp;₫</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <table>
                            <tbody style="text-align: right;">
                            <!--Total Summary List-->
                            <tr>
                                <td colspan="4">
                                    <span>Tổng tạm tính</span>
                                </td>
                                <td>{{number_format($donhanged->TongTien)}}&nbsp;₫</td>
                            </tr>
                            <tr>
                                <td colspan="4">
                                    <span>Phí vận chuyển</span>
                                </td>
                                <td>0&nbsp;₫</td>
                            </tr>

                            <!--Final Total-->
                            <tr>
                                <td colspan="4"><span>Tổng cộng</span></td>
                                <td><span style="color: #ff3b27;font-size: 18px;">{{number_format($donhanged->TongTien)}}&nbsp;₫</span></td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <a href="{{route('nguoidung.qldh')}}" class="btn-simple pb-2 pl-2">&lt;&lt; Quay lại đơn hàng của tôi</a>
            </div>
        </div>
    </div>

@endsection