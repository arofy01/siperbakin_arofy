<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::connection('mysql')->create('dayah', function (Blueprint $table) {
            $table->id();
            $table->string('kode_dayah');
            $table->string('nama_dayah');
            $table->string('kode_kecamatan');
            $table->string('kode_desa');
            $table->string('alamat');
            $table->string('keterangan');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::connection('mysql')->dropIfExists('dayah');
    }
};
