@extends('front_end.layouts.master')
@section('content')
    <style>
        .menu-nd{
            background-color: #f4f4f4;
        }
        .menu-nd ul {
            list-style-type: none;
            margin: 0;
            padding: 0;
            width: 100%;
            background-color: #f1f1f1;
        }

        .menu-nd ul li a {
            display: block;
            color: #333;
            padding-top: 10px;
            padding-bottom: 10px;
            padding-left: 0;
            text-decoration: none;
        }

        .menu-nd ul li a.active {
            background-color: #f4f4f4;
            color: #333;
        }

        .menu-nd ul li a:hover:not(.active) {
            background-color: #c6c9c9;
            color: #333;
        }
        .menu-nd ul li a i{
            font-size: 18px;
            height: auto;
            text-align: center;
            width: 40px;
            margin: auto;
            color: #999;
        }
        .profiles{
            background: 0 0;
            padding: 10px 5px 5px;
            background-color: #f1f1f1;
            border-bottom: 1px solid #ffffff;
        }
        .profiles .image{
            width: 45px;
            height: 45px;
            overflow: hidden;
            float: left;
            margin-right: 10px;
            margin-bottom: 0;
        }
        .profiles .image img{
            border-radius: 50%;
        }
        .profiles .name{
            font-size: 13px;
            margin-bottom: 4px;
            color: #242424;
            margin-top: 4px;
            font-family: Roboto;
            font-weight: 300;
        }
        .profiles h6{
            margin: 0;
            font-family: Roboto;
            font-size: 16px;
            font-weight: 400;
            font-style: normal;
            font-stretch: normal;
            color: #242424;
        }
        .content-right{
            background-color: #f1f1f1;
        }
        .have-margin{
            margin-bottom: 15px;
            font-family: Roboto;
            font-size: 19px;
            font-weight: 300;
            font-style: normal;
            font-stretch: normal;
            color: #242424;

        }
    </style>
    <div class="row mt-2">
        @include('front_end.pages.partials.menukhachhang')
        <div class="col-md-9">
            <div class="content-right row  ml-0 p-0">
                <h1 class="have-margin container mb-0 mt-3">Thông tin tài khoản</h1>
                <div class="container">
                    <div class="row">
                        <div class="card rounded col-md-10 m-3 p-4 ">
                            @if (session('success'))
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    {{ session('success') }}
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            @endif
                            <form action="{{route('nguoidung.cnttupdate',$nguoidung->MaND)}}" method="post">
                                @csrf
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
                                    <div class="col-sm-3">Checkbox</div>
                                    <div class="col-sm-9">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" id="gridCheck1">
                                            <label class="form-check-label" for="gridCheck1">
                                                Example checkbox
                                            </label>
                                        </div>
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
                </div>
            </div>
        </div>
    </div>

@endsection