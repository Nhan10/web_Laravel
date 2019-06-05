<div class="table-responsive">
    <table class="table table-bordered text-dark" id="dataTable" width="100%" cellspacing="0">
        <thead>
        <tr>
            <th>Mã đơn hàng</th>
            <th>Tên người nhận</th>
            <th>Địa chỉ</th>
            <th>Số điện thoại</th>
            <th>Ngày đặt</th>
            <th>Tổng tiền</th>
            <th>NV giao hàng</th>
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
                <th>{{ number_format($dh->TongTien) }}đ</th>
                @if($dh->nguoiDungNVGH)
                    <th>{{$dh->nguoiDungNVGH->TenND}}</th>
                @else
                    <th>error 404</th>
                @endif
                <th>{{$dh->trangthai->TenTT}}</th>
                <th>
                    <a href="">Chi tiết</a>
                    <a href="" class="btn btn-primary" data-toggle="modal" data-target="#myModal-{{$dh->MaDH}}">Thay NV giao hàng</a>
                    <!-- The Modal -->
                    <div class="modal fade" id="myModal-{{$dh->MaDH}}">
                        <div class="modal-dialog">
                            <div class="modal-content">

                                <!-- Modal Header -->
                                <div class="modal-header">
                                    <h4 class="modal-title">Chỉnh sửa đơn hàng số: {{$dh->MaDH}}</h4>
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                </div>

                                <form action="{{route('donhang.updatexuly',$dh->MaDH)}}" method="post">
                                @csrf
                                @method('PUT')
                                <!-- Modal body -->
                                    <div class="modal-body">
                                        <div class="form-group">
                                            <label for="nvgh" class="col-6">Chọn nhân viên giao đơn hàng:</label>
                                            <select name="MaNVGH" id="nvgh" class="form-control col-6">
                                                @foreach($nhanviengiaohangs as $nvgh)
                                                    <option value="{{$nvgh->MaND}}"
                                                            @if(old($nvgh->MaND, isset($dh) ? $dh->MaNVGH : '') == $nvgh->MaND)
                                                            selected="selected"
                                                            @endif
                                                    >{{$nvgh->TenND}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <!-- Modal footer -->
                                    <div class="modal-footer">
                                        <button type="submit" class="btn btn-primary">Cập nhật</button>
                                        <button type="button" class="btn btn-danger" data-dismiss="modal">Đóng</button>
                                    </div>

                                </form>
                            </div>
                        </div>
                    </div>
                    <!-- END Modal -->
                </th>
            </tr>
        @endforeach

        </tbody>
    </table>
</div>