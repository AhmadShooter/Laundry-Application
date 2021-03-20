<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCartTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cart', function (Blueprint $table) {
            $table->id();
            $table->string('kode_invoice');
            $table->dateTime('date');
            $table->foreign('id_outlet')->references('id')->on('tb_outlet');
            $table->unsignedBigInteger('id_outlet');
            $table->date('pay_date');
            $table->date('deadline');
            $table->foreign('id_paket')->references('id')->on('tb_paket');
            $table->unsignedBigInteger('id_paket');
            $table->integer('weight');
            $table->integer('sub_total');
            $table->foreign('id_user')->references('id')->on('users');
            $table->unsignedBigInteger('id_user');
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
        Schema::dropIfExists('cart');
    }
}
