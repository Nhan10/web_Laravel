@extends('admin.layouts.master')
@section('content')

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Admin</a></li>
            <li class="breadcrumb-item"><a href="{{route('sanpham.index')}}">Sản phẩm</a></li>
            <li class="breadcrumb-item active text-dark" aria-current="page">Sửa</li>
        </ol>
    </nav>

    <!-- Page Heading -->
    <div class="text-center">
        <h1 class="h3 mb-2 text-dark">Sửa sản phẩm {{$sanpham->TenSP}}</h1>
    </div>

    <div class="row">
        <div class="col-md-6 offset-md-3">
            @if ($errors->any())
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif
            <form action="{{route('sanpham.update',$sanpham->MaSP)}}" enctype="multipart/form-data" method="POST">
                @method('PUT')
                @csrf
                <div class="form-group">
                    <label for="text" class="text-dark">Mã loại:</label>
                    <select class="custom-select" name="maLoai" >
                        @foreach($loaiSPs as $loaisp)
                            <option value="{{$loaisp->MaLoai}}"
                                    @if(old($loaisp->MaLoai, isset($sanpham) ? $sanpham->MaLoai : '') == $loaisp->MaLoai)
                                    selected="selected"
                                    @endif
                            >{{$loaisp->TenLoai}}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="text" class="text-dark">Tên sản phẩm:</label>
                    <input required type="text" class="form-control" id="text" value="{{$sanpham->TenSP}}" name="tenSP">
                </div>

                <div class="form-group">
                    <label for="text" class="text-dark">Giá:</label>
                    <input required type="number" class="form-control" id="text" value="{{$sanpham->Gia}}" name="gia">
                </div>

                <div class="form-group">
                    <label for="text" class="text-dark">Mã tác giả:</label>
                    <select class="custom-select" name="maTG" >
                        @foreach($tacGias as $tacGia)
                            <option value="{{$tacGia->MaTG}}"
                                    @if(old($tacGia->MaTG, isset($sanpham) ? $sanpham->MaTG : '') == $tacGia->MaTG)
                                    selected="selected"
                                    @endif
                            >{{$tacGia->TenTG}}</option>
                        @endforeach
                    </select>
                </div>
                
                <div class="form-group">
                    <label for="text" class="text-dark">Mô tả:</label>
                    <textarea name="moTa" class="form-control" id="" cols="30" rows="10" required>{{$sanpham->MoTa}}</textarea>
                </div>
                <div class="form-group">
                    <label for="text" class="text-dark">Số trang:</label>
                    <input required type="number" class="form-control" id="text" value="{{$sanpham->SoTrang}}" name="soTrang">
                </div>
                <div class="form-group">
                    <label for="text" class="text-dark">Loại bìa:</label>
                    <input required type="text" class="form-control" id="text" value="{{$sanpham->LoaiBia}}" name="loaiBia">
                </div>
                <div class="form-group">
                    <label for="text" class="text-dark">Kích thước:</label>
                    <input required type="text" class="form-control" id="text" value="{{$sanpham->KichThuoc}}" name="kichThuoc">
                </div>
                <div class="form-group">
                    <label for="text" class="text-dark">Cân nặng:</label>
                    <input required type="number" class="form-control" id="text" value="{{$sanpham->CanNang}}" name="canNang">
                </div>
                <div class="form-group">
                    <label for="text" class="text-dark">Ngôn ngữ:</label>
                    <input required type="text" class="form-control" id="text" value="{{$sanpham->NgonNgu}}" name="ngonNgu">
                </div>
                <div class="form-group">
                    <label for="text" class="text-dark">Nhà xuất bản:</label>
                    <input required type="text" class="form-control" id="text" value="{{$sanpham->NXB}}" name="nXB">
                </div>
                <div class="form-group">
                    <label for="text" class="text-dark">Năm xuất bản:</label>
                    <input required type="number" class="form-control" id="text" value="{{$sanpham->NamXB}}" name="namXB">
                </div>
                <div class="form-group">
                    <label for="text" class="text-dark">Dịch giả:</label>
                    <input required type="text" class="form-control" id="text" value="{{$sanpham->DichGia}}" name="dichGia">
                </div>
                <div class="form-group">
                    <label for="text" class="text-dark">Hình ảnh:</label>
                    <input type="file" name="file_upload[]" multiple class="form-control">
                </div>

                <button type="submit" class="btn btn-primary">Sửa</button>
                <a href="{{ route('sanpham.index')}}" class="text-blue-800">Quay lại</a>
            </form>
        </div>
    </div>

@endsection
