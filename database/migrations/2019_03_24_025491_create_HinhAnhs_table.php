<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHinhAnhsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('HinhAnh', function (Blueprint $table) {
            $table->bigIncrements('MaHA');
            $table->unsignedBigInteger('MaSP');
            $table->foreign('MaSP')
                ->references('MaSP')->on('SanPham')
                ->onDelete('cascade');
            $table->string('DuongDan');
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
        Schema::dropIfExists('hinh_anhs');
    }
}
