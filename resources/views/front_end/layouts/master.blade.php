@include('front_end.layouts.header')

<div class="container">
    <div id="header" class="container-fluid">
        <div class="navbar navbar-expand-md navbar-light navbar-laravel row">
            <p class="navbar-nav mr-auto">infor@bookstore.com | 0839158372</p>
            <a class="navbar-nav ml-auto" href="#">Blog</a>
            <a class="navbar-nav ml-2" href="#">Facebook</a>
        </div>

        {{--<div class="content_header row">--}}
            {{--<div class="col-md-3 logo">--}}
                {{--<a href="{{route('home.index')}}"><img src="{{asset('image/logo-white.png')}}" width="250" alt=""></a>--}}
            {{--</div>--}}
            {{--<div class="col-md-7 form-search">--}}
                {{--<form class="form-inline">--}}
                    {{--<input class="form-control mr-sm-2" style="width: 91%;  " type="search" placeholder="Search" aria-label="Search">--}}
                    {{--<button class="btn  my-2 my-sm-0" type="submit" style="border: 1px solid #ffffff;">--}}
                        {{--<i class="fa fa-search" style="color: #ffffff"></i>--}}
                    {{--</button>--}}
                {{--</form>--}}
            {{--</div>--}}
            {{--<div class="col-md-2">--}}
                {{--<div class="cart float-right">--}}
                    {{--<a href="{{route('cart.index')}}">--}}
                        {{--<i class="fas fa-shopping-cart" style="color: #ffffff"></i>--}}
                        {{--<sub class="total">{{Cart::getContent()->count()}}</sub>--}}
                    {{--</a>--}}
                {{--</div>--}}
            {{--</div>--}}
        {{--</div>--}}

        <nav class="navbar navbar-expand-md navbar-light navbar-laravel row content_header">
            <div class="container">
                <a class="navbar-brand" href="{{route('home.index')}}"><img src="{{asset('image/logo-white.png')}}" width="250" alt=""></a>

                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <form class="form-inline my-2 my-lg-0">
                        <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                        <button class="btn  my-2 my-sm-0" type="submit" style="border: 1px solid #ffffff;">
                            <i class="fa fa-search" style="color: #ffffff"></i>
                        </button>
                    </form>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}"  style="color:#fff;">{{ __('Đăng nhập') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}"  style="color:#fff;">{{ __('Đăng ký') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre  style="color:#fff;">
                                    {{ Auth::user()->TenND }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Đăng xuất') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('cart.index')}}">
                                <i class="fas fa-shopping-cart" style="color: #ffffff"></i>
                                <sub class="total">{{Cart::getContent()->count()}}</sub>
                            </a>
                        </li>
                    </ul>

                </div>
            </div>
        </nav>

    </div>



    <div id="main" class="container-fluid">

        @yield('content')

    </div>

    <div id="footer" class="container-fluid">
        <div class="row">
            <div class="col-md-6">
                <ul>
                    <li class="nav-link">21 Lê Duẩn Street Đà Nẵng, Việt Nam</li>
                    <li class="nav-link">01237281490</li>
                    <li class="nav-link">hovannhan.php@gmail.com</li>
                </ul>
            </div>
            <div class="col-md-6">
                <p>About the company</p>
                <p>bookstore.com nhận đặt hàng trực tuyến và giao hàng tận nơi. KHÔNG hỗ trợ đặt mua và nhận hàng trực tiếp tại văn phòng cũng như tất cả Hệ Thống Fahasa trên toàn quốc.</p>
                <p>
                    <a href="https://www.facebook.com/nhanFieuzinthewind" style="color: #ffffff"><i class="fab fa-facebook fa-3x"></i>&nbsp;</a>
                    <a href="" style="color: #ffffff"><i class="fab fa-twitter-square fa-3x"></i>&nbsp;</a>
                    <a href="https://github.com/Nhan10" style="color: #ffffff"><i class="fab fa-github fa-3x"></i>&nbsp;</a>
                    <a href="" style="color: #ffffff"><i class="fas fa-envelope fa-3x"></i></a>
                </p>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12 text-center">
                <p class="button-footer">Design by hovannhan.php@gmail.com</p>
            </div>
        </div>
    </div>
</div>
@include('front_end.layouts.footer')