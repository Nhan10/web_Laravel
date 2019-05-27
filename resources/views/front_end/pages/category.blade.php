@extends('front_end.layouts.master')
@section('content')
    {{--@include('front_end.layouts.sidebar')--}}

    <div class="row">
        <nav aria-label="breadcrumb"  style="width: 100%">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('home.index')}}">Trang chủ</a></li>
                @if(isset($nhomsped))
                    <li class="breadcrumb-item"><a href="{{route('home.categoryDanhmuc',$nhomsped->danhMucSP->MaDM)}}">{{$nhomsped->danhMucSP->TenDM}}</a></li>
                    <li class="breadcrumb-item"><a href="{{route('home.categoryNhoms',$nhomsped->MaNSP)}}">{{$nhomsped->TenNSP}}</a></li>
                @endif
                @if(isset($loaisped))
                    <li class="breadcrumb-item"><a href="{{route('home.categoryDanhmuc',$loaisped->nhomSP->danhMucSP->MaDM)}}">{{$loaisped->nhomSP->danhMucSP->TenDM}}</a></li>
                    <li class="breadcrumb-item"><a href="{{route('home.categoryNhoms',$loaisped->nhomSP->MaNSP)}}">{{$loaisped->nhomSP->TenNSP}}</a></li>
                    <li class="breadcrumb-item active">{{$loaisped->TenLoai}}</li>
                @endif
                @if(isset($DanhMuced))
                    <li class="breadcrumb-item"><a href="{{route('home.categoryDanhmuc',$DanhMuced->MaDM)}}">{{$DanhMuced->TenDM}}</a></li>
                @endif
                @if(isset($key))
                    <li class="breadcrumb-item active">{{$key}}</li>
                @endif
            </ol>
        </nav>
    </div>
    <div class="row">
        <div class="col-md-3 card">
            <div class="row">
                <style>
                    .nav-bar {
                        list-style-type: none;
                        margin: 0;
                        padding: 0;
                        width: 100%;
                    }
                    .nav-bar h5{
                        text-align: center;
                        padding: 0.6em 0 0.1em 0;
                    }
                    .nav-bar li a {
                        display: block;
                        color: #000;
                        font-size: 1em;
                        font-weight: bold;
                        padding: 8px 16px;
                        text-decoration: none;
                        border-bottom: 1px solid #fff;
                    }
                    .nav-bar li a:hover {
                        background-color: #1a87f4;
                        color: #fff;
                    }
                    .nav-sub{
                        list-style-type: none;
                        margin: 0 0 0 1.2em;
                        padding: 0;
                    }
                    .nav-sub li a{
                        font-weight: normal;
                    }
                    .nav-sub1{
                        list-style-type: none;
                        margin: 0 0 0 1.7em;
                        padding: 0;
                    }
                    .nav-sub1 li a{
                        font-weight: normal;
                    }
                </style>
                <ul class="nav-bar">
                    <h5>DANH MỤC SẢN PHẨM</h5>
                    @foreach($danhmucspComposer as $danhMucSP)
                        <li class="thefirst"><a href="{{route('home.categoryDanhmuc',$danhMucSP->MaDM)}}">{{$danhMucSP->TenDM}}<span class="results-count">({{$danhMucSP->countSanPhamByDanhMuc($danhMucSP)}})</span></a>
                            @if(isset($nhomspOfDanhmucsp))

                                <ul class="nav-sub">
                                    @foreach($nhomspOfDanhmucsp as $nhomsp)
                                        @if($nhomsp->MaDM ==$danhMucSP->MaDM)

                                            <li><a href="{{route('home.categoryNhoms',$nhomsp->MaNSP)}}">{{$nhomsp->TenNSP}} <span class="results-count">({{$nhomsp->countSanPhamByNhom($nhomsp)}})</span></a>
                                                @if(isset($loaispOfnhomsp))
                                                    <ul class="nav-sub1">
                                                        @foreach($loaispOfnhomsp as $loai)
                                                            @if($loai->MaNSP == $nhomsp->MaNSP)
                                                            <li><a href="{{route('home.categoryLoais',[$loai->MaLoai,$loai->MaNSP])}}">{{$loai->TenLoai}} <span class="results-count">({{$loai->countSanPhamByLoai($loai)}})</span></a></li>
                                                            @endif
                                                        @endforeach
                                                    </ul>
                                                @endif

                                            </li>
                                        @endif
                                    @endforeach
                                </ul>

                            @endif
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
        <div class="col-md-9 card">
            <div class="row">
                <style>
                    .filter-list-box{
                        margin: 1em 0 0 1em;
                        width: 100%;
                    }
                    .filter-list-box h4{
                        display: inline-table;
                        margin-right: 0.2em;
                        font-size: 135%;
                        font-weight: normal;
                    }
                    .filter-list-box h5{
                        display: inline-table;
                        font-size: 110%;
                        font-weight: normal;
                        color: #888888;
                    }
                </style>
                <div class="filter-list-box">
                    @if(isset($nhomsped))
                        <h4>{{$nhomsped->TenNSP}}:</h4>
                        <h5 name="results-count"> {{$nhomsped->countSanPhamByNhom($nhomsped)}} kết quả</h5>
                    @endif
                    @if(isset($loaisped))
                            <h4>{{$loaisped->TenLoai}}:</h4>
                            <h5 name="results-count"> {{$loaisped->countSanPhamByLoai($loaisped)}} kết quả</h5>
                        @endif
                        @if(isset($DanhMuced))
                            <h4>{{$DanhMuced->TenDM}}:</h4>
                            <h5 name="results-count"> {{$DanhMuced->countSanPhamByDanhMuc($DanhMuced)}} kết quả</h5>
                        @endif
                        @if(isset($key))
                            <br>
                            <h4>Kết quả tìm kiếm cho '{{$key}}':</h4>
                            <h5 name="results-count"> {{$sanphams->count()}} kết quả</h5>
                        @endif
                </div>
            </div>
            <div class="row">
                <div class="container-fluid">
                    <nav class="navbar navbar-expand-lg navbar-light justify-content-between" style="border-bottom: 1px solid #999999;margin-bottom: 1em;">
                        @if(isset($loaisped))
                            <ul class="navbar-nav">
                                <li class="nav-item">
                                    <a class="nav-link" href="{{url('timkiemtheoloai?timtheo=1&loai='.$loaisped->MaLoai.'')}}">HÀNG MỚI</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{url('timkiemtheoloai?timtheo=2&loai='.$loaisped->MaLoai.'')}}">GIÁ THẤP</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{url('timkiemtheoloai?timtheo=3&loai='.$loaisped->MaLoai.'')}}">GIÁ CAO</a>
                                </li>
                            </ul>
                            <form class="form-inline" action="{{url('timkiemtheoloai?timtheo=4&loai='.$loaisped->MaLoai.'')}}" method="get">
                                <input class="form-control mr-sm-2" name="key" type="search" placeholder="Tìm trong {{$loaisped->TenLoai}}" value="@if(isset($key)){{$key}}@endif" aria-label="Search">
                                <input type="hidden" name="timtheo"value="4">
                                <input type="hidden" name="loai" value="{{$loaisped->MaLoai}}">
                                <button class="btn btn-outline-primary my-2 my-sm-0" type="submit"><i class="fas fa-search"></i></button>
                            </form>
                        @endif
                        @if(isset($DanhMuced))
                            <ul class="navbar-nav">
                                <li class="nav-item">
                                    <a class="nav-link" href="{{url('timkiem?timtheo=1&key=1')}}">HÀNG MỚI</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{url('timkiem?timtheo=2&key=1')}}">GIÁ THẤP</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{url('timkiem?timtheo=3&key=1')}}">GIÁ CAO</a>
                                </li>
                            </ul>
                            <form class="form-inline" action="{{url('timkiem?timtheo=4')}}" method="get">
                                <input class="form-control mr-sm-2" name="key" type="search" placeholder="Tìm kiếm" value="@if(isset($key)){{$key}}@endif" aria-label="Search">
                                <input type="hidden" name="timtheo"value="5">
                                <button class="btn btn-outline-primary my-2 my-sm-0" type="submit"><i class="fas fa-search"></i></button>
                            </form>
                        @endif
                        @if(isset($nhomsped))
                            <ul class="navbar-nav">
                                <li class="nav-item">
                                    <a class="nav-link" href="{{url('timkiemtheonhom?timtheo=1&nhom='.$nhomsped->MaNSP.'')}}">HÀNG MỚI</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{url('timkiemtheonhom?timtheo=2&nhom='.$nhomsped->MaNSP.'')}}">GIÁ THẤP</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{url('timkiemtheonhom?timtheo=3&nhom='.$nhomsped->MaNSP.'')}}">GIÁ CAO</a>
                                </li>
                            </ul>
                            <form class="form-inline" action="{{url('timkiemtheonhom?timtheo=4&nhom='.$nhomsped->MaNSP.'')}}" method="get">
                                <input class="form-control mr-sm-2" name="key" type="search" placeholder="Tìm trong {{$nhomsped->TenNSP}}" value="@if(isset($key)){{$key}}@endif" aria-label="Search">
                                <input type="hidden" name="timtheo"value="4">
                                <input type="hidden" name="nhom" value="{{$nhomsped->MaNSP}}">
                                <button class="btn btn-outline-primary my-2 my-sm-0" type="submit"><i class="fas fa-search"></i></button>
                            </form>
                        @endif
                    </nav>
                </div>
            </div>
            <style>
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
                    z-index: 0;
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
                    max-height: 240px;
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
            <div class="container-fluid">
                <div class="row pt-md">
                @if(isset($sanphamss))
                    @foreach($sanphamss as $sanphamsd)
                        @foreach($sanphamsd as $sanpham)
                        <div class="col-md-2 profile">
                            <div class="img-box">
                                <img src="{{asset('storage/'.$sanpham->hinhAnhs[0]->DuongDan)}}" {{--height="190"--}} class="card-img-top img-top1">
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
                    @endforeach
                @endif

                @if(isset($sanphams))
                        @foreach($sanphams as $sanpham)
                            <div class="col-md-2 profile">
                                <div class="img-box">
                                    <img src="{{asset('storage/'.$sanpham->hinhAnhs[0]->DuongDan)}}" {{--height="190"--}} class="card-img-top img-top1">
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
                    @endif
                </div>
            </div>
        </div>
    </div>

@endsection