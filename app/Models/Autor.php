<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Autor extends Model
{
    use HasFactory;

    protected $table = 'autores';

    protected $primaryKey = 'CodAu';
    protected $fillable = ['Nome'];

    public function livros()
    {
        return $this->belongsToMany(Livro::class, 'livro_autores', 'Autor_CodAu', 'Livro_CodI');
    }
}
