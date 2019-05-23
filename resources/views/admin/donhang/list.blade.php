@extends('admin.layouts.master')
@section('content')

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Admin</a></li>
            <li class="breadcrumb-item active text-dark" aria-current="page">danh sách đơn hàng</li>
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
            <div class="col-md-4">
                <div class="form-row">
                    <label class="col-3 offset-1">Xem theo: </label>
                    <select name="key" class="form-control col-8 key">
                        <option value="1">Tất cả</option>
                        <option value="2">Đơn hàng đang xử lý</option>
                        <option value="3">Đơn hàng đã xử lý</option>
                        <option value="4">Đơn hàng đang giao</option>
                        <option value="5">Đơn hàng đã giao</option>
                        <option value="6">Đơn hàng đã hủy</option>
                        <option value="7">Đơn hàng đã trả lại</option>
                    </select>
                </div>
            </div>

            <a href="{{Route('donhang.index')}}" class="m-0 font-weight-bold btn btn-success">Danh sách đơn hàng</a>
        </div>
        <div class="card-body result">
            @include('admin.donhang.partials.card')
        </div>
    </div>
    <script src={{asset('admin/vendor/jquery/jquery.min.js')}}></script>
    <script type="text/javascript">
        $(document).ready(function () {
            $(".key").change(function(e) {
                e.preventDefault();
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                var key = $('select[name="key"]').val();
                // console.log(key);
                $.ajax(
                    {
                        url: "{{route('donhang.loc')}}",
                        method: "POST",
                        data: {'key': key},
                        datatype: "html",
                    }).done(function (data) {
                    $('.result').empty().html(data);
                }).fail(function(jqXHR, ajaxOptions, thrownError){
                    alert('No response from server');
                    console.log(jqXHR);
                });
            });
        });
    </script>
@endsection