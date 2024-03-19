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
        Schema::create('kategoribuku_relasi', function (Blueprint $table) {
            $table->id();
            $table->integer('kategori_buku_id');
            $table->unsignedBigInteger('buku_id');
            $table->foreign('buku_id')->references('id')->on('buku')->onDelete('cascade');
            $table->unsignedBigInteger('kategori_id');
            $table->foreign('kategori_id')->references('id')->on('kategori_buku')->onDelete('cascade');
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
        Schema::dropIfExists('kategoribuku_relasi');
    }
};
