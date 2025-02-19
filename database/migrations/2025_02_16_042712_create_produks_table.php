<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('produks', function (Blueprint $table) {
            $table->id();
            $table->string('kode_produk', 10)->unique();
            $table->string('nama_produk', 50);
            $table->foreignId('kategori_id')->constrained('kategori')->onDelete('cascade');
            $table->text('deskripsi')->nullable();
            $table->string('gambar')->nullable();
            $table->timestamps();
        });
    }
    
    

    public function down()
    {
        Schema::dropIfExists('produk');
    }
};
