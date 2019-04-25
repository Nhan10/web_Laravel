@extends('admin.layouts.master')
@section('content')

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Admin</a></li>
            <li class="breadcrumb-item"><a href="{{route('nhaphang.index')}}">Chọn hàng</a></li>
            <li class="breadcrumb-item active text-dark" aria-current="page">Nhập số lượng hàng</li>
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
    <div class="alert alert-success" style="display:none"></div>
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
                <a href="{{route('nhaphang.xacnhan')}}" class="m-0 font-weight-bold btn btn-danger">Xong</a>
                {{--<button type="submit" class="m-0 font-weight-bold btn btn-danger">Nhập hàng</button>--}}
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
                            <th>Giá nhập</th>
                            <th>Nhà cung cấp</th>
                            <th>Số lượng còn</th>
                            <th>Số lượng muốn nhập</th>
                            <th>Thêm vào danh sách nhập</th>
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
                                    <th><input type="number" name="GiaNhap" class="form-control" style="width: 10em;"></th>
                                    <th>
                                        <select name="MaNCC" class="custom-select">
                                            @foreach($nhacungcaps as $ncc)
                                                <option value="{{$ncc->MaNCC}}">{{$ncc->TenNCC}}</option>
                                            @endforeach
                                        </select>
                                    </th>
                                        <th>{{$sanpham->SoLuong}}</th>
                                    <th>
                                        <input type="number" name="SoLuong" class="form-control" style="width: 4em;text-align: center" >
                                        <input type="hidden" name="MaSP" value="{{$sanpham->MaSP}}">
                                    </th>
                                    <th>
                                            <button type="submit" class="btn btn-success them">Thêm</button>
                                    </th>

                                    {{--</form>--}}
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
            $('.them').click(function(e) {
                e.preventDefault();
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                // var query = $(this).val();
                // console.log(query);
                var _token = $('input[name="_token"]').val();
                // console.log(_token);
                var GiaNhap = $('input[name="GiaNhap"]').val();
                var MaNCC = $('select[name="MaNCC"]').val();
                var SoLuong = $('input[name="SoLuong"]').val();
                var MaSP = $('input[name="MaSP"]').val();
                var url = '{{ route('nhaphang.nhaphangct', ":id") }}';
                url = url.replace(':id', MaSP);

                $.ajax(
                    {
                        url: url,
                        method: "POST",
                        data: {'GiaNhap': GiaNhap,'MaNCC': MaNCC,'SoLuong': SoLuong,'MaSP': MaSP, '_token': _token},
                        datatype: "html",
                    }).done(function (data) {
                        // alert('Thêm thành công!');
                        // console.log(data);
                        $('.alert-success').show();
                        $('.alert-success').html(data.success);
                }).fail(function (jqXHR, ajaxOptions, thrownError) {
                    alert('No response from server');
                    console.log(jqXHR);
                })
            });

        });
    </script>
{{--{{dd(Session::get('ctphieunhap'))}}--}}
@endsection