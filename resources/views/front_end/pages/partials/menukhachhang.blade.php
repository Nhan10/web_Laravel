<div class="col-md-3 p-0">
    <div class="profiles">
        <p class="image"><img src="https://salt.tikicdn.com/desktop/img/avatar.png?v=3" height="45" width="45" alt=""></p>
        <p class="name">Tài khoản của</p>
        <h6>{{$nguoidung->TenND}}</h6>
    </div>
    <div class="menu-nd">
        <ul>
            <li>
                <a href="{{route('nguoidung.cntt')}}"><i class="fa fa-user"></i> <span>Thông tin tài khoản</span></a>
            </li>
            <li class="">
                <a href="{{route('nguoidung.qldh')}}"> <i class="fas fa-shopping-cart"></i> <span>Quản lý đơn hàng</span></a>
            </li>
            <li class="">
                <a href="{{route('nguoidung.dmk')}}"> <i class="fas fa-key"></i> <span>Đổi mật khẩu</span></a>
            </li>


            <li class="hidden-md hidden-lg">
                <a href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                    <i class="fas fa-sign-out-alt"></i>
                    <span>Thoát tài khoản</span></a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </li>

        </ul>
    </div>
</div>