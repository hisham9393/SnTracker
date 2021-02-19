<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductSerialNumberTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_serial_number', function (Blueprint $table) {
            $table->id();
            $table->integer('serial_number_id')->unsigned()->index();
            $table->integer('product_id')->unsigned()->index();
            $table->foreign('serial_number_id')->references('id')->on('serialNumbers')->onDelete('cascade');
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
        Schema::dropIfExists('product_serial_number');
    }
}
