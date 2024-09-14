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
        Schema::connection('mysql_siperbakin')->create('wtp', function (Blueprint $table) {
            $table->id();

            $table->string('kode_kecamatan')->nullable();
            $table->string('nama_spam')->nullable();
            $table->string('pengelola')->nullable();

            $table->string('latitude')->nullable();
            $table->string('longitude')->nullable(); 
            $table->string('berfungsi')->nullable();
            $table->string('permasalahan')->nullable();
            $table->string('jam_operasi')->nullable();
            $table->string('kapasitas_terpasang')->nullable();
            $table->string('kapasitas_produksi')->nullable();
            $table->string('kapasitas_distribusi')->nullable();
            $table->string('kapasitas_air_terjual')->nullable();
            $table->string('kapasitas_belum_terpakai')->nullable();
            $table->string('kehilangan_air')->nullable();




            $table->string('sr')->nullable();
            $table->string('wilayah_pelayanan')->nullable();
            $table->string('keterangan')->nullable();
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
        Schema::connection('mysql_siperbakin')->dropIfExists('wtp');
    }
};
