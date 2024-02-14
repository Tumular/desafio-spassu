<?php

use Tests\TestCase;
use Illuminate\Http\Request;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Validation\ValidationException;
use App\Http\Controllers\AssuntoController;
use App\Models\Assunto;
use App\Models\Livro;
use App\Models\LivroAssunto;

class AssuntoControllerTest extends TestCase
{
    use DatabaseTransactions;

    public function testCreate()
    {
        $controller = new AssuntoController();
        $response = $controller->create();

        $this->assertInstanceOf(\Illuminate\View\View::class, $response);
        $this->assertEquals('assuntos.create', $response->getName());
    }

    public function testStore()
    {
        $request = new Request(['Descricao' => 'Descrição do Assunto']);

        $controller = new AssuntoController();
        $response = $controller->store($request);

        $this->assertInstanceOf(\Illuminate\Http\RedirectResponse::class, $response);
        $this->assertEquals('Assunto criado com sucesso!', session('success'));

        $assunto = Assunto::where('Descricao', 'Descrição do Assunto')->first();
        $this->assertNotNull($assunto);
    }

    public function testEdit()
    {
        $assunto = Assunto::factory()->create();

        $controller = new AssuntoController();
        $response = $controller->edit($assunto->CodAs);

        $this->assertInstanceOf(\Illuminate\View\View::class, $response);
        $this->assertEquals('assuntos.edit', $response->getName());
        $this->assertArrayHasKey('assunto', $response->getData());
    }

    public function testUpdate()
    {
        $assunto = Assunto::factory()->create();

        $request = new Request(['Descricao' => 'Nova Descrição']);

        $controller = new AssuntoController();
        $response = $controller->update($request, $assunto->CodAs);

        $this->assertInstanceOf(\Illuminate\Http\RedirectResponse::class, $response);
        $this->assertEquals('Assunto atualizado com sucesso!', session('success'));

        $assunto->refresh();
        $this->assertEquals('Nova Descrição', $assunto->Descricao);
    }

    public function testDestroyWithNoRelatedBooks()
    {
        $assunto = Assunto::factory()->create();

        $controller = new AssuntoController();
        $response = $controller->destroy($assunto->CodAs);

        $this->assertInstanceOf(\Illuminate\Http\RedirectResponse::class, $response);
        $this->assertEquals('Assunto excluído com sucesso!', session('success'));

        $this->assertNull(Assunto::find($assunto->CodAs));
    }

    public function testDestroyWithRelatedBooks()
    {
        $assunto = Assunto::factory()->create();
        $livro = Livro::factory()->create();
        LivroAssunto::factory()->create(['Livro_CodI' => $livro->CodI, 'Assunto_CodAs' => $assunto->CodAs]);

        $controller = new AssuntoController();
        $response = $controller->destroy($assunto->CodAs);

        $this->assertInstanceOf(\Illuminate\Http\RedirectResponse::class, $response);
        $this->assertEquals('Este assunto não pode ser excluído pois está relacionado a um ou mais livros.', session('error'));

        $this->assertNotNull(Assunto::find($assunto->CodAs));
    }

    public function testValidationOnStore()
    {
        $this->expectException(ValidationException::class);
        $this->expectExceptionMessage('O campo Descrição é obrigatório.');

        $request = new Request([]);

        $controller = new AssuntoController();
        $controller->store($request);
    }
}
