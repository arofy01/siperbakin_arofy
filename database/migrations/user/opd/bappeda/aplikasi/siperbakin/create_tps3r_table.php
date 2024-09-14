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
        Schema::connection('mysql_siperbakin')->create('tps3r', function (Blueprint $table) {
            $table->id();

            $table->string('kode_kecamatan')->nullable();
            $table->string('kode_desa')->nullable();
            $table->string('pengelola')->nullable();
            $table->string('jumlah_penduduk_kk')->nullable();
            $table->string('jumlah_penduduk_jiwa')->nullable();
            $table->string('timbunan_sampah')->nullable();
            $table->string('kapasitas_tps3r')->nullable();
            $table->string('sampah_dikelola')->nullable();
            $table->string('sampah_belum_dikelola')->nullable();
            $table->string('kapasitas_tps3r_belum_digunakan')->nullable();
            $table->string('latitude')->nullable();
            $table->string('longitude')->nullable();
            $table->string('jarak_tps3r_ke_pemukiman')->nullable();
            $table->string('berfungsi')->nullable();
            $table->string('permasalahan')->nullable();
            $table->string('jam_operasi')->nullable();
            $table->string('tahun_pembangunan')->nullable();
            $table->string('jumlah_anggaran')->nullable();
            $table->string('kondisi_eksisting')->nullable();
            $table->string('rencana_pengembangan')->nullable();

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
        Schema::connection('mysql_siperbakin')->dropIfExists('tps3r');
    }
};
