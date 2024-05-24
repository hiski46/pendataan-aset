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
        Schema::create('assets', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('jenis');
            $table->string('aspek_legal')->nullable();
            $table->string('file_legal')->nullable();
            $table->string('merek')->nullable('');
            $table->string('material')->nullable('');
            $table->integer('harga');
            $table->text('tahun');
            $table->text('riwayat');
            $table->enum('kondisi', ['b', 'rr', 'rb'])->nullable();
            $table->text('ket');
            $table->foreignId('kodefikasi_aset_id')->constrained('kodefikasi_asets');
            $table->foreignId('kodefikasi_lokasi_id')->constrained('kodefikasi_lokasis');
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
        Schema::dropIfExists('assets');
    }
};
