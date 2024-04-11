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
        Schema::create('livros', function (Blueprint $table) {
            $table->id();
            $table->string('titulo')->required();
            $table->string('editora')->required();
            $table->unsignedBigInteger('genero_id');
            $table->foreign('genero_id')->references('id')->on('tb_genero');
            $table->date('ano_lancamento')->required();
            $table->enum('estado', ['RESERVADO', 'ALUGADO', 'DISPONÍVEL'])->required();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('livros');
    }
};
