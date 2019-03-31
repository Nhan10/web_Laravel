<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCTDonHangsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('CTDonHang', function (Blueprint $table) {
            $table->bigIncrements('MaCTDH');
            $table->unsignedBigInteger('MaDH');
            $table->foreign('MaDH')
                ->references('MaDH')->on('DonHang')
                ->onDelete('cascade');
            $table->unsignedBigInteger('MaSP');
            $table->foreign('MaSP')
                ->references('MaSP')->on('SanPham')
                ->onDelete('cascade');
            $table->double('Gia');
            $table->integer('SoLuong');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('c_t_don_hangs');
    }
}
