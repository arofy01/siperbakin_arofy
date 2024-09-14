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
        Schema::connection('mysql')->create('aparatur', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('penduduk_id');
            $table->unsignedBigInteger('instansi_id');
            $table->unsignedBigInteger('lingkup_jabatan_id');
            $table->unsignedBigInteger('jenis_jabatan_id');
            
            $table->timestamps();

            $table->foreign('instansi_id')->references('id')->on('instansi')->onDelete('cascade');
            $table->foreign('penduduk_id')->references('id')->on('penduduk')->onDelete('cascade');
            $table->foreign('lingkup_jabatan_id')->references('id')->on('lingkup_jabatan')->onDelete('cascade');
            $table->foreign('jenis_jabatan_id')->references('id')->on('jenis_jabatan')->onDelete('cascade');
        });
    }
 
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::connection('mysql')->dropIfExists('aparatur');
    }
};
