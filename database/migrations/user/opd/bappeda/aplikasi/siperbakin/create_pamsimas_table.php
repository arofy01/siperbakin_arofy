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
        Schema::connection('mysql_siperbakin')->create('pamsimas', function (Blueprint $table) {
            $table->id();

            $table->string('kode_kecamatan')->nullable();
            $table->string('kode_desa')->nullable();
            $table->string('pengelola')->nullable();

            $table->string('jumlah_penduduk_kk')->nullable();
            $table->string('jumlah_penduduk_jiwa')->nullable(); 
            $table->string('target_pemanfaatan_sr')->nullable();
            $table->string('target_pemanfaatan_kk')->nullable();
            $table->string('target_pemanfaatan_jiwa')->nullable();
            $table->string('jumlah_terlayani_sr')->nullable();
            $table->string('jumlah_terlayani_kk')->nullable();
            $table->string('jumlah_terlayani_jiwa')->nullable();
            $table->string('jumlah_belum_terlayani_sr')->nullable();
            $table->string('jumlah_belum_terlayani_kk')->nullable();
            $table->string('jumlah_belum_terlayani_jiwa')->nullable();




            $table->string('latitude')->nullable();
            $table->string('longitude')->nullable();
            $table->string('berfungsi')->nullable();
            $table->string('permasalahan')->nullable();
            $table->string('kapasitas_terpasang')->nullable();
            $table->string('kapasitas_produksi')->nullable();
            $table->string('jam_operasi')->nullable();
            $table->string('tahun_pembangunan')->nullable();
            $table->string('jumlah_anggaran')->nullable();
            $table->string('kondisi_eksisting')->nullable();
            $table->string('sumber_air')->nullable();
            $table->string('rencana_pengembangan')->nullable();
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
        Schema::connection('mysql_siperbakin')->dropIfExists('pamsimas');
    }
};
