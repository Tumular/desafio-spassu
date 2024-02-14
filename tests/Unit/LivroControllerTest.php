<?php
namespace Tests\Feature;
use Tests\TestCase;
use Illuminate\Http\Request;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\WithFaker;
use App\Http\Controllers\LivroController;
use App\Models\Assunto;
use App\Models\Autor;
use App\Models\Livro;

class LivroControllerTest extends TestCase
{
    use DatabaseTransactions;

    public function testCreate()
    {
        $controller = new LivroController();
        $response = $controller->create();

        $this->assertInstanceOf(\Illuminate\View\View::class, $response);
        $this->assertEquals('livros.create', $response->getName());
    }

    public function testEdit()
    {
        $livro = Livro::factory()->create();

        $controller = new LivroController();
        $response = $controller->edit($livro);

        $this->assertInstanceOf(\Illuminate\View\View::class, $response);
        $this->assertEquals('livros.edit', $response->getName());
        $this->assertArrayHasKey('livro', $response->getData());
    }

    public function testIndexPageCanBeLoaded()
    {
        $response = $this->get(route('livros.index'));
        $response->assertStatus(200);
        $response->assertViewIs('livros.index');
    }

    public function testStoreMethodCanCreateLivro()
    {
        $autor = Autor::factory()->create();
        $assunto = Assunto::factory()->create();

        $livroData = Livro::factory()->raw([
            'autores' => [$autor->CodAu],
            'assuntos' => [$assunto->CodAs],
        ]);

        $response = $this->post(route('livros.store'), $livroData);
        $response->assertRedirect(route('livros.index'));

        $this->assertDatabaseHas('livros', ['Titulo' => $livroData['Titulo']]);
    }

    public function testEditPageCanBeLoaded()
    {
        $livro = Livro::factory()->create();

        $response = $this->get(route('livros.edit', $livro->CodI));
        $response->assertStatus(200);
        $response->assertViewIs('livros.edit');
    }

    public function testDestroyMethodCanDeleteLivro()
    {
        $livro = Livro::factory()->create();

        $response = $this->delete(route('livros.destroy', $livro->CodI));
        $response->assertRedirect(route('livros.index'));

        $this->assertDatabaseMissing('livros', ['CodI' => $livro->CodI]);
    }
}
