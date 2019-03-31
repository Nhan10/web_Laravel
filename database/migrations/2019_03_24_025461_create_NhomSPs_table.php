<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNhomSPsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('NhomSP', function (Blueprint $table) {
            $table->bigIncrements('MaNSP');
            $table->string('TenNSP');
            $table->unsignedBigInteger('MaDM');
            $table->foreign('MaDM')
                ->references('MaDM')->on('DanhMucSP')
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
        Schema::dropIfExists('nhom_s_ps');
    }
}
