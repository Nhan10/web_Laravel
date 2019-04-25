@extends('admin.layouts.master')
@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Admin</a></li>
            <li class="breadcrumb-item active text-dark" aria-current="page">Xác nhận nhập hàng</li>
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
            <a href="{{route('nhaphang.store')}}" class="m-0 font-weight-bold btn btn-danger">Xác nhận</a>
            <a href="{{route('nhaphang.huynhap')}}" class="m-0 font-weight-bold btn btn-danger">Hủy nhập</a>
            {{--<button type="submit" class="m-0 font-weight-bold btn btn-danger">Nhập hàng</button>--}}
        </div>
        <div class="card-body">
            <p>Người nhập: {{Auth::user()->TenND}}</p>
            <p>Ngày nhập: {{date('d-m-Y')}}</p>
            <div class="card-body">
            <div class="table-responsive">

                <table class="table table-bordered text-dark" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                    <tr>
                        <th>Mã sản phẩm</th>
                        <th>Tên sản phẩm</th>
                        <th>Tên nhà cung cấp</th>
                        <th>Giá nhập</th>
                        <th>Số lượng</th>
                        <th>Ghi chú</th>
                        <th>test</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($ctphieunhapss as $keys => $ctphieunhaps)
                        @php $spn = App\SanPham::find($ctphieunhaps['MaSP']);@endphp
                        <tr>
                            <th>{{$spn->MaSP}}</th>
                            <th>{{$spn->TenSP}}</th>

                                @php $ncc = \App\NhaCungCap::find($ctphieunhaps['MaNCC'])@endphp
                                <th>{{ $ncc->TenNCC }}</th>
                                <th>{{($ctphieunhaps['GiaNhap'])}}</th>
                                <th>{{($ctphieunhaps['SoLuong'])}}</th>
                                <th>{{($ctphieunhaps['GhiChu'])}}</th>
                                <th>{{($ctphieunhaps['MaSP'])}}<br>
                                    {{($ctphieunhaps['MaNCC'])}}</th>
                        </tr>

                    @endforeach
                    </tbody>


                </table>
            </div>
            </div>
        </div>
    </div>
@endsection