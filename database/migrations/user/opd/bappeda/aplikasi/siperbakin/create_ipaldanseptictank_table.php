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
        Schema::connection('mysql_siperbakin')->create('ipaldanseptictank', function (Blueprint $table) {
            $table->id();

            $table->string('kode_kecamatan')->nullable();
            $table->string('kode_desa')->nullable();
            $table->string('uraian')->nullable();
            $table->string('nilai_anggaran')->nullable();

            $table->string('jenis_ipal')->nullable();
            $table->string('kondisi')->nullable(); 
            $table->string('jumlah_tangki_septic')->nullable();
            $table->string('jumlah_sambungan_rumah')->nullable();
            

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
        Schema::connection('mysql_siperbakin')->dropIfExists('ipaldanseptictank');
    }
};
