<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::connection('mysql_siperbakin')->create('sanimas', function (Blueprint $table) {
            $table->id();

            $table->string('kode_kecamatan')->nullable();
            $table->string('kode_desa')->nullable();
            $table->string('tangki_septic')->nullable();
            $table->string('sambungan_rumah')->nullable();
            $table->string('jumlah_penduduk_kk')->nullable();
            $table->string('jumlah_penduduk_jiwa')->nullable();
            $table->string('latitude')->nullable();
            $table->string('longitude')->nullable();
            $table->string('permasalahan')->nullable();
            $table->string('tahun_pembangunan')->nullable();
            $table->string('jumlah_anggaran')->nullable();
            $table->string('kondisi_eksisting')->nullable();
            $table->string('jumlah_babs_kk')->nullable();
            $table->string('jumlah_babs_jiwa')->nullable();
            $table->string('memiliki_jamban_kk')->nullable();
            $table->string('memiliki_jamban_jiwa')->nullable();
            $table->string('tidak_memiliki_jamban_kk')->nullable();
            $table->string('tidak_memiliki_jamban_jiwa')->nullable();
            $table->string('rencana_pembangunan_tangki_septic')->nullable();
            $table->string('rencana_pembangunan_sambungan_rumah')->nullable();
            $table->string('keterangan')->nullable();

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
        Schema::connection('mysql_siperbakin')->dropIfExists('sanimas');
    }
};
