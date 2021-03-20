
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TbDetailTransaksi extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_detail_transaksi', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_transaksi');
            $table->foreign('id_transaksi')->references('id')->on('tb_transaksi');
            $table->unsignedBigInteger('id_paket');
            $table->foreign('id_paket')->references('id')->on('tb_paket');
            $table->double('qty');
            $table->text('keterangan');
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
        Schema::dropIfExists('tb_detail_transaksi');
    }
}
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TbTransaksi extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::create('tb_transaksi', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_outlet');
            $table->foreign('id_outlet')->references('id')->on('tb_outlet');
            $table->string('kode_invoice');
            $table->unsignedBigInteger('id_member');
            $table->foreign('id_member')->references('id')->on('tb_member');
            $table->dateTime('tanggal', $precision = 0);
            $table->dateTime('batas_waktu', $precision = 0);
            $table->dateTime('tanggal_bayar', $precision = 0);
            $table->integer('biaya_tambahan');
            $table->double('diskon');
            $table->integer('pajak');
            $table->enum('status', ['baru', 'proses', 'selesai', 'diambil']);
            $table->enum('pembayaran', ['dibayar', 'belum_dibayar']);
            $table->unsignedBigInteger('id_user');
            $table->foreign('id_user')->references('id')->on('tb_user');
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
        Schema::dropIfExists('tb_transaksi');
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TbMember extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_member', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->text('alamat');
            $table->enum('jenis_kelamin', ['laki-laki', 'perempuan']);
            $table->string('telepon');
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
       Schema::dropIfExists('tb_member');
    }
}
