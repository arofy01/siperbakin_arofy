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
        Schema::connection('mysql_sipeka')->create('p3keindividu', function (Blueprint $table) {
            $table->id();
            $table->string('id_keluarga')->nullable();
            $table->string('provinsi')->nullable();
            $table->string('kabupaten')->nullable();
            $table->string('kecamatan')->nullable();
            $table->string('desa')->nullable();
            $table->string('kode_kemdagri')->nullable();
            $table->string('desil_kesejahteraan')->nullable();
            $table->string('alamat')->nullable();
            $table->string('id_individu')->nullable();
            $table->string('nama')->nullable();
            $table->string('nik')->nullable();
            $table->string('padan_dukcapil')->nullable();
            $table->string('jenis_kelamin')->nullable();
            $table->string('hubungan_dengan_kepala_keluarga')->nullable();
            $table->string('tanggal_lahir')->nullable();
            $table->string('status_kawin')->nullable();
            $table->string('pekerjaan')->nullable();
            $table->string('pendidikan')->nullable();

            $table->string('<7tahun')->nullable();
            $table->string('7-12tahun')->nullable();
            $table->string('13-15tahun')->nullable();
            $table->string('16-18tahun')->nullable();
            $table->string('19-21tahun')->nullable();
            $table->string('22-59tahun')->nullable();
            $table->string('>60tahun')->nullable();

            $table->string('bnpt')->nullable();
            $table->string('bpum')->nullable();
            $table->string('bst')->nullable();
            $table->string('pkh')->nullable();
            $table->string('sembako')->nullable();
            $table->string('resiko_stunting')->nullable();
            $table->string('pensasaran')->nullable();
            $table->string('intervensi')->nullable();

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
        Schema::connection('mysql_sipeka')->dropIfExists('p3keindividu');
    }
};
