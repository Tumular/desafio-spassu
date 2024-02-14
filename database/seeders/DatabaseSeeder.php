<?php

namespace Database\Seeders;
use App\Models\Assunto;
use App\Models\Autor;
use App\Models\Livro;
use App\Models\LivroAssunto;
use App\Models\LivroAutor;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        \App\Models\Assunto::factory(10)->create();
        \App\Models\Autor::factory(10)->create();
        \App\Models\Livro::factory(10)->create();
        \App\Models\LivroAssunto::factory(10)->create();
        \App\Models\LivroAutor::factory(10)->create();
    }
}
