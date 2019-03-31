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
    return redirect()->route('danhmuc.index');
});
Route::prefix('admin')->group(function (){

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

});
