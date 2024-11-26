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
        Schema::create('produks', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->bigInteger('kategori_id');
            $table->bigInteger('user_id');
            $table->bigInteger('kamar');
            $table->string('alamat');
            $table->bigInteger('harga');
            $table->bigInteger('luas_tanah');
            $table->bigInteger('luas_bangunan');
            $table->string('status');
            $table->string('jenis');
            $table->string('fasilitas_tambahan');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('produks');
    }
};
