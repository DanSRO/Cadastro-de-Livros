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
        Schema::create('tb_genero', function (Blueprint $table) {
            $table->id();
            $table->enum('nome', ['DESENVOLVIMENTO', 'PROGRAMAÇÃO', 'ROMANCE', 'TERROR']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tb_genero');
    }
};