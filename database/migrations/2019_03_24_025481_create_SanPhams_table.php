<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSanPhamsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('SanPham', function (Blueprint $table) {
            $table->bigIncrements('MaSP');
            $table->unsignedBigInteger('MaLoai');
            $table->foreign('MaLoai')
                ->references('MaLoai')->on('LoaiSP')
                ->onDelete('cascade');
            $table->string('TenSP');
            $table->double('Gia');
            $table->integer('SoLuong');
            $table->unsignedBigInteger('MaTG');
            $table->foreign('MaTG')
                ->references('MaTG')->on('TacGia')
                ->onDelete('cascade');
            $table->text('MoTa');
            $table->integer('SoTrang');
            $table->string('LoaiBia');
            $table->string('KichThuoc');
            $table->double('CanNang');
            $table->string('NgonNgu');
            $table->string('NXB');
            $table->year('NamXB');
            $table->string('DichGia');
            $table->unsignedBigInteger('MaNCC');
            $table->foreign('MaNCC')
                ->references('MaNCC')->on('NhaCungCap')
                ->onDelete('cascade');
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
        Schema::dropIfExists('san_phams');
    }
}
