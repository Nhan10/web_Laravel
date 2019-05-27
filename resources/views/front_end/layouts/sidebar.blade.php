<div class="side_bar">
    <div class="row">
        <div class="col-md-3">
            {{--<ul class="nav flex-column nav_sidebar row">--}}
                {{--<li class="nav-link" style="background-color: #1a87f4; color: white; text-align: center; font-weight: bold;font-size: large"--}}
                {{-->Danh Mục</li>--}}
                    {{--@foreach($nhomsps as $nhomsp)--}}
                    {{--<!-- Default dropright button -->--}}
                    {{--<li class="nav-item dropright" style="border-bottom: 1px solid #1a87f4">--}}
                        {{--<a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">--}}
                            {{--{{$nhomsp->TenNSP}}--}}
                        {{--</a>--}}
                        {{--<div class="dropdown-menu">--}}
                                {{--@foreach($nhomsp->loaiSPs as $loaisps1)--}}
                            {{--<a class="nav-link" href="#" style="border-bottom: 1px solid #1a87f4">{{$loaisps1->TenLoai}}</a>--}}
                                {{--@endforeach--}}
                        {{--</div>--}}
                    {{--</li>--}}
                    {{--@endforeach--}}
            {{--</ul>--}}
            <style>
                #mainnav{
                    transition: all 0.3s;
                }
                #mainnav ul{
                    list-style: none;
                    padding: 0px;
                    width: 100%;
                    text-align: left;
                    border: 2px solid #1a87f4;
                }
                #mainnav ul li{
                    position: relative;
                    width: 100%;
                    height: 40px;
                    line-height: 40px;
                    border-bottom: 1px solid #1a87f4;
                }
                #mainnav ul .thefirst{
                    background: #1a87f4;
                    text-align: center;
                }
                #mainnav ul .thefirst a{
                    color: #fff;
                }

                #mainnav ul li a{
                    text-decoration: none;
                    color: #1a87f4;
                    font-weight: bold;
                    padding: 0 16px;
                    display: block;
                }
                #mainnav li a:hover{
                    background: #1a87f4;
                    color: #fff;
                }
                #mainnav .sub-menu{
                    position: absolute;
                    left: 100%;
                    top: 0px;
                    width: 100%;
                    display: none;
                    text-align: left;
                    border-left: 1px solid #1a87f4;
                    font-size: 90%;
                    border-radius: 0px 10px 10px 0px;
                    z-index: 1;
                }
                #mainnav li:hover .sub-menu{
                    display: block;
                    background: #fff;
                    color: red;
                }
                #mainnav .sub-menu2{
                    position: absolute;
                    left: 100%;
                    top: 0;
                    width: 100%;
                    border-left: 1px solid #1a87f4;
                    border-radius: 0px 10px 10px 0px;
                    display: none;
                    z-index: 1;
                    background: #fff;
                }
                #mainnav .sub-menu li:hover .sub-menu2{
                    display: block;
                }
                #mainnav .sub-menu3{
                    position: absolute;
                    left: 100%;
                    top: 0;
                    width: 100%;
                    border-left: 1px solid #1a87f4;
                    border-radius: 0px 10px 10px 0px;
                    display: none;
                    z-index: 2;
                    background: #fff;
                }
                #mainnav .sub-menu2 li:hover .sub-menu3{
                    display: block;
                }
            </style>
            <div id="mainnav" class="row">
                <ul>
                    <li class="thefirst"><a href="#">DANH MỤC</a></li>
                    @foreach($danhmucspComposer as $danhmucsp)
                    <li><a href="{{route('home.categoryDanhmuc',$danhmucsp->MaDM)}}">{{$danhmucsp->TenDM}}</a>
                        <ul class="sub-menu">
                            @foreach($danhmucsp->nhomSPs as $nhomsp)
                                <li><a href="{{route('home.categoryNhoms',[$nhomsp->MaNSP])}}">{{$nhomsp->TenNSP}}</a>
                                    <ul class="sub-menu2">
                                        @foreach($nhomsp->loaiSPs as $loaisp)
                                        <li><a href="{{route('home.categoryLoais',[$loaisp->MaLoai,$loaisp->MaNSP])}}">{{$loaisp->TenLoai}}</a></li>
                                        @endforeach
                                    </ul>
                                </li>
                            @endforeach
                            {{--<li><a href="#">Wordpress</a>--}}
                                {{--<ul class="sub-menu2">--}}
                                    {{--<li><a href="#">item 1</a></li>--}}
                                    {{--<li><a href="#">item 2</a></li>--}}
                                    {{--<li><a href="#">item 3</a></li>--}}
                                {{--</ul>--}}
                            {{--</li>--}}
                            {{--<li><a href="#">Hosting-Domain</a></li>--}}
                            {{--<li><a href="#">SEO</a></li>--}}
                            {{--<li><a href="#">Tai nguyen</a></li>--}}
                            {{--<li><a href="#">Ma nguon mo</a></li>--}}
                            {{--<li><a href="#">Web development</a></li>--}}
                            {{--<li><a href="#">Cong cu</a>--}}
                                {{--<ul class="sub-menu2">--}}
                                    {{--<li><a href="#"> item 1</a></li>--}}
                                    {{--<li><a href="#"> item 2</a>--}}
                                        {{--<ul class="sub-menu3">--}}
                                            {{--<li><a href="#">item 1.a</a></li>--}}
                                            {{--<li><a href="#">item 2.a</a></li>--}}
                                            {{--<li><a href="#">item 3.a</a></li>--}}
                                        {{--</ul>--}}
                                    {{--</li>--}}
                                    {{--<li><a href="#">item 3</a></li>--}}
                                {{--</ul>--}}
                            {{--</li>--}}
                        </ul>
                    </li>
                    @endforeach
                    {{--<li><a href="#">Danh gia</a></li>--}}
                    {{--<li><a href="#">Ma giam gia</a></li>--}}
                    {{--<li><a href="#">Hoi dap</a></li>--}}
                    {{--<li><a href="#">Bat dau</a></li>--}}
                </ul>
            </div>
        </div>
        <div class="col-md-9">
            <div id="slide_top" class="carousel slide row" data-ride="carousel">

                <!-- Indicators -->
                <ul class="carousel-indicators">
                    <li data-target="#slide_top" data-slide-to="0" class="active"></li>
                    <li data-target="#slide_top" data-slide-to="1"></li>
                    <li data-target="#slide_top" data-slide-to="2"></li>
                </ul>

                <!-- The slideshow -->
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="{{asset('image/slide1.png')}}" alt="">
                    </div>
                    <div class="carousel-item">
                        <img src="{{asset('image/slide2.png')}}" alt="">
                    </div>
                    <div class="carousel-item">
                        <img src="{{asset('image/slide3.png')}}" alt="">
                    </div>
                </div>

                <!-- Left and right controls -->
                <a class="carousel-control-prev" href="#slide_top" data-slide="prev">
                    <span class="carousel-control-prev-icon"></span>
                </a>
                <a class="carousel-control-next" href="#slide_top" data-slide="next">
                    <span class="carousel-control-next-icon"></span>
                </a>

            </div>
        </div>
    </div>
</div>