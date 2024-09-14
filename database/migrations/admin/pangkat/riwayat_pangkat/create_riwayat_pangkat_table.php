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
        Schema::connection('mysql')->create('riwayat_pangkat', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('kode_aparatur');
            $table->unsignedBigInteger('kode_pangkat');
            $table->string('tmt_pangkat');
            $table->string('no_sk_pangkat');
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
        Schema::connection('mysql')->dropIfExists('riwayat_pangkat');
    }
};
