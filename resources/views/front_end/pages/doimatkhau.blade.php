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
                <h1 class="have-margin container mb-0 mt-3">Đổi mật khẩu</h1>
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
                            <form action="{{route('nguoidung.dmksave',$nguoidung->MaND)}}" method="post">
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
                </div>
            </div>
        </div>
    </div>

@endsection