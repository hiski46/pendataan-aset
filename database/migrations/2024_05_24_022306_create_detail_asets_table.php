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
        Schema::create('detail_asets', function (Blueprint $table) {
            $table->id();
            $table->foreignId('asset_id')->constrained('assets');
            $table->integer('luas')->nullable();
            $table->string('alamat')->nullable();
            $table->string('hak')->nullable();
            $table->date('tanggal_sertifikat')->nullable();
            $table->string('no_sertifikat')->nullable();
            $table->string('penggunaan')->nullable();
            $table->enum('bertingkat', ['bertingkat', 'tidak'])->nullable();
            $table->enum('beton', ['beton', 'tidak'])->nullable();
            $table->integer('luas_lantai')->nullable();
            $table->string('status')->nullable();
            $table->string('kode_tanah')->nullable();
            $table->string('judul_buku')->nullable();
            $table->string('spesifikasi_buku')->nullable();
            $table->string('asal_kesenian')->nullable();
            $table->string('pencipta_kesenian')->nullable();
            $table->string('bahan_kesenian')->nullable();
            $table->string('jenis_hewan')->nullable();
            $table->string('ukuran_hewan')->nullable();
            $table->integer('jumlah')->nullable();
            $table->enum('jenis_bangunan', ['p', 'sp', 'd'])->nullable();
            $table->date('tanggal_mulai')->nullable();
            $table->string('spesifikasi_ruangan')->nullable();
            $table->string('no_seri_pabrik')->nullable();
            $table->string('ukuran')->nullable();
            $table->string('ket erangan_mutasi')->nullable();
            $table->string('satuan')->nullable();
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
        Schema::dropIfExists('detail_asets');
    }
};
