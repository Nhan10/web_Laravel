@extends('admin.layouts.master')
@section('content')

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Admin</a></li>
            <li class="breadcrumb-item"><a href="{{route('tacgia.index')}}">Tác giả</a></li>
            <li class="breadcrumb-item active text-dark" aria-current="page">Sửa</li>
        </ol>
    </nav>

    <!-- Page Heading -->
    <div class="text-center">
        <h1 class="h3 mb-2 text-dark">Sửa danh mục {{$tacgia->TenTG}}</h1>
    </div>

    <div class="row">
        <div class="col-md-6 offset-md-3">
            <form action="{{route('tacgia.update',$tacgia->MaTG)}}" method="POST">
                @method('PUT')
                @csrf
                <div class="form-group">
                    <label for="text" class="text-dark">Tên tác giả:</label>
                    <input required type="text" class="form-control {{ $errors->has('tenTG') ? ' is-invalid' : '' }}" id="text" value="{{$tacgia->TenTG}}" name="tenTG">
                    @if ($errors->has('tenTG'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('tenTG') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="form-group">
                    <label for="text" class="text-dark">Địa chỉ:</label>
                    <input required type="text" class="form-control {{ $errors->has('diaChi') ? ' is-invalid' : '' }}" id="text" value="{{$tacgia->DiaChi}}" name="diaChi">
                    @if ($errors->has('diaChi'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('diaChi') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="form-group">
                    <label for="text" class="text-dark">Số điện thoại:</label>
                    <input required type="text" class="form-control {{ $errors->has('sDT') ? ' is-invalid' : '' }}" id="text" value="{{$tacgia->SDT}}" name="sDT">
                    @if ($errors->has('sDT'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('sDT') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="form-group">
                    <label for="text" class="text-dark">Giới thiệu:</label>
                    <textarea name="gioiThieu" class="form-control" cols="30" rows="10">{{$tacgia->GioiThieu}}</textarea>
                </div>

                <button type="submit" class="btn btn-primary">Sửa</button>
                <a href="{{ route('tacgia.index')}}" class="text-blue-800">Quay lại</a>
            </form>
        </div>
    </div>

@endsection
