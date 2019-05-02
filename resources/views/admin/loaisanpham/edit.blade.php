@extends('admin.layouts.master')
@section('content')

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Admin</a></li>
            <li class="breadcrumb-item"><a href="{{route('loaisanpham.index')}}">Loại sản phẩm</a></li>
            <li class="breadcrumb-item active text-dark" aria-current="page">Sửa</li>
        </ol>
    </nav>

    <!-- Page Heading -->
    <div class="text-center">
        <h1 class="h3 mb-2 text-dark">Sửa nhóm sản phẩm {{$loaisp->TenLoai}}</h1>
    </div>

    <div class="row">
        <div class="col-md-6 offset-md-3">
            <form action="{{route('loaisanpham.update',$loaisp->MaLoai)}}" method="POST">
                @method('PUT')
                @csrf
                <div class="form-group">
                    <label for="text" class="text-dark">Tên loại:</label>
                    <input required type="text" class="form-control {{ $errors->has('tenLoai') ? ' is-invalid' : '' }}" id="text" value="{{$loaisp->TenLoai}}" name="tenLoai">
                    @if ($errors->has('tenLoai'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('tenLoai') }}</strong>
                        </span>
                    @endif
                </div>

                <div class="form-group">
                    <label for="text" class="text-dark">Nhóm sản phẩm:</label>
                    <select class="form-control" name="maNSP" >
                        @foreach($nhomsps as $nhomsp)
                            <option value="{{$nhomsp->MaNSP}}"
                                    @if(old($nhomsp->MaNSP, isset($loaisp) ? $loaisp->MaNSP : '') == $nhomsp->MaNSP)
                                    selected="selected"
                                    @endif
                            >{{$nhomsp->TenNSP}}</option>
                        @endforeach
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Sửa</button>
                <a href="{{ route('loaisanpham.index')}}" class="text-blue-800">Quay lại</a>
            </form>
        </div>
    </div>

@endsection
