@extends('admin.layouts.master')
@section('content')

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Admin</a></li>
            <li class="breadcrumb-item"><a href="{{route('nhacungcap.index')}}">Nhà cung cấp</a></li>
            <li class="breadcrumb-item active text-dark" aria-current="page">Sửa</li>
        </ol>
    </nav>

    <!-- Page Heading -->
    <div class="text-center">
        <h1 class="h3 mb-2 text-dark">Sửa nhà cung cấp {{$nhacungcap->TenNCC}}</h1>
    </div>

    <div class="row">
        <div class="col-md-6 offset-md-3">
            {{--@if ($errors->any())--}}
                {{--<div class="alert alert-danger alert-dismissible fade show" role="alert">--}}
                    {{--<ul>--}}
                        {{--@foreach ($errors->all() as $error)--}}
                            {{--<li>{{ $error }}</li>--}}
                        {{--@endforeach--}}
                    {{--</ul>--}}
                    {{--<button type="button" class="close" data-dismiss="alert" aria-label="Close">--}}
                        {{--<span aria-hidden="true">&times;</span>--}}
                    {{--</button>--}}
                {{--</div>--}}
            {{--@endif--}}
            <form action="{{route('nhacungcap.update',$nhacungcap->MaNCC)}}" method="POST">
                @method('PUT')
                @csrf
                <div class="form-group">
                    <label for="text" class="text-dark">Tên nhà cung cấp:</label>
                    <input required type="text" class="form-control {{ $errors->has('tenNCC') ? ' is-invalid' : '' }}" id="text" value="{{$nhacungcap->TenNCC}}" name="tenNCC">
                    @if ($errors->has('tenNCC'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('tenNCC') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="form-group">
                    <label for="text" class="text-dark">Địa chỉ:</label>
                    <input required type="text" class="form-control {{ $errors->has('diaChi') ? ' is-invalid' : '' }}" id="text" value="{{$nhacungcap->DiaChi}}" name="diaChi">
                    @if ($errors->has('diaChi'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('diaChi') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="form-group">
                    <label for="text" class="text-dark">Số điện thoại:</label>
                    <input required type="text" class="form-control {{ $errors->has('sDT') ? ' is-invalid' : '' }}" id="text" value="{{$nhacungcap->SDT}}" name="sDT">
                    @if ($errors->has('sDT'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('sDT') }}</strong>
                        </span>
                    @endif
                </div>

                <button type="submit" class="btn btn-primary">Sửa</button>
                <a href="{{ route('nhacungcap.index')}}" class="text-blue-800">Quay lại</a>
            </form>
        </div>
    </div>

@endsection
