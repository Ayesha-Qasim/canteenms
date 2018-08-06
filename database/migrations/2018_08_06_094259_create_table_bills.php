<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableBills extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bill_infomation', function (Blueprint $table) {
            $table->string('ma_hoa_don')->primary();
            $table->integer('so_loai_san_pham');
            $table->dateTime('ngay_ban');
            $table->integer('tong_tien');
        });

        Schema::create('product_output', function (Blueprint $table) {
            $table->increments('stt');
            $table->string('ma_hoa_don');
            $table->unsignedInteger('ma_san_pham');
            $table->string('ten_san_pham');
            $table->string('ten_alias');
            $table->integer('so_luong_xuat');
            $table->integer('don_gia');
            $table->string('don_vi');
            $table->integer('thanh_tien');
            $table->foreign('ma_san_pham')->references('ma_san_pham')->on('product_infomation')->onDelete('CASCADE');
            $table->foreign('ma_hoa_don')->references('ma_hoa_don')->on('bill_infomation')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bill_infomation');
        Schema::dropIfExists('product_output');
    }
}
