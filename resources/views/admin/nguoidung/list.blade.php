@extends('admin.layouts.master')
@section('content')

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Admin</a></li>
            <li class="breadcrumb-item active text-dark" aria-current="page">Người dùng</li>
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
            <a href="{{Route('nguoidung.create')}}" class="m-0 font-weight-bold btn btn-success">Thêm mới</a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered text-dark" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                    <tr>
                        <th>Mã người dùng</th>
                        <th>Tên người dùng</th>
                        <th>Email</th>
                        <th>Địa chỉ</th>
                        <th>Số điện thoại</th>
                        <th>Xác thực</th>
                        <th>Quyền</th>
                        <th>Thao tác</th>
                    </tr>
                    </thead>
                    <tbody>

                    @foreach($nguoidungs as $nguoidung)
                        <tr>
                            <th>{{$nguoidung->MaND}}</th>
                            <th>{{$nguoidung->TenND}}</th>
                            <th>{{$nguoidung->email}}</th>
                            <th>{{$nguoidung->DiaChi}}</th>
                            <th>{{$nguoidung->SDT}}</th>
                            <th style="text-align: center">
                                @if($nguoidung->active==1)
                                    <i class="fas fa-check" style="color: #00cc00"></i>
                                @elseif(!($nguoidung->active)==1)
                                    <i class="fas fa-times" style="color: red"></i>
                                @endif
                            </th>
                            <th>{{$nguoidung->loaiND->TenLoai}}</th>
                            <th>
                                <a href="{{route('nguoidung.show',$nguoidung->MaND)}}" class="btn btn-outline-warning" {{--data-toggle="modal" data-target="#exampleModal-{{ $nguoidung->MaND }}"--}}>Phân quyền</a>
                                <a href="{{route('nguoidung.edit',$nguoidung->MaND)}}" class="btn btn-facebook"><i class="fas fa-edit"></i></a>
                                <form class="d-inline" action="{{route('nguoidung.destroy',$nguoidung->MaND)}}" method="post">
                                    @method('DELETE')
                                    @csrf
                                    <button class="btn btn-danger"><i style="color: #ffffff" class="fa fa-trash">  </i> </button>
                                </form>
                            </th>
                        </tr>
                        {{--@include('admin.nguoidung.partials.modalPhanQuyen'/*, ['nguoidung' => $nguoidung]*/)--}}
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection