@extends('front_end.layouts.master')
@section('content')

    <style>
        #TenSP{
            color: #333;
            font-weight: 700;
            font-size: 26px;
            text-transform: uppercase;
            font-family: 'Roboto',sans-serif !important;
        }
        .item_price{
            color: #575757;
            font-size: 36px;
            font-weight: 700;
            font-family: 'Roboto',sans-serif !important;
            margin: 0;
            padding: 0;
        }
        .rating1 i{
            color: #fbff00;
            margin-bottom: 0.3em;
        }
        #TacGia{
            color: #007ff0;
            font-size: 1.06em;
        }
        .TieuDe{
            color: #333;
            font-weight: bold;
            font-size: 118%;
        }
        .table_tt{
            color: #000000;
            font-size: 1.05em;
        }
        .mota{
            color: #000000;
            font-size: 1em;
        }
        .btn-muahang{
            background-color: #1a87f4;
            color: #ffffff;
            font-weight: bold;
        }
        .btn-muahang:hover{
            background-color: #f43934;
            color: #ffffff;
        }
        #qty{
            width: 3em;
            text-align: center;
            margin-left: 0.2em;
        }
    </style>
    <div class="row">
        <nav aria-label="breadcrumb" style="width: 100%">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('home.index')}}">Trang chủ</a></li>
                <li class="breadcrumb-item"><a href="{{route('home.categoryDanhmuc',$sanpham->loaiSP->nhomSP->danhMucSP->MaDM)}}">{{$sanpham->loaiSP->nhomSP->danhMucSP->TenDM}}</a></li>
                <li class="breadcrumb-item"><a href="{{route('home.categoryNhoms',$sanpham->loaiSP->nhomSP->MaNSP)}}">{{$sanpham->loaiSP->nhomSP->TenNSP}}</a></li>
                <li class="breadcrumb-item"><a href="{{route('home.categoryLoais',[$sanpham->loaiSP->MaLoai,$sanpham->loaiSP->MaNSP])}}">{{$sanpham->loaiSP->TenLoai}}</a></li>
                <li class="breadcrumb-item active text-dark" aria-current="page">{{$sanpham->TenSP}}</li>
            </ol>
        </nav>
    </div>

    <div class="card mb-4 row" style="padding: 1em 0;">
        <div class="container-fluid" style="padding: 0 0.5em">
            <div class="row">
                <div class="col-md-4">
                    <div class="row">
                        <div class="col-md-3" style="padding-right: 0;">
                            <ul class="list-unstyled">
                                @if(count($sanpham->hinhAnhs)>0)
                                    @foreach($sanpham->hinhAnhs as $hinhanh)
                                        <li><img id="imgClick" src="{{asset('storage/'.$hinhanh->DuongDan)}}" width="120" alt="..." class="img-thumbnail mb-1"></li>
                                    @endforeach
                                @endif
                            </ul>
                        </div>
                        <div class="col-md-9" style="padding: 0 0.5em">
                            <img id="imgShow" src="{{asset('storage/'.$sanpham->hinhAnhs[0]->DuongDan)}}" width="300" alt="..." class="img-thumbnail">
                        </div>
                        <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
                        <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4/jquery.min.js"></script>
                        <script type="text/javascript" src="https://cdn.rawgit.com/igorlino/elevatezoom-plus/1.1.6/src/jquery.ez-plus.js"></script>
                        <script type="text/javascript">
                            $(document).ready(function () {
                                $('.list-unstyled img').click(function (e) {
                                    e.preventDefault();
                                    $('#imgShow').attr("src", $(this).attr("src"));

                                    $('#imgShow').ezPlus();
                                });
                                $('#imgShow').ezPlus();
                            });
                        </script>
                    </div>
                </div>
                <div class="col-md-5 single-right-left simpleCart_shelfItem">
                    <h3 id="TenSP">{{$sanpham->TenSP}}</h3>
                    <p class="item_price"><span>{{number_format($sanpham->Gia)}} đ</span>
                        <del></del></p>
                    <hr>
                    <div class="rating1">
                        <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i>
                        (12)
                    </div>
                    <p id="TacGia">Tác giả: {{$sanpham->tacGia->TenTG}}</p>
                    <hr>
                    <form action="{{route('cart.add')}}" method="post">
                        @csrf

                        <label for="qty">Số lượng:</label>
                        <input type="text" name="quantity" id="qty" maxlength="12" value="1" title="SL" class="input-text qty">
                        <input type="hidden" name="id" value="{{$sanpham->MaSP}}">
                        <input type="hidden" name="name" value="{{$sanpham->TenSP}}">
                        <input type="hidden" name="price" value="{{$sanpham->Gia}}">
                        <input type="hidden" name="image" value="{{$sanpham->hinhAnhs[0]->DuongDan}}">
                        <input type="hidden" name="tacgia" value="{{$sanpham->tacGia->TenTG}}">
                        @if(($sanpham->SoLuong)>0)
                            <button type="submit" class="btn btn-muahang"><i class="fa fa-shopping-cart"></i> Chọn mua</button>
                        @else
                            <button type="submit" class="btn btn-danger" disabled>Hết hàng</button>
                        @endif
                    </form>
                </div>

                <div class="col-md-3">
                    <style>
                        .block-note-product{
                            list-style-type: none;
                            margin: 0;
                            padding: 0;
                            width: 100%;
                        }
                        .block-note-product li {
                            padding: 1em 1em;
                            border-bottom: 1px solid #eff0f5;
                            width: 100%;
                        }
                        .block-note-product li label{
                            color: #838282;
                        }
                        .block-note-product li .xem-chi-tiet{
                            color: #c00;
                            text-decoration: none;
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
                    <div class="container-fluid">
                        <div class="row" style="background-color: #fafafa">
                            <ul class="block-note-product">
                                <li class="product-attribute">
                                    <label>Tên Nhà Cung Cấp: </label>
                                    <a href="" class="xem-chi-tiet">
                                        @if(count($sanpham->cTPhieuNhaps)>0)
                                            {{\App\NhaCungCap::find($sanpham->cTPhieuNhaps[0]->MaNCC)->TenNCC}}
                                        @else
                                            Chưa nhập hàng
                                        @endif
                                    </a>
                                </li>
                                <li><label>Loại bìa: </label> {{$sanpham->LoaiBia}}</li>
                                <li><label>Tình trạng: </label>
                                    @if(($sanpham->SoLuong)>0)
                                        Còn hàng
                                    @else
                                        Hết hàng
                                    @endif
                                </li>
                            </ul>
                        </div>
                        <div class="row">
                            <div class="banner">
                                <img src="{{asset('image/slide1.png')}}" alt="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="card mb-4 row">
        <div class="container-fluid" style="padding: 0">
            <div class="card-body" style="padding: 0">
                <div class="row" style="padding: 0">
                    <div class="col-md-6" style="padding-right: 0">
                        <div class="card-header py-3">
                            <h4 class="TieuDe">Thông tin chi tiết</h4>
                        </div>
                        <table class="table table-striped table_tt">
                            <tr>
                                <td>Nhà cung cấp</td>
                                <td>
                                    @if(count($sanpham->cTPhieuNhaps)>0)
                                        {{\App\NhaCungCap::find($sanpham->cTPhieuNhaps[0]->MaNCC)->TenNCC}}
                                    @else
                                        Chưa nhập hàng
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <td>Tác giả</td>
                                <td>{{$sanpham->tacGia->TenTG}}</td>
                            </tr>
                            <tr>
                                <td>Năm xuất bản</td>
                                <td>{{$sanpham->NamXB}}</td>
                            </tr>
                            <tr>
                                <td>Kích thước</td>
                                <td>{{$sanpham->KichThuoc}}</td>
                            </tr>
                            <tr>
                                <td>Nhà xuất bản</td>
                                <td>{{$sanpham->NXB}}</td>
                            </tr>
                            <tr>
                                <td>Trọng lượng</td>
                                <td>{{$sanpham->CanNang}}</td>
                            </tr>
                            <tr>
                                <td>Dịch giả</td>
                                <td>{{$sanpham->DichGia}}</td>
                            </tr>
                            <tr>
                                <td>Loại bìa</td>
                                <td>{{$sanpham->LoaiBia}}</td>
                            </tr>
                            <tr>
                                <td>Số trang</td>
                                <td>{{$sanpham->SoTrang}}</td>
                            </tr>
                            <tr>
                                <td>Ngôn ngữ</td>
                                <td>{{$sanpham->NgonNgu}}</td>
                            </tr>
                        </table>
                    </div>

                    <div class="col-md-6">
                        <div class="card-header py-3">
                            <h4 class="TieuDe">Giới thiệu sách</h4>
                        </div>
                        <div class="card-body">
                            <p class="mota">{{$sanpham->MoTa}}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="card mb-4 row">
        <div class="card-header py-3">
            <h4 class="TieuDe">Bình luận</h4>
        </div>
        <hr>
        <div class="card-body">

        </div>
    </div>

@endsection