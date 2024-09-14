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
        Schema::connection('mysql_siperbakin')->create('airlimbahperkotaan', function (Blueprint $table) {
            $table->id();

            $table->string('kode_kecamatan')->nullable();
            $table->string('kode_desa')->nullable();
            $table->string('dusun')->nullable();
            $table->string('uraian')->nullable();
            $table->string('pengelola')->nullable();

            $table->string('jenis_sarana_infrastruktur')->nullable();
            $table->string('cakupan_layanan')->nullable(); 
            $table->string('berfungsi')->nullable();
            $table->string('sumber_dipa')->nullable();
            $table->string('pelaksanaan_dan_peluncuran')->nullable();
            $table->string('alokasi_anggaran')->nullable();
            $table->string('kondisi_eksisting')->nullable();

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
        Schema::connection('mysql_siperbakin')->dropIfExists('airlimbahperkotaan');
    }
};
