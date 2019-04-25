@extends('admin.layouts.master')
@section('content')

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Admin</a></li>
            <li class="breadcrumb-item"><a href="{{route('nguoidung.index')}}">Người dùng</a></li>
            <li class="breadcrumb-item active text-dark" aria-current="page">Phân quyền</li>
        </ol>
    </nav>

    <!-- Page Heading -->
    <div class="text-center">
        <h1 class="h3 mb-2 text-dark">Phân quyền người dùng</h1>
    </div>

    <div class="row">
        <div class="col-md-6 offset-md-3">
            @if ($errors->any())
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif
            {{--@if ($errors->any())--}}
            {{--<div class="alert alert-danger">--}}
            {{--<ul>--}}
            {{--@foreach ($errors->all() as $error)--}}
            {{--<li>{{ $error }}</li>--}}
            {{--@endforeach--}}
            {{--</ul>--}}
            {{--</div>--}}
            {{--@endif--}}
                <form action="{{route('nguoidung.phanquyen',$nguoidung->MaND)}}" method="post">
                    @csrf
                    @method('put')
                    <div class="form-group">
                        <label for="">Loại người dùng:</label>
                        <select name="MaLND" class="form-control">
                            @foreach($loainds as $loaind)
                                <option value="{{$loaind->MaLND}}"
                                        @if(old($loaind->MaLND, isset($nguoidung) ? $nguoidung->MaLND : '') == $loaind->MaLND)
                                        selected="selected"
                                        @endif
                                >{{$loaind->TenLoai}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-row">
                        <p class="col">Tên người dùng:</p>
                        <p class="col">{{$nguoidung->TenND}}</p>
                    </div>
                    <div class="form-row">
                        <p class="col">Email:</p>
                        <p class="col">{{$nguoidung->email}}</p>
                    </div>
                    <div class="form-row">
                        <p class="col">Địa chỉ:</p>
                        <p class="col">{{$nguoidung->DiaChi}}</p>
                    </div>
                    <div class="form-row">
                        <p class="col">Số điện thoại:</p>
                        <p class="col">{{$nguoidung->SDT}}</p>
                    </div>
                    <div class="form-row">
                        <p class="col">Quyền hiện tại:</p>
                        <p class="col">{{$nguoidung->loaiND->TenLoai}}</p>
                    </div>


                    <div class="form-group" style="margin-top: 1em;">
                        <button type="submit" class="btn btn-primary">Xác nhận</button>
                        <a href="{{ route('nguoidung.index')}}" class="text-blue-800">Quay lại</a>
                    </div>
                </form>
        </div>
    </div>

@endsection
