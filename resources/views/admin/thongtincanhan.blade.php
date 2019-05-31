@extends('admin.layouts.master')
@section('content')

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Admin</a></li>
            <li class="breadcrumb-item active text-dark" aria-current="page">Cá nhân</li>
            <li class="breadcrumb-item active text-dark" aria-current="page">Thông tin cá nhân</li>
        </ol>
    </nav>

    <!-- Page Heading -->
    <div class="text-center">
        <h1 class="h3 mb-2 text-dark">Thông tin cá nhân " {{$nguoidung->TenND}} "</h1>
    </div>

    <div class="row">
        <div class="card rounded col-md-10 offset-1 p-4 ">
            @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif
            <form action="{{route('nguoidung.adminpagettcnupdate',$nguoidung->MaND)}}" method="post">
                @csrf
                @method('PUT')
                <div class="form-group row">
                    <label for="inputHoTen3" class="col-sm-3 col-form-label">Họ tên</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control {{ $errors->has('tenND') ? ' is-invalid' : '' }}" id="inputHoTen3" name="tenND" value="{{$nguoidung->TenND}}">
                        @if ($errors->has('tenND'))
                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('tenND') }}</strong>
                                            </span>
                        @endif
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputsdt3" class="col-sm-3 col-form-label">Số điện thoại</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control {{ $errors->has('sDT') ? ' is-invalid' : '' }}" id="inputsdt3" name="sDT" value="{{$nguoidung->SDT}}">
                        @if ($errors->has('sDT'))
                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('sDT') }}</strong>
                                            </span>
                        @endif
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-3 col-form-label">Email</label>
                    <div class="col-sm-9">
                        <input type="email" class="form-control" id="inputEmail3" value="{{$nguoidung->email}}" disabled>
                    </div>
                </div>
                <fieldset class="form-group">
                    <div class="row">
                        <legend class="col-form-label col-sm-3 pt-0">Giới tính</legend>
                        <div class="col-sm-9">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="gioiTinh" id="gridRadios1" value="1" {{$nguoidung->GioiTinh == true ? 'checked' : ' '}}>
                                <label class="form-check-label" for="gridRadios1">
                                    Nam
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="gioiTinh" id="gridRadios2" value="0" {{$nguoidung->GioiTinh == false ? 'checked' : ' '}}>
                                <label class="form-check-label" for="gridRadios2">
                                    Nữ
                                </label>
                            </div>
                        </div>
                    </div>
                </fieldset>
                <div class="form-group row">
                    <label for="inputngaysinh" class="col-sm-3 col-form-label">Ngày sinh</label>
                    <div class="col-sm-9">
                        <input type="date" class="form-control" name="ngaySinh" value="{{$nguoidung->NgaySinh}}" id="inputngaysinh">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputdd" class="col-sm-3 col-form-label">Địa chỉ</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control {{ $errors->has('diaChi') ? ' is-invalid' : '' }}" id="inputdd" name="diaChi" value="{{$nguoidung->DiaChi}}">
                        @if ($errors->has('diaChi'))
                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('diaChi') }}</strong>
                                            </span>
                        @endif
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-sm-9 offset-3">
                        <button type="submit" class="btn btn-primary py-2 px-4">Cập nhật</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

@endsection
