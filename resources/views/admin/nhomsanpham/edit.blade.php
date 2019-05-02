@extends('admin.layouts.master')
@section('content')

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Admin</a></li>
            <li class="breadcrumb-item"><a href="{{route('nhomsanpham.index')}}">Nhóm sản phẩm</a></li>
            <li class="breadcrumb-item active text-dark" aria-current="page">Sửa</li>
        </ol>
    </nav>

    <!-- Page Heading -->
    <div class="text-center">
        <h1 class="h3 mb-2 text-dark">Sửa nhóm sản phẩm {{$nhomsp->TenNSP}}</h1>
    </div>

    <div class="row">
        <div class="col-md-6 offset-md-3">
            <form action="{{route('nhomsanpham.update',$nhomsp->MaNSP)}}" method="POST">
                @method('PUT')
                @csrf
                <div class="form-group">
                    <label for="text" class="text-dark">Tên nhóm:</label>
                    <input required type="text" class="form-control {{ $errors->has('tenNSP') ? ' is-invalid' : '' }}" id="text" value="{{$nhomsp->TenNSP}}" name="tenNSP">
                    @if ($errors->has('tenNSP'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('tenNSP') }}</strong>
                        </span>
                    @endif
                </div>

                <div class="form-group">
                    <label for="text" class="text-dark">Danh mục:</label>
                    <select class="form-control" name="maDM" >
                        @foreach($danhmucs as $danhmuc)
                            <option value="{{$danhmuc->MaDM}}"
                                    @if(old($danhmuc->MaDM, isset($nhomsp) ? $nhomsp->MaDM : '') == $danhmuc->MaDM)
                                    selected="selected"
                                    @endif
                            >{{$danhmuc->TenDM}}</option>
                        @endforeach
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Sửa</button>
                <a href="{{ route('nhomsanpham.index')}}" class="text-blue-800">Quay lại</a>
            </form>
        </div>
    </div>

@endsection
