<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return redirect()->route('home.index');
});

//Route::any('{all?}','front_end\HomeController@error404')->where('all','.*');

Route::get('/404', 'front_end\HomeController@error404')->name('home.404');
Route::get('/trangchu','front_end\HomeController@Home')->name('home.index');
Route::get('/sanpham/{MaSP}','front_end\HomeController@detailSanPham')->name('home.detail');
Route::get('/trangchu/timkiem}','front_end\HomeController@search')->name('home.search');

Route::get('/theloai','front_end\HomeController@getCategory')->name('home.category');
Route::get('/danhmucsanpham/{key}','front_end\SearchController@getSanphamByDanhmuc')->name('home.categoryDanhmuc');
Route::get('/nhomsanpham/{key}','front_end\SearchController@getSanphamTheoNhom')->name('home.categoryNhoms');
Route::get('/loaisanpham/{key}/{key2}','front_end\SearchController@getSanphamTheoLoai')->name('home.categoryLoais');

Route::get('/timkiemtheoloai','front_end\SearchController@searchSanphamByloai')->name('home.searchbyloai');
Route::get('/timkiemtheonhom','front_end\SearchController@searchSanphamByNhom')->name('home.searchbynhom');

Route::get('/customer/account/edit','front_end\NguoiDungController@capNhapThongTinCaNhan')->name('nguoidung.cntt');
Route::post('/customer/account/edit/{MaND}','front_end\NguoiDungController@update')->name('nguoidung.cnttupdate');
Route::get('/customer/manager-order/history','front_end\NguoiDungController@getDonHang')->name('nguoidung.qldh');
Route::get('/customer/manager-order/history/view/{code}','front_end\NguoiDungController@getCTDonHang')->name('nguoidung.qldhct');
Route::get('/customer/account/change-password','front_end\NguoiDungController@getDoiMatKhau')->name('nguoidung.dmk');
Route::PUT('/customer/account/change-password/{MaND}','front_end\NguoiDungController@doiMatKhau')->name('nguoidung.dmksave');

//cart_route
Route::post('/addCart', 'front_end\CartController@store')->name('cart.add');
Route::get('/showCart', 'front_end\CartController@index')->name('cart.index');
Route::delete('/DeleteCart/{id}', 'front_end\CartController@destroy')->name('cart.destroy');
Route::get('/emptyCart', 'front_end\CartController@emptyCarts')->name('cart.empty');
Route::get('/cart-order', 'front_end\CartController@order')->name('cart.order');

//order_route
Route::get('/order', 'front_end\OrderController@index')->name('order.index');
Route::post('/order', 'front_end\OrderController@store')->name('order.store');

//active-with-admin
Route::get('/nguoidung/activation/{token}', 'NguoiDungController@userActivation');

Route::prefix('admin')->middleware('admin')->group(function (){

    Route::get('/index.html',function (){
        return view('admin.dashboard');
    })->name('admin.dashboard');

   Route::prefix('danhmuc')->group(function (){
       Route::get('/danhsach','DanhMucSPController@index')->name('danhmuc.index');
       Route::get('/create','DanhMucSPController@create')->name('danhmuc.create');
       Route::post('/create','DanhMucSPController@store')->name('danhmuc.store');
       Route::get('/edit/{MaDM}','DanhMucSPController@edit')->name('danhmuc.edit');
       Route::PUT('/edit/{MaDM}','DanhMucSPController@update')->name('danhmuc.update');
       Route::DELETE('/destroy/{MaDM}','DanhMucSPController@destroy')->name('danhmuc.destroy');
   });

   Route::prefix('nhomsanpham')->group(function (){
       Route::get('/danhsach','NhomSPController@index')->name('nhomsanpham.index');
       Route::get('/create','NhomSPController@create')->name('nhomsanpham.create');
       Route::post('/create','NhomSPController@store')->name('nhomsanpham.store');
       Route::get('/edit/{MaNSP}','NhomSPController@edit')->name('nhomsanpham.edit');
       Route::PUT('/edit/{MaNSP}','NhomSPController@update')->name('nhomsanpham.update');
       Route::DELETE('/destroy/{MaNSP}','NhomSPController@destroy')->name('nhomsanpham.destroy');
   });

    Route::prefix('loaisanpham')->group(function (){
        Route::get('/danhsach','LoaiSPController@index')->name('loaisanpham.index');
        Route::get('/create','LoaiSPController@create')->name('loaisanpham.create');
        Route::post('/create','LoaiSPController@store')->name('loaisanpham.store');
        Route::get('/edit/{MaLoai}','LoaiSPController@edit')->name('loaisanpham.edit');
        Route::PUT('/edit/{MaLoai}','LoaiSPController@update')->name('loaisanpham.update');
        Route::DELETE('/destroy/{MaLoai}','LoaiSPController@destroy')->name('loaisanpham.destroy');
    });

    Route::prefix('tacgia')->group(function (){
        Route::get('/danhsach','TacGiaController@index')->name('tacgia.index');
        Route::get('/create','TacGiaController@create')->name('tacgia.create');
        Route::post('/create','TacGiaController@store')->name('tacgia.store');
        Route::get('/edit/{MaTG}','TacGiaController@edit')->name('tacgia.edit');
        Route::PUT('/edit/{MaTG}','TacGiaController@update')->name('tacgia.update');
        Route::DELETE('/destroy/{MaTG}','TacGiaController@destroy')->name('tacgia.destroy');
    });

    Route::prefix('nhacungcap')->group(function (){
        Route::get('/danhsach','NhaCungCapController@index')->name('nhacungcap.index');
        Route::get('/create','NhaCungCapController@create')->name('nhacungcap.create');
        Route::post('/create','NhaCungCapController@store')->name('nhacungcap.store');
        Route::get('/edit/{MaNCC}','NhaCungCapController@edit')->name('nhacungcap.edit');
        Route::PUT('/edit/{MaNCC}','NhaCungCapController@update')->name('nhacungcap.update');
        Route::DELETE('/destroy/{MaNCC}','NhaCungCapController@destroy')->name('nhacungcap.destroy');
    });

    Route::prefix('sanpham')->group(function (){
        Route::get('/danhsach','SanPhamController@index')->name('sanpham.index');
        Route::get('/create','SanPhamController@create')->name('sanpham.create');
        Route::post('/create','SanPhamController@store')->name('sanpham.store');
        Route::get('/edit/{MaSP}','SanPhamController@edit')->name('sanpham.edit');
        Route::get('/show/{MaSP}','SanPhamController@show')->name('sanpham.show');
        Route::PUT('/edit/{MaSP}','SanPhamController@update')->name('sanpham.update');
        Route::DELETE('/destroy/{MaSP}','SanPhamController@destroy')->name('sanpham.destroy');
    });

    Route::prefix('nguoidung')->group(function (){
        Route::get('/danhsach','NguoiDungController@index')->name('nguoidung.index');
        Route::get('/create','NguoiDungController@create')->name('nguoidung.create');
        Route::post('/create','NguoiDungController@store')->name('nguoidung.store');
        Route::get('/edit/{MaND}','NguoiDungController@edit')->name('nguoidung.edit');
        Route::get('/show/{MaND}','NguoiDungController@show')->name('nguoidung.show');
        Route::PUT('/phanquyen/{MaND}','NguoiDungController@phanquyen')->name('nguoidung.phanquyen');
        Route::PUT('/edit/{MaSP}','NguoiDungController@update')->name('nguoidung.update');
        Route::DELETE('/destroy/{MaND}','NguoiDungController@destroy')->name('nguoidung.destroy');
    });
/*CHưa xong nhập hàng*/
    Route::prefix('nhaphang')->group(function (){
        Route::get('/danhsach','PhieuNhapController@index')->name('nhaphang.index');
        Route::get('/chonhang','PhieuNhapController@chonhang')->name('nhaphang.chonhang');
        Route::post('/nhaphangchitiet','PhieuNhapController@nhaphangct')->name('nhaphang.nhaphangct');
        Route::get('/xacnhan','PhieuNhapController@xacnhan')->name('nhaphang.xacnhan');
        Route::get('/huynhap','PhieuNhapController@huynhap')->name('nhaphang.huynhap');
        Route::get('/nhaphang','PhieuNhapController@store')->name('nhaphang.store');
        Route::get('/xoa',function (){
           Session()->flush();
        });
    });

    Route::prefix('donhang')->group(function (){
        Route::get('/danhsach','DonHangController@index')->name('donhang.index');
        Route::post('/timkiem','DonHangController@locTheoDieuKien')->name('donhang.loc');
        Route::PUT('/xulydonhang/{MaDH}','DonHangController@xulydonhang')->name('donhang.xuly');
        Route::PUT('/xuathang/{MaDH}','DonHangController@xuathang')->name('donhang.xuathang');
        Route::PUT('/giaohang/{MaDH}','DonHangController@giaohang')->name('donhang.giaohang');
        Route::get('/create','DonHangController@create')->name('donhang.create');
        Route::post('/create','DonHangController@store')->name('donhang.store');
        Route::get('/edit/{MaDHH}','DonHangController@edit')->name('donhang.edit');
        Route::PUT('/edit/{MaDHH}','DonHangController@update')->name('donhang.update');
        Route::DELETE('/destroy/{MaDHH}','DonHangController@destroy')->name('donhang.destroy');
    });

    Route::prefix('canhan')->group(function (){
        Route::get('/thongtincanhan','NguoiDungController@getthongtincanhan')->name('nguoidung.adminpagettcn');
        Route::PUT('/thongtincanhan/{code}','NguoiDungController@thongtincanhanUpdate')->name('nguoidung.adminpagettcnupdate');
        Route::get('/doimatkhau','NguoiDungController@getdoimatkhau')->name('nguoidung.adminpagedmk');
        Route::PUT('/doimatkhau/{code}','NguoiDungController@getdoimatkhauUpdate')->name('nguoidung.adminpagedmkupdate');
    });
});

Auth::routes();
Route::get('/user/activation/{token}', 'Auth\RegisterController@userActivation');

Route::get('/home', 'HomeController@index')->name('home');
