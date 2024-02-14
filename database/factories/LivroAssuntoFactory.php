<?php

namespace Database\Factories;

use App\Models\LivroAssunto;
use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Assunto;
use App\Models\Livro;

class LivroAssuntoFactory extends Factory
{
    protected $model = LivroAssunto::class;

    public function definition()
    {
        $assuntoId = Assunto::all()->random()->CodAs;
        $livroId = Livro::all()->random()->CodI;

        return [
            'Assunto_CodAs' => $assuntoId,
            'Livro_CodI' => $livroId,
        ];
    }
}
