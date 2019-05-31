@extends('admin.layouts.master')
@section('content')

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Admin</a></li>
            <li class="breadcrumb-item active text-dark" aria-current="page">Cá nhân</li>
            <li class="breadcrumb-item active text-dark" aria-current="page">Đổi mật khẩu</li>
        </ol>
    </nav>

    <!-- Page Heading -->
    <div class="text-center">
        <h1 class="h3 mb-2 text-dark">Đổi mật khẩu tài khoản " {{$nguoidung->TenND}} "</h1>
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
            <form action="{{route('nguoidung.adminpagedmkupdate',$nguoidung->MaND)}}" method="post">
                @csrf
                @method('PUT')
                <div class="form-group row">
                    <label for="inputpassword" class="col-sm-3 col-form-label">Mật khẩu cũ</label>
                    <div class="col-sm-9">
                        <input type="password" class="form-control {{ $errors->has('password') ? ' is-invalid' : '' }}" id="inputpassword" name="password" required>
                        @if ($errors->has('password'))
                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('password') }}</strong>
                                            </span>
                        @endif
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputnewpassword" class="col-sm-3 col-form-label">Mật khẩu mới</label>
                    <div class="col-sm-9">
                        <input type="password" class="form-control {{ $errors->has('newpassword') ? ' is-invalid' : '' }}" id="inputnewpassword" name="newpassword" required>
                        @if ($errors->has('newpassword'))
                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('newpassword') }}</strong>
                                            </span>
                        @endif
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputnewpassword_confirmation" class="col-sm-3 col-form-label">Nhập lại</label>
                    <div class="col-sm-9">
                        <input type="password" class="form-control" id="inputnewpassword_confirmation" name="newpassword_confirmation" required>
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
