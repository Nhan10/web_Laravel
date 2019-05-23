@extends('admin.layouts.master')
@section('content')

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Admin</a></li>
            <li class="breadcrumb-item"><a href="#">Nhập hàng</a></li>
            <li class="breadcrumb-item active text-dark" aria-current="page">Nhập số lượng sản phẩm</li>
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

    <div class="alert alert-success successAlert" style="display: none">
        <p style="display: inline-table" class="success-message"></p>
        <button type="button" class="close close-success">
            <span aria-hidden="true" class="close close-success">&times;</span>
        </button>
    </div>
    <script src={{asset('admin/vendor/jquery/jquery.min.js')}}></script>
    <script type="text/javascript">
        $(document).ready(function () {
            $('.close-success').click(function (e) {
                e.preventDefault();
                $('.successAlert').attr("style","display:none");
                $('.success-message').html(' ');
            })
        });
    </script>

    <div class="alert alert-danger errorAlert" style="display:none">
        <p style="display: inline-table" class="error-message"></p>
        <button type="button" class="close close-error" >
            <span aria-hidden="true" class="close close-error">&times;</span>
        </button>
    </div>
    <script src={{asset('admin/vendor/jquery/jquery.min.js')}}></script>
    <script type="text/javascript">
        $(document).ready(function () {
            $('.close-error').click(function (e) {
                e.preventDefault();
                $('.errorAlert').attr("style","display:none");
                $('.error-message').html(' ');
            })
        });
    </script>
    <!-- DataTales Example -->

        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h5 class="card-title text-center" style="color: #000000; font-weight: bold;font-size: 1.8em;">NHẬP CHI TIẾT PHIẾU NHẬP</h5>
                <div class="pt-0 m-0" style="display: inline-table">
                    <p class="alert alert-warning m-0 p-0">(*) Nhập giá nhập và số lượng vào ô input và kích vào nút thêm.<br>
                    (*) Sao khi thêm xong thì click vào nút xong.
                    </p>
                </div>
                {{--<button type="submit" class="m-0 font-weight-bold btn btn-danger">Nhập hàng</button>--}}
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered text-dark" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                        <tr>
                            <th>Mã SP</th>
                            <th>Hình ảnh</th>
                            <th>Tên sản phẩm</th>
                            <th>Tác giả</th>
                            <th>Giá bán</th>
                            <th>Giá nhập</th>
                            <th>Nhà cung cấp</th>
                            <th>Số lượng còn</th>
                            <th>Số lượng nhập</th>
                            <th>Ghi chú</th>
                            <th>Thêm</th>
                        </tr>
                        </thead>
                        <tbody>

                        @foreach($sps as $sanpham)

                                <tr>
                                    <th>{{$sanpham->MaSP}}</th>
                                    <th><img src="{{asset('storage/'.$sanpham->hinhAnhs[0]->DuongDan)}}" width="80px"></th>
                                    <th>{{$sanpham->TenSP}}</th>
                                    <th>{{$sanpham->tacGia->TenTG}}</th>
                                    <th>{{$sanpham->Gia}}</th>
                                    {{--<form action="{{route('nhaphang.nhaphangct')}}" method="post">--}}
                                        @csrf
                                    <th><input type="number" name="GiaNhap-{{$sanpham->MaSP}}" class="form-control" style="width: 8em;"></th>
                                    <th>
                                        <select name="MaNCC-{{$sanpham->MaSP}}" class="custom-select" style="width: 8em;">
                                            @foreach($nhacungcaps as $ncc)
                                                <option value="{{$ncc->MaNCC}}">{{$ncc->TenNCC}}</option>
                                            @endforeach
                                        </select>
                                    </th>
                                        <th>{{$sanpham->SoLuong}}</th>
                                    <th>
                                        <input type="number" name="SoLuong-{{$sanpham->MaSP}}" class="form-control" style="width: 4em;text-align: center" >
                                        <input type="hidden" name="MaSP-{{$sanpham->MaSP}}" value="{{$sanpham->MaSP}}">
                                    </th>
                                    <th><input type="text" name="GhiChu-{{$sanpham->MaSP}}" class="form-control" ></th>
                                    <th>
                                            <button type="submit" class="btn btn-success them-{{$sanpham->MaSP}}">Thêm</button>
                                    </th>
                                    {{--</form>--}}
                                </tr>
                                <script src={{asset('admin/vendor/jquery/jquery.min.js')}}></script>
                                <script type="text/javascript">
                                    $(document).ready(function () {
                                        $(".them-{{$sanpham->MaSP}}").click(function(e) {
                                            e.preventDefault();
                                            $('.errorAlert').attr("style","display:none");
                                            $('.error-message').html(' ');
                                            $.ajaxSetup({
                                                headers: {
                                                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                                }
                                            });
                                            var _token = $('input[name="_token"]').val();
                                            // console.log(_token);
                                            var GiaNhap = $('input[name="GiaNhap-{{$sanpham->MaSP}}"]').val();
                                            var MaNCC = $('select[name="MaNCC-{{$sanpham->MaSP}}"]').val();
                                            var SoLuong = $('input[name="SoLuong-{{$sanpham->MaSP}}"]').val();
                                            var GhiChu = $('input[name="GhiChu-{{$sanpham->MaSP}}"]').val();
                                            var MaSP = $('input[name="MaSP-{{$sanpham->MaSP}}"]').val();

                                            $.ajax(
                                                {
                                                    url: "{{route('nhaphang.nhaphangct')}}",
                                                    method: "POST",
                                                    data: {'GiaNhap': GiaNhap,'MaNCC': MaNCC,'SoLuong': SoLuong,'MaSP': MaSP,'GhiChu': GhiChu, '_token': _token},
                                                    datatype: "html",
                                                }).done(function (data) {
                                                    // alert('Thêm thành công!');
                                                    // console.log(data);
                                                    $('.successAlert').show();
                                                    $('.success-message').html(data.success);
                                            }).fail(function (jqXHR, ajaxOptions, thrownError) {
                                                // alert('No response from server');
                                                console.log(jqXHR);
                                                $.each(jqXHR.responseJSON.errors, function(key, value){
                                                    $('.errorAlert').show();
                                                    $('.error-message').append('<strong>'+value+'</strong><br>');
                                                });
                                            })
                                        });
                                    });
                                </script>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="card-footer py-3 text-center">
                <a href="{{route('nhaphang.xacnhan')}}" class="m-0 font-weight-bold btn btn-danger">Xong</a>
                <div class="pt-2 m-0" style="display: inline-table">
                    <p class="alert alert-warning m-0 p-0">(*) tips</p>
                </div>
            </div>
        </div>

{{--{{dd(Session::get('ctphieunhap'))}}--}}
@endsection