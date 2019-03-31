<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePhieuNhapsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('PhieuNhap', function (Blueprint $table) {
            $table->bigIncrements('MaPN');
            $table->unsignedBigInteger('MaND');
            $table->foreign('MaND')
                ->references('MaND')->on('NguoiDung')
                ->onDelete('cascade');
            $table->dateTime('NgayNhap');
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
        Schema::dropIfExists('phieu_nhaps');
    }
}
