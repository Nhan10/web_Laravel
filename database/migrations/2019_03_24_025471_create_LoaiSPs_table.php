<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLoaiSPsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('LoaiSP', function (Blueprint $table) {
            $table->bigIncrements('MaLoai');
            $table->string('TenLoai');
            $table->unsignedBigInteger('MaNSP');
            $table->foreign('MaNSP')
                ->references('MaNSP')->on('NhomSP')
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
        Schema::dropIfExists('loai_s_ps');
    }
}
