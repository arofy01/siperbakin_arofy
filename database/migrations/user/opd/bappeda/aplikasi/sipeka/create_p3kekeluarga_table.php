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
        Schema::connection('mysql_sipeka')->create('p3kekeluarga', function (Blueprint $table) {
            $table->id();
            $table->string('id_keluarga')->nullable();
            $table->string('provinsi')->nullable();
            $table->string('kabupaten')->nullable();
            $table->string('kecamatan')->nullable();
            $table->string('desa')->nullable();
            $table->string('kode_kemdagri')->nullable();
            $table->string('desil_kesejahteraan')->nullable();
            $table->string('alamat')->nullable();
            $table->string('kepala_keluarga')->nullable();
            $table->string('nik')->nullable();
            $table->string('padan_dukcapil')->nullable();
            $table->string('jenis_kelamin')->nullable();
            $table->string('tanggal_lahir')->nullable();
            $table->string('pekerjaan')->nullable();
            $table->string('pendidikan')->nullable();
            $table->string('kepemilikan_rumah')->nullable();
            $table->string('memiliki_simpanan')->nullable();
            $table->string('jenis_atap')->nullable();
            $table->string('jenis_dinding')->nullable();
            $table->string('jenis_lantai')->nullable();
            $table->string('sumber_penerangan')->nullable();
            $table->string('bahan_bakar_memasak')->nullable();
            $table->string('sumber_air_minum')->nullable();
            $table->string('fasilitas_BAB')->nullable();
            $table->string('bpnt')->nullable();
            $table->string('bpum')->nullable();
            $table->string('bst')->nullable();
            $table->string('pkh')->nullable();
            $table->string('sembako')->nullable();
            $table->string('resiko_stunting')->nullable();
            $table->string('pensasaran')->nullable();

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
        Schema::connection('mysql_sipeka')->dropIfExists('p3kekeluarga');
    }
};
