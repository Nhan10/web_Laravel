@extends('admin.layouts.master')
@section('content')

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Admin</a></li>
            <li class="breadcrumb-item active text-dark" aria-current="page">Chọn sản phẩm cần nhập</li>
        </ol>
    </nav>

    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif
    @if (session('error'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{ session('error') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

    <!-- DataTales Example -->

    <form class="d-inline" action="{{route('nhaphang.chonhang')}}" method="get">
        {{--@csrf--}}
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                {{--<a href="{{Route('nhaphang.create')}}" class="m-0 font-weight-bold btn btn-danger">Thêm mới</a>--}}
                <button type="submit" class="m-0 font-weight-bold btn btn-danger">Xác nhận chọn</button>
                <div class="pt-2 m-0" style="display: inline-table">
                    <p class="alert alert-warning m-0 p-0">(*) Bạn vui lòng ticks vào sản phẩm cần nhập để thêm vào danh sách nhập hàng.<br>
                        (*) có thể ticks nhiều sản phẩm cùng lúc.<br>
                        (*) sau khi xong bạn hãy click vào xác nhận chọn.</p>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered text-dark" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                        <tr>
                            <th>Mã sản phẩm</th>
                            <th>Hình ảnh</th>
                            <th>Tên sản phẩm</th>
                            <th>Tác giả</th>
                            <th>Giá bán</th>
                            <th>Số lượng</th>
                            <th>Chọn sản phẩm cần nhập</th>
                        </tr>
                        </thead>
                        <tbody>

                        @foreach($sanphams as $sanpham)
                            <tr>
                                <th>{{$sanpham->MaSP}}</th>
                                <th><img src="{{asset('storage/'.$sanpham->hinhAnhs[0]->DuongDan)}}" width="80px"></th>
                                <th>{{$sanpham->TenSP}}</th>
                                <th>{{$sanpham->tacGia->TenTG}}</th>
                                <th>{{$sanpham->Gia}}</th>
                                <th>{{$sanpham->SoLuong}}</th>
                                <th>
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" value="{{$sanpham->MaSP}}" name="listSP[]" class="custom-control-input" id="customCheck1-{{$sanpham->MaSP}}">
                                        <label class="custom-control-label" for="customCheck1-{{$sanpham->MaSP}}">Chọn sản phẩm</label>
                                    </div>
                                </th>
                            </tr>
                        @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </form>

@endsection