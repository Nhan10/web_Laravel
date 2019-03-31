@extends('admin.layouts.master')
@section('content')

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Admin</a></li>
            <li class="breadcrumb-item"><a href="{{route('nhomsanpham.index')}}">Nhóm sản phẩm</a></li>
            <li class="breadcrumb-item active text-dark" aria-current="page">Thêm mới</li>
        </ol>
    </nav>

    <!-- Page Heading -->
    <div class="text-center">
        <h1 class="h3 mb-2 text-dark">Thêm mới nhóm sản phẩm</h1>
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
            <form action="{{route('nhomsanpham.store')}}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="text" class="text-dark">Tên nhóm:</label>
                    <input required type="text" class="form-control" id="text" name="tenNSP">
                </div>

                <div class="form-group">
                    <label for="text" class="text-dark">Danh mục:</label>
                    <select class="form-control" name="maDM" >
                        @foreach($danhmucs as $danhmuc)
                        <option value="{{$danhmuc->MaDM}}">{{$danhmuc->TenDM}}</option>
                        @endforeach
                    </select>
                </div>

                <button type="submit" class="btn btn-primary">Thêm</button>
                <a href="{{ route('nhomsanpham.index')}}" class="text-blue-800">Quay lại</a>
            </form>
        </div>
    </div>

@endsection
