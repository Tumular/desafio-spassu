<?php

use Tests\TestCase;
use Illuminate\Http\Request;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Validation\ValidationException;
use App\Http\Controllers\AutorController;
use App\Models\Autor;
use App\Models\Livro;
use App\Models\LivroAutor;

class AutorControllerTest extends TestCase
{
    use DatabaseTransactions ;

    public function testCreate()
    {
        $controller = new AutorController();
        $response = $controller->create();

        $this->assertInstanceOf(\Illuminate\View\View::class, $response);
        $this->assertEquals('autores.create', $response->getName());
    }

    public function testStore()
    {
        $request = new Request(['Nome' => 'Nome do Autor']);

        $controller = new AutorController();
        $response = $controller->store($request);

        $this->assertInstanceOf(\Illuminate\Http\RedirectResponse::class, $response);
        $this->assertEquals('Autor criado com sucesso!', session('success'));

        $autor = Autor::where('Nome', 'Nome do Autor')->first();
        $this->assertNotNull($autor);
    }

    public function testEdit()
    {
        $autor = Autor::factory()->create();

        $controller = new AutorController();
        $response = $controller->edit($autor->CodAu);

        $this->assertInstanceOf(\Illuminate\View\View::class, $response);
        $this->assertEquals('autores.edit', $response->getName());
        $this->assertArrayHasKey('autor', $response->getData());
    }

    public function testUpdate()
    {
        $autor = Autor::factory()->create();

        $request = new Request(['Nome' => 'Novo Nome']);

        $controller = new AutorController();
        $response = $controller->update($request, $autor->CodAu);

        $this->assertInstanceOf(\Illuminate\Http\RedirectResponse::class, $response);
        $this->assertEquals('Autor atualizado com sucesso!', session('success'));

        $autor->refresh();
        $this->assertEquals('Novo Nome', $autor->Nome);
    }

    public function testDestroyWithNoRelatedBooks()
    {
        $autor = Autor::factory()->create();

        $controller = new AutorController();
        $response = $controller->destroy($autor->CodAu);

        $this->assertInstanceOf(\Illuminate\Http\RedirectResponse::class, $response);
        $this->assertEquals('Autor excluído com sucesso!', session('success'));

        $this->assertNull(Autor::find($autor->CodAu));
    }

    public function testDestroyWithRelatedBooks()
    {
        $autor = Autor::factory()->create();
        $livro = Livro::factory()->create();
        LivroAutor::factory()->create(['Livro_CodI' => $livro->CodI, 'Autor_CodAu' => $autor->CodAu]);

        $controller = new AutorController();
        $response = $controller->destroy($autor->CodAu);

        $this->assertInstanceOf(\Illuminate\Http\RedirectResponse::class, $response);
        $this->assertEquals('Este Autor não pode ser excluído pois está relacionado a um ou mais livros.', session('error'));

        $this->assertNotNull(Autor::find($autor->CodAu));
    }

    public function testValidationOnStore()
    {
        $this->expectException(ValidationException::class);
        $this->expectExceptionMessage('O campo Nome é obrigatório.');

        $request = new Request([]);

        $controller = new AutorController();
        $controller->store($request);
    }
}
