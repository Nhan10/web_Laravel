@extends('admin.layouts.master')
@section('content')

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Admin</a></li>
            <li class="breadcrumb-item active text-dark" aria-current="page">Loại sản phẩm</li>
        </ol>
    </nav>

    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif
    @if (session('error'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('error') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <a href="{{Route('loaisanpham.create')}}" class="m-0 font-weight-bold btn btn-danger">Thêm mới</a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered text-dark" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                    <tr>
                        <th>Mã loại</th>
                        <th>Tên loại</th>
                        <th>Tên nhóm</th>
                        <th>Thao tác</th>
                    </tr>
                    </thead>
                    <tbody>

                    @foreach($loaisps as $loaisp)
                        <tr>
                            <th>{{$loaisp->MaLoai}}</th>
                            <th>{{$loaisp->TenLoai}}</th>
                            <th>{{$loaisp->nhomSP->TenNSP}}</th>
                            <th>
                                <a href="{{route('loaisanpham.edit',$loaisp->MaLoai)}}" class="btn btn-facebook">Edit</a>
                                <form class="d-inline" action="{{route('loaisanpham.destroy',$loaisp->MaLoai)}}" method="post">
                                    @method('DELETE')
                                    @csrf
                                    <button class="btn btn-danger"><i style="color: #ffffff" class="fa fa-trash">  </i> Delete</button>
                                </form>
                            </th>
                        </tr>
                    @endforeach

                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection