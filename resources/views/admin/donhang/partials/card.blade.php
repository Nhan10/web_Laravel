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
                {{--<th>{{$dh->nguoiDungnvgh->TenND}}</th>--}}
                <th>{{$dh->trangthai->TenTT}}</th>
                <th><a href="">Chi tiết</a></th>
            </tr>
        @endforeach

        </tbody>
    </table>
</div>