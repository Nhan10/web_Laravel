@extends('admin.layouts.master')
@section('content')
    <style>
        #TenSP{
            color: #2fa360;
            font-weight: bold;
        }
        .item_price{
            color: #e99760;
        }
        .rating1{
            color: #fbff00;
        }
        #TacGia{
            color: #002dc7;
        }
        .TieuDe{
            color: #000000;
            font-weight: bold;
        }
        .table_tt{
            color: #000000;
        }
        .mota{
            color: #000000;
        }
    </style>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Admin</a></li>
            <li class="breadcrumb-item"><a href="{{Route('sanpham.index')}}">Sản phẩm</a></li>
            <li class="breadcrumb-item active text-dark" aria-current="page">Show</li>
        </ol>
    </nav>

    <div class="card shadow mb-4" style="padding: 1em;">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-4">
                    <div class="row">
                        <div class="col-md-3">
                            <ul class="list-unstyled">
                                @if(count($sanpham->hinhAnhs)>0)
                                    @foreach($sanpham->hinhAnhs as $hinhanh)
                                        <li><img id="imgClick" src="{{asset('storage/'.$hinhanh->DuongDan)}}" width="120" alt="..." class="img-thumbnail"></li>
                                    @endforeach
                                @endif
                            </ul>
                        </div>
                        <div class="col-md-9">
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
                <div class="col-md-8 single-right-left simpleCart_shelfItem">
                    <h3 id="TenSP">{{$sanpham->TenSP}}</h3>
                    <p><span class="item_price">{{number_format($sanpham->Gia)}} VNĐ</span>
                        <del></del>
                    <div class="rating1">
                        <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i>
                    </div>
                    <p id="TacGia">Tác giả: {{$sanpham->tacGia->TenTG}}</p>
                </div>
            </div>
        </div>
    </div>

    <div class="card shadow mb-4">
        <div class="card-body row">
            <div class="col-md-6">
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

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h4 class="TieuDe">Bình luận</h4>
        </div>
        <div class="card-body">

        </div>
    </div>

@endsection