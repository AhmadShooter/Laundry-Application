<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransaksisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transaksis', function (Blueprint $table) {
            $table->id();
            $table->string('id_outlet');
            $table->string('kode_invoice');
            $table->string('id_member');
            $table->string('datetime');
            $table->string('jenis');
            $table->string('batas_waktu');
            $table->string('tgl_bayar');
            $table->string('biaya_tambahan');
            $table->string('diskon');
            $table->string('pajak');
            $table->string('sub_total');
            $table->string('ttl_harga');
            $table->string('status');
            $table->string('dibayar');
            $table->string('kembalian');
            $table->string('kekuragan');
            $table->string('id_user');
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
        Schema::dropIfExists('transaksis');
    }
}
