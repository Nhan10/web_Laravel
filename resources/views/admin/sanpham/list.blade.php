@extends('admin.layouts.master')
@section('content')

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Admin</a></li>
            <li class="breadcrumb-item active text-dark" aria-current="page">Sản phẩm</li>
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
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{ session('error') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <a href="{{Route('sanpham.create')}}" class="m-0 font-weight-bold btn btn-success">Thêm mới</a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered text-dark" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                    <tr>
                        <th>Mã sản phẩm</th>
                        <th>Hình ảnh</th>
                        <th>Tên sản phẩm</th>
                        <th>Giá</th>
                        <th>Số lượng</th>
                        <th>Thao tác</th>
                    </tr>
                    </thead>
                    <tbody>

                    @foreach($sanphams as $sanpham)
                        <tr>
                            <th>{{$sanpham->MaSP}}</th>
                            <th>
                                @if(isset($sanpham->hinhAnhs[0]->DuongDan))
                                <img src="{{asset('storage/'.$sanpham->hinhAnhs[0]->DuongDan)}}" width="80px">
                                @else
                                Không có hình ảnh
                                @endif
                            </th>
                            <th>{{$sanpham->TenSP}}</th>
                            <th>{{$sanpham->Gia}}</th>
                            <th>{{$sanpham->SoLuong}}</th>
                            <th>
                                <a href="{{route('sanpham.show',$sanpham->MaSP)}}" class="btn btn-outline-info"><i class="fas fa-info-circle"></i></a>
                                <a href="{{route('sanpham.edit',$sanpham->MaSP)}}" class="btn btn-facebook"><i class="fas fa-edit"></i></a>
                                <form class="d-inline" action="{{route('sanpham.destroy',$sanpham->MaSP)}}" method="post">
                                    @method('DELETE')
                                    @csrf
                                    <button class="btn btn-danger"><i style="color: #ffffff" class="fa fa-trash">  </i></button>
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