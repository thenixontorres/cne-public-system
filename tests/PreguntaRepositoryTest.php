<?php

use App\Models\Pregunta;
use App\Repositories\PreguntaRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class PreguntaRepositoryTest extends TestCase
{
    use MakePreguntaTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var PreguntaRepository
     */
    protected $preguntaRepo;

    public function setUp()
    {
        parent::setUp();
        $this->preguntaRepo = App::make(PreguntaRepository::class);
    }

    /**
     * @test create
     */
    public function testCreatePregunta()
    {
        $pregunta = $this->fakePreguntaData();
        $createdPregunta = $this->preguntaRepo->create($pregunta);
        $createdPregunta = $createdPregunta->toArray();
        $this->assertArrayHasKey('id', $createdPregunta);
        $this->assertNotNull($createdPregunta['id'], 'Created Pregunta must have id specified');
        $this->assertNotNull(Pregunta::find($createdPregunta['id']), 'Pregunta with given id must be in DB');
        $this->assertModelData($pregunta, $createdPregunta);
    }

    /**
     * @test read
     */
    public function testReadPregunta()
    {
        $pregunta = $this->makePregunta();
        $dbPregunta = $this->preguntaRepo->find($pregunta->id);
        $dbPregunta = $dbPregunta->toArray();
        $this->assertModelData($pregunta->toArray(), $dbPregunta);
    }

    /**
     * @test update
     */
    public function testUpdatePregunta()
    {
        $pregunta = $this->makePregunta();
        $fakePregunta = $this->fakePreguntaData();
        $updatedPregunta = $this->preguntaRepo->update($fakePregunta, $pregunta->id);
        $this->assertModelData($fakePregunta, $updatedPregunta->toArray());
        $dbPregunta = $this->preguntaRepo->find($pregunta->id);
        $this->assertModelData($fakePregunta, $dbPregunta->toArray());
    }

    /**
     * @test delete
     */
    public function testDeletePregunta()
    {
        $pregunta = $this->makePregunta();
        $resp = $this->preguntaRepo->delete($pregunta->id);
        $this->assertTrue($resp);
        $this->assertNull(Pregunta::find($pregunta->id), 'Pregunta should not exist in DB');
    }
}
