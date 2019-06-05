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
    {{ dd(session('error')) }}
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
            <div class="row">
                <div class="col-md-4">
                    <form class="form-inline">
                        <div class="form-group">
                            <label>Xem đơn hàng: </label>
                            <select name="key" class="form-control mx-sm-3 key">
                                <option value="1">Tất cả</option>
                                <option value="2">chờ xử lý</option>
                                <option value="3">đã xử lý</option>
                                <option value="4">đang giao</option>
                                <option value="5">đã giao</option>
                                <option value="6">đã hủy</option>
                                <option value="7">đã trả lại</option>
                            </select>
                        </div>
                    </form>
                </div>
                <div class="col-md-4 my-auto">
                    @if(isset($title))
                        <h5 class="mb-0 text-dark">{!! $title !!}</h5>
                    @else
                        <h5 class="mb-0 text-dark"> </h5>
                    @endif
                </div>
            </div>
            {{--<a href="{{Route('donhang.index')}}" class="m-0 font-weight-bold btn btn-success">Danh sách đơn hàng</a>--}}
        </div>
        <div class="card-body result">
            <div class="table-responsive">
                <table class="table table-bordered text-dark" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                    <tr>
                        <th>Mã đơn hàng</th>
                        <th>Tên người dùng</th>
                        <th>Tên người nhận</th>
                        <th>Địa chỉ</th>
                        <th>Số điện thoại</th>
                        <th>Ngày đặt</th>
                        <th>Tổng tiền</th>
                        <th>Trạng thái</th>
                        <th>Thao tác</th>
                    </tr>
                    </thead>
                    <tbody>

                    @foreach($donhangs as $dh)
                        <tr>
                            <th>{{$dh->MaDH}}</th>
                            <th>{{$dh->nguoidung->TenND}}</th>
                            <th>{{$dh->TenKH}}</th>
                            <th>{{$dh->DiaChi}}</th>
                            <th>{{$dh->SDT}}</th>
                            <th>{{$dh->NgayDat}}</th>
                            <th>{{ number_format($dh->TongTien) }}đ</th>
                            <th>{{$dh->trangthai->TenTT}}</th>
                            <th>
                                <a href="">Chi tiết</a>
                                <a href="" class="btn btn-primary" data-toggle="modal" data-target="#myModal-{{$dh->MaDH}}">Xử lý</a>
                                <!-- The Modal -->
                                <div class="modal fade" id="myModal-{{$dh->MaDH}}">
                                    <div class="modal-dialog">
                                        <div class="modal-content">

                                            <!-- Modal Header -->
                                            <div class="modal-header">
                                                <h4 class="modal-title">Xử lý đơn hàng số: {{$dh->MaDH}}</h4>
                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                            </div>

                                            <form action="{{route('donhang.xuly',$dh->MaDH)}}" method="post">
                                            @csrf
                                            @method('PUT')
                                            <!-- Modal body -->
                                                <div class="modal-body">
                                                    <div class="form-group">
                                                        <label for="nvgh" class="col-6">Chọn nhân viên giao đơn hàng:</label>
                                                        <select name="MaNVGH" id="nvgh" class="form-control col-6">
                                                            @foreach($nhanviengiaohangs as $nvgh)
                                                                <option value="{{$nvgh->MaND}}">{{$nvgh->TenND}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>

                                                <!-- Modal footer -->
                                                <div class="modal-footer">
                                                    <button type="submit" class="btn btn-primary">Xử lý</button>
                                                    <button type="button" class="btn btn-danger" data-dismiss="modal">Đóng</button>
                                                </div>

                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <!-- END Modal -->
                            </th>
                        </tr>
                    @endforeach

                    </tbody>
                </table>
            </div>

        </div>
    </div>
    <script src={{asset('admin/vendor/jquery/jquery.min.js')}}></script>
    <script type="text/javascript">
        $(document).ready(function () {
            $(".key").change(function(e) {
                e.preventDefault();
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                var key = $('select[name="key"]').val();
                // console.log(key);
                $.ajax(
                    {
                        url: "{{route('donhang.loc')}}",
                        method: "POST",
                        data: {'key': key},
                        datatype: "html",
                    }).done(function (data) {
                    $('.result').empty().html(data);
                }).fail(function(jqXHR, ajaxOptions, thrownError){
                    alert('No response from server');
                    console.log(jqXHR);
                });
            });
        });
    </script>
@endsection