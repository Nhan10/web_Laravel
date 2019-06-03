@extends('admin.layouts.master')
@section('content')

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Admin</a></li>
            <li class="breadcrumb-item active text-dark" aria-current="page">danh sách đơn hàng</li>
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
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <div class="row justify-content-center">
                <div class="col-md-4 my-auto">
                    @if(isset($title))
                        <h5 class="mb-0 text-dark">{!! $title !!}</h5>
                    @else
                        <h5 class="mb-0 text-dark">Bạn muốn làm gì hôm nay !</h5>
                    @endif
                </div>
            </div>
            {{--<a href="{{Route('donhang.index')}}" class="m-0 font-weight-bold btn btn-success">Danh sách đơn hàng</a>--}}
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered text-dark" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                    <tr>
                        <th>Mã đơn hàng</th>
                        <th>Tên người nhận</th>
                        <th>Địa chỉ</th>
                        <th>Số điện thoại</th>
                        <th>Ngày đặt</th>
                        <th>Tổng tiền</th>
                        <th>Nhân viên giao hàng</th>
                        <th>Trạng thái</th>
                        <th>Thao tác</th>
                    </tr>
                    </thead>
                    <tbody>

                    @foreach($donhangs as $dh)
                        <tr>
                            <th>{{$dh->MaDH}}</th>
                            <th>{{$dh->TenKH}}</th>
                            <th>{{$dh->DiaChi}}</th>
                            <th>{{$dh->SDT}}</th>
                            <th>{{$dh->NgayDat}}</th>
                            <th>{{number_format($dh->TongTien)}}đ</th>
                            @if($dh->nguoiDungNVGH)
                                <th>{{$dh->nguoiDungNVGH->TenND}}</th>
                            @else
                                <th>error 404</th>
                            @endif
                            <th>{{$dh->trangthai->TenTT}}</th>
                            <th>
                                <a href="{{route('donhang.ctdonhang',$dh->MaDH)}}">Chi tiết</a>
                                <form action="{{route('donhang.xuathang',$dh->MaDH)}}" method="post">
                                    @csrf
                                    @method('PUT')
                                    <button type="submit" class="btn btn-outline-primary"><i class="fas fa-dolly-flatbed"></i>Xuất hàng</button>
                                </form>

                            </th>
                        </tr>
                    @endforeach

                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection