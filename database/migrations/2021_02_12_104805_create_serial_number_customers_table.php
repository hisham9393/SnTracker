<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSerialNumberCustomersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('serial_number_customers', function (Blueprint $table) {
            $table->id();
            $table->integer('serial_number_id')->unsigned()->index();
            $table->integer('customer_id')->unsigned()->index();
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
        Schema::dropIfExists('serial_number_customers');
    }
}
