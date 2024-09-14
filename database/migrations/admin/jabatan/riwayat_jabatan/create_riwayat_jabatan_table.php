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
        Schema::connection('mysql')->create('jabatan', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('kode_kategori_jabatan');
            $table->unsignedBigInteger('kode_jenis_jabatan');
            $table->string('nama_jabatan');
            $table->timestamps();


            $table->foreign('kode_kategori_jabatan')->references('id')->on('kategori_jabatan')->onDelete('cascade');
            $table->foreign('kode_jenis_jabatan')->references('id')->on('jenis_jabatan')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::connection('mysql')->dropIfExists('jabatan');
    }
};
