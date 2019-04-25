<div class="container-fluid side_bar">
    <div class="row">
        <div class="col-md-3">
            <ul class="nav flex-column nav_sidebar row">
                <li class="nav-link" style="background-color: #1a87f4; color: white; text-align: center; font-weight: bold;font-size: large"
                >Danh Mục</li>
                    @foreach($nhomsps as $nhomsp)
                    <!-- Default dropright button -->
                    <li class="nav-item dropright" style="border-bottom: 1px solid #1a87f4">
                        <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                            {{$nhomsp->TenNSP}}
                        </a>
                        <div class="dropdown-menu">
                                @foreach($nhomsp->loaiSPs as $loaisps1)
                            <a class="nav-link" href="#" style="border-bottom: 1px solid #1a87f4">{{$loaisps1->TenLoai}}</a>
                                @endforeach
                        </div>
                    </li>
                    @endforeach
            </ul>
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