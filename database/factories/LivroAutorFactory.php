<?php

namespace Database\Factories;

use App\Models\LivroAutor;
use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Autor;
use App\Models\Livro;

class LivroAutorFactory extends Factory
{
    protected $model = LivroAutor::class;

    public function definition()
    {
        $autorId = Autor::all()->random()->CodAu;
        $livroId = Livro::all()->random()->CodI;

        return [
            'Autor_CodAu' => $autorId,
            'Livro_CodI' => $livroId,
        ];
    }
}
