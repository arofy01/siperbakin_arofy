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
        Schema::connection('mysql_sidarendu')->create('daftardata', function (Blueprint $table) {
            $table->string('kode_referensi_anak')->primary();
            $table->string('kode_referensi_induk');
            $table->string('role_id');
            $table->string('judul_data')->nulable();
            $table->string('keterangan')->nulable();
            
            $table->timestamps();

            $table->foreign('kode_referensi_induk')->references('kode_referensi_induk')->on('kodereferensi')->onDelete('cascade');
            
        });
    }
 
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::connection('mysql_sidarendu')->dropIfExists('daftardata');
    }
};
