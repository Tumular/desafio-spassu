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
        Schema::create('livro_assuntos', function (Blueprint $table) {
            $table->foreignId('Livro_CodI')->constrained('livros', 'CodI')->onDelete('cascade');
            $table->foreignId('Assunto_CodAs')->constrained('assuntos', 'CodAs')->onDelete('cascade');
            $table->timestamps();
            $table->primary(['Livro_CodI', 'Assunto_CodAs']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('livro_assuntos');
    }
};
