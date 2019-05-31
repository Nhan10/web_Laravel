@extends('front_end.layouts.master')
@section('content')
    @include('front_end.layouts.sidebar')

    <style>
        .card-home{
            margin-bottom: 1em;
        }
        .profile h1{
            font-weight: normal;
            font-size: 20px;
            margin:10px 0 0 0;
        }
        .profile h2{
            font-size: 14px;
            font-weight: lighter;
            margin-top: 5px;
        }
        .profile .img-box{
            opacity: 1;
            display: block;
            position: relative;
        }
        .profile .img-box:after{
            content:"";
            opacity: 0;
            background-color: rgba(0, 0, 0, 0.75);
            position: absolute;
            right: 0;
            left: 0;
            top: 0;
            bottom: 0;
        }
        .img-box .img-top1{
            max-height: 250px;
        }
        .img-box ul{
            position: absolute;
            z-index: 2;
            bottom: 50px;
            text-align: center;
            width: 100%;
            padding-left: 0px;
            height: 0px;
            margin:0px;
            opacity: 0;
        }
        .profile .img-box:after, .img-box ul, .img-box ul li{
            -webkit-transition: all 0.5s ease-in-out 0s;
            -moz-transition: all 0.5s ease-in-out 0s;
            transition: all 0.5s ease-in-out 0s;
        }
        .img-box ul i{
            font-size: 20px;
            letter-spacing: 10px;
        }
        .img-box ul li{
            width: 30px;
            height: 30px;
            text-align: center;
            border: 1px solid #1a87f4;
            margin: 2px;
            padding: 4px;
            display: inline-block;
        }
        .img-box a{
            color:#fff;
        }
        .img-box:hover:after{
            opacity: 1;
        }
        .img-box:hover ul{
            opacity: 1;
        }
        .img-box ul a{
            -webkit-transition: all 0.3s ease-in-out 0s;
            -moz-transition: all 0.3s ease-in-out 0s;
            transition: all 0.3s ease-in-out 0s;
        }
        .img-box a:hover li{
            border-color: #fff;
            color: #1a87f4;
        }
        a{
            color:#1a87f4;
        }
        a:hover{
            text-decoration:none;
            color:#000000;
        }
        i.red{
            color:#1a87f4;
        }
    </style>
    @if(isset($results))
        <div class="row card shadow card-home">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb"  style="background: #1a87f4">
                    <li class="breadcrumb-item"><a href="{{route('home.index')}}"  style="color: #fff">Trang chủ</a></li>
                    <li class="breadcrumb-item active" style="color: #000">Tìm được ({{count($results)}}) kết quả cho từ khóa "{{$key}}"</li>
                </ol>
            </nav>

            <div class="container-fluid">
                <div class="row pt-md">
                    @foreach($results as $sanpham)
                        <div class="col-md-2 profile">
                            <div class="img-box">
                                <img src="{{asset('storage/'.$sanpham->hinhAnhs[0]->DuongDan)}}" class="card-img-top img-top1">
                                <ul class="text-center">
                                    <form action="{{route('cart.add')}}" method="post" id="cart-form-{{$sanpham->MaSP}}" style="display: none">
                                        @csrf

                                        <input type="hidden" name="quantity"  value="1" >
                                        <input type="hidden" name="id" value="{{$sanpham->MaSP}}">
                                        <input type="hidden" name="name" value="{{$sanpham->TenSP}}">
                                        <input type="hidden" name="price" value="{{$sanpham->Gia}}">
                                        <input type="hidden" name="image" value="{{$sanpham->hinhAnhs[0]->DuongDan}}">
                                        <input type="hidden" name="tacgia" value="{{$sanpham->tacGia->TenTG}}">
                                    </form>
                                    <a href="{{route('cart.add')}}" onclick="event.preventDefault();
                                            document.getElementById('cart-form-{{$sanpham->MaSP}}').submit();"
                                    ><li><i class="fa fa-shopping-cart"></i></li></a>
                                    <a href="#"><li><i class="fa fa-star"></i></li></a>
                                    <a href="{{route('home.detail',$sanpham->MaSP)}}"><li><i class="fas fa-info-circle"></i></li></a>
                                </ul>
                            </div>
                            <h1>{{$sanpham->TenSP}}</h1>
                            <h2>{{number_format($sanpham->Gia)}}</h2>
                            {{--<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>--}}
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    @endif

@endsection