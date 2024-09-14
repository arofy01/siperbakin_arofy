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
        Schema::connection('mysql_sidarendu')->create('kodereferensi', function (Blueprint $table) {
            $table->string('kode_referensi_induk')->primary();
            $table->string('kategori_data')->nulable(); 
            $table->string('keterangan')->nulable();        
            
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
        Schema::connection('mysql_serdadu')->dropIfExists('aparatur');
    }
};
