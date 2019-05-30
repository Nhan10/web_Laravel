@extends('admin.layouts.master')
@section('content')

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Admin</a></li>
            <li class="breadcrumb-item"><a href="{{route('nguoidung.index')}}">Người dùng</a></li>
            <li class="breadcrumb-item active text-dark" aria-current="page">Thêm mới</li>
        </ol>
    </nav>

    <!-- Page Heading -->
    <div class="text-center">
        <h1 class="h3 mb-2 text-dark">Thêm mới người dùng</h1>
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
            <form action="{{route('nguoidung.store')}}" method="POST">
                @csrf
                <div class="form-row">
                    <div class="col-md-5">
                        <label for="text" class="text-dark">Tên người dùng:</label>
                        <input required type="text" class="form-control {{ $errors->has('tenND') ? ' is-invalid' : '' }}" id="text" name="tenND">
                        @if ($errors->has('tenND'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('tenND') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="col-md-7">
                        <label for="text" class="text-dark">Email:</label>
                        <input required type="email" class="form-control {{ $errors->has('email') ? ' is-invalid' : '' }}" id="text" name="email">
                        @if ($errors->has('email'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="form-group">
                    <label for="text" class="text-dark">Password:</label>
                    <input required type="password" class="form-control {{ $errors->has('password') ? ' is-invalid' : '' }}" id="text" name="password">
                    @if ($errors->has('password'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="form-group">
                    <label for="text" class="text-dark">Địa chỉ:</label>
                    <input required type="text" class="form-control {{ $errors->has('diaChi') ? ' is-invalid' : '' }}" id="text" name="diaChi">
                    @if ($errors->has('diaChi'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('diaChi') }}</strong>
                        </span>
                    @endif
                </div>
                <fieldset class="form-group mt-4">
                    <div class="row">
                        <legend class="col-form-label col-sm-3 pt-0">Giới tính: </legend>
                        <div class="col-sm-9">
                            <div class="row">
                                <div class="form-check col-md-2">
                                    <input class="form-check-input" type="radio" name="gioiTinh" id="gridRadios1" value="1" checked>
                                    <label class="form-check-label" for="gridRadios1">
                                        Nam
                                    </label>
                                </div>
                                <div class="form-check col-md-2">
                                    <input class="form-check-input" type="radio" name="gioiTinh" id="gridRadios2" value="0">
                                    <label class="form-check-label" for="gridRadios2">
                                        Nữ
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                </fieldset>
                <div class="form-group">
                    <label for="text" class="text-dark">Ngày sinh:</label>
                    <input required type="date" class="form-control {{ $errors->has('ngaySinh') ? ' is-invalid' : '' }}" id="text" name="ngaySinh">
                    @if ($errors->has('ngaySinh'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('ngaySinh') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="form-row">
                    <div class="col">
                        <label for="text" class="text-dark">Số điện thoại:</label>
                        <input required type="text" class="form-control {{ $errors->has('sDT') ? ' is-invalid' : '' }}" id="text" name="sDT">
                        @if ($errors->has('sDT'))
                            <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('sDT') }}</strong>
                        </span>
                        @endif
                    </div>
                    <div class="col">
                        <label for="text" class="text-dark">Quyền:</label>
                        <select name="MaLND" class="form-control" required>
                            @foreach($loainds as $loaind)
                                <option value="{{$loaind->MaLND}}">{{$loaind->TenLoai}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="form-group" style="margin-top: 1em;">
                    <button type="submit" class="btn btn-primary">Thêm</button>
                    <a href="{{ route('nguoidung.index')}}" class="text-blue-800">Quay lại</a>
                </div>
            </form>
        </div>
    </div>

@endsection
