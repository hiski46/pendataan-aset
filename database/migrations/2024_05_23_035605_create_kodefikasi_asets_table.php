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
        Schema::create('kodefikasi_asets', function (Blueprint $table) {
            $table->id();
            $table->string('kode_golongan');
            $table->string('golongan');
            $table->string('kode_bidang');
            $table->string('bidang');
            $table->string('kode_kelompok');
            $table->string('kelompok');
            $table->string('kodefikasi_aset');
            $table->string('no_register');
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
        Schema::dropIfExists('kodefikasi_asets');
    }
};
