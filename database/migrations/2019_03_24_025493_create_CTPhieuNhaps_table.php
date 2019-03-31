<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCTPhieuNhapsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('CTPhieuNhap', function (Blueprint $table) {
            $table->bigIncrements('MaCTPN');
            $table->unsignedBigInteger('MaPN');
            $table->foreign('MaPN')
                ->references('MaPN')->on('PhieuNhap')
                ->onDelete('cascade');
            $table->unsignedBigInteger('MaSP');
            $table->foreign('MaSP')
                ->references('MaSP')->on('SanPham')
                ->onDelete('cascade');
            $table->double('GiaNhap');
            $table->integer('SoLuong');
            $table->text('GhiChu');
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
        Schema::dropIfExists('c_t_phieu_nhaps');
    }
}
