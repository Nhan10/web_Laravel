@extends('admin.layouts.master')
@section('content')

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Admin</a></li>
            <li class="breadcrumb-item"><a href="{{route('danhmuc.index')}}">Danh mục</a></li>
            <li class="breadcrumb-item active text-dark" aria-current="page">Sửa</li>
        </ol>
    </nav>

    <!-- Page Heading -->
    <div class="text-center">
        <h1 class="h3 mb-2 text-dark">Sửa danh mục {{$danhmuc->TenDM}}</h1>
    </div>

    <div class="row">
        <div class="col-md-6 offset-md-3">
            <form action="{{route('danhmuc.update',$danhmuc->MaDM)}}" method="POST">
                @method('PUT')
                @csrf
                <div class="form-group">
                    <label for="text" class="text-dark">Tên danh mục:</label>
                    <input required type="text" class="form-control {{ $errors->has('tenDM') ? ' is-invalid' : '' }}" value="{{$danhmuc->TenDM}}" id="text" name="tenDM">
                    @if ($errors->has('tenDM'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('tenDM') }}</strong>
                        </span>
                    @endif
                </div>
                <button type="submit" class="btn btn-primary">Sửa</button>
                <a href="{{ route('danhmuc.index')}}" class="text-blue-800">Quay lại</a>
            </form>
        </div>
    </div>

@endsection
