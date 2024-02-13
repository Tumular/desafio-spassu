<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        DB::statement("
            CREATE VIEW v_relatorio_livros_por_autor AS
            SELECT a.Nome AS Autor, l.Nome, l.Editora, l.Edicao, l.Preco, l.AnoPublicacao, GROUP_CONCAT(DISTINCT ast.descricao SEPARATOR ', ') AS Assuntos
            FROM autores a
            JOIN livro_autores la ON a.CodAu = la.Autor_CodAu
            JOIN livros l ON la.Livro_CodI = l.CodI
            JOIN livro_assuntos lau ON l.CodI = lau.Livro_CodI
            JOIN assuntos ast ON lau.Assunto_CodAs = ast.CodAs
            GROUP BY a.CodAu, l.Nome, l.Editora, l.Edicao, l.Preco, l.AnoPublicacao
            ORDER BY a.Nome, l.Nome, l.Editora, l.Edicao;
        ");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::statement("DROP VIEW IF EXISTS v_relatorio_livros_por_autor;");
    }
};
