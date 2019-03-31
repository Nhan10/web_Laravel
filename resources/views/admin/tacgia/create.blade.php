@extends('admin.layouts.master')
@section('content')

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Admin</a></li>
            <li class="breadcrumb-item"><a href="{{route('tacgia.index')}}">Tác giả</a></li>
            <li class="breadcrumb-item active text-dark" aria-current="page">Thêm mới</li>
        </ol>
    </nav>

    <!-- Page Heading -->
    <div class="text-center">
        <h1 class="h3 mb-2 text-dark">Thêm mới tác giả</h1>
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
            <form action="{{route('tacgia.store')}}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="text" class="text-dark">Tên tác giả:</label>
                    <input required type="text" class="form-control" id="text" name="tenTG">
                </div>
                <div class="form-group">
                    <label for="text" class="text-dark">Địa chỉ:</label>
                    <input required type="text" class="form-control" id="text" name="diaChi">
                </div>
                <div class="form-group">
                    <label for="text" class="text-dark">Số điện thoại:</label>
                    <input required type="text" class="form-control" id="text" name="sDT">
                </div>

                <button type="submit" class="btn btn-primary">Thêm</button>
                <a href="{{ route('tacgia.index')}}" class="text-blue-800">Quay lại</a>
            </form>
        </div>
    </div>

@endsection
