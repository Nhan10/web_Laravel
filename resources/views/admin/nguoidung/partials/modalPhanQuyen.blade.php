
<!-- Modal -->
<div class="modal fade" id="exampleModal-{{ $nguoidung->MaND }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Phân quyền</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="" method="post">
                    @csrf
                    @method('put')
                    <div class="form-group">
                        <select name="MaLND" class="form-control">
                            @foreach($loainds as $loaind)
                                <option value="{{$loaind->MaLND}}">{{$loaind->TenLoai}}</option>
                            @endforeach
                        </select>
                    </div>
                </form>
                <a href="">{{$nguoidung->email}}</a>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>
</div>