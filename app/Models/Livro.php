<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Livro extends Model
{
    use HasFactory;

    protected $table = 'livros';

    protected $primaryKey = 'CodI';
    protected $fillable = ['Editora', 'Edicao', 'AnoPublicacao', 'Nome', 'Preco'];

    public function autores()
    {
        return $this->belongsToMany(Autor::class, 'livro_autores', 'Livro_CodI', 'Autor_CodAu');
    }

    public function assuntos()
    {
        return $this->belongsToMany(Assunto::class, 'livro_assuntos', 'Livro_CodI', 'Assunto_CodAs');
    }
}
