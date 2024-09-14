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
        Schema::connection('mysql')->create('users_detail_pppk', function (Blueprint $table) {
            $table->id();

             // Kumpulan foreign key
             $table->unsignedBigInteger('user_id');
             $table->unsignedBigInteger('opd_id')->nullable();
             $table->unsignedBigInteger('jabatan_id')->nullable();
 
             $table->string('gelar_depan')->nullable();
             $table->string('gelar_belakang')->nullable();
             $table->string('nip')->unique()->nullable();
             $table->string('nik')->unique()->nullable();
             $table->string('nohp1')->unique()->nullable();
             $table->string('nohp2')->unique()->nullable();
             $table->string('avatar')->nullable();
             $table->string('facebook')->nullable();
             $table->string('twitter')->nullable();
             $table->string('instagram')->nullable();
             $table->timestamps();
 
             $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
             $table->foreign('jabatan_id')->references('id')->on('jabatan')->onDelete('cascade');
             $table->foreign('opd_id')->references('id')->on('opd')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::connection('mysql')->dropIfExists('users_detail_pppk');
    }
};
