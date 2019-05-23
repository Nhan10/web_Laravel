<div class="table-responsive">
    <table class="table table-bordered text-dark" id="dataTable" width="100%" cellspacing="0">
        <thead>
        <tr>
            <th>Mã đơn hàng</th>
            <th>Tên người nhận</th>
            <th>Địa chỉ</th>
            <th>Số điện thoại</th>
            <th>Ngày đặt</th>
            <th>Ngày giao</th>
            <th>Nhân viên giao hàng</th>
            <th>Trạng thái</th>
            <th>Thao tác</th>
        </tr>
        </thead>
        <tbody>

        @foreach($donhangs as $dh)
            <tr>
                <th>{{$dh->MaDH}}</th>
                <th>{{$dh->TenKH}}</th>
                <th>{{$dh->DiaChi}}</th>
                <th>{{$dh->SDT}}</th>
                <th>{{$dh->NgayDat}}</th>
                <th>{{$dh->NgayGiao}}</th>
                @if($dh->nguoiDungNVGH)
                    <th>{{$dh->nguoiDungNVGH->TenND}}</th>
                @else
                    <th>error 404</th>
                @endif
                <th>{{$dh->trangthai->TenTT}}</th>
                <th>
                    <a href="">Chi tiết</a>
                    <form action="{{route('donhang.xuathang',$dh->MaDH)}}" method="post">
                        @csrf
                        @method('PUT')
                        <input type="hidden" name="MaNVK" value="{{\Illuminate\Support\Facades\Auth::user()->MaND}}">
                        <button type="submit" class="btn btn-outline-primary"><i class="fas fa-dolly-flatbed"></i>Xuất hàng</button>
                    </form>

                </th>
            </tr>
        @endforeach

        </tbody>
    </table>
</div>