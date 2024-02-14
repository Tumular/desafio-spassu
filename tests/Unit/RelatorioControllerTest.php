<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Http\Controllers\RelatorioController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Exception;

class RelatorioControllerTest extends TestCase
{
    public function testIndex()
    {
        $controller = new RelatorioController();
        $response = $controller->index();

        $this->assertEquals('relatorios.index', $response->getName());
    }

    public function testGetData()
    {
        // Defina suas expectativas de dados aqui
        $expectedData = [
            "data" => [
                // Dados de exemplo
                ["autor" => "Autor 1", "livro" => "Livro 1", "editora" => "Editora 1", "edicao" => 1, "preco" => 20.00, "publicacao" => "2023-01-01", "assuntos" => "Assunto 1"],
                ["autor" => "Autor 2", "livro" => "Livro 2", "editora" => "Editora 2", "edicao" => 2, "preco" => 25.00, "publicacao" => "2023-02-02", "assuntos" => "Assunto 2"],
            ]
        ];

        // Mock da consulta ao banco de dados
        DB::shouldReceive('table->get')->once()->andReturn($expectedData['data']);

        $controller = new RelatorioController();
        $response = $controller->getData();

        $this->assertEquals(json_encode($expectedData), $response->content());
    }

    public function testGetDataWithFilter()
    {
        // Mock da consulta ao banco de dados
        $mock = DB::shouldReceive('table')->andReturnSelf();
        $mock->shouldReceive('where')->with('autor', 'J. R. R. Tolkien')->andReturnSelf();
        $mock->shouldReceive('get')->andReturn([]);

        // Chama o método getData do controller com um filtro
        $controller = new RelatorioController();
        $response = $controller->getData(new Request(['autor' => 'J. R. R. Tolkien']));

        // Verifica se o retorno é em formato JSON
        $this->assertJson($response->content());

        // Verifica se a resposta HTTP é OK (200)
        $this->assertEquals(200, $response->getStatusCode());
    }

    public function testGetDataWithError()
    {
        // Mock da conexão com o banco de dados para lançar uma exceção
        DB::shouldReceive('connection')->andThrow(new Exception('Database error'));

        // Instancia o controlador
        $controller = new RelatorioController();

        // Verifica se a exceção é lançada
        $this->expectException(Exception::class);

        // Chama o método getData, que deve lançar a exceção
        $controller->getData();
    }
}
