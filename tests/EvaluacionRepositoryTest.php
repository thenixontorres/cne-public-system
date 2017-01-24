<?php

use App\Models\Evaluacion;
use App\Repositories\EvaluacionRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class EvaluacionRepositoryTest extends TestCase
{
    use MakeEvaluacionTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var EvaluacionRepository
     */
    protected $evaluacionRepo;

    public function setUp()
    {
        parent::setUp();
        $this->evaluacionRepo = App::make(EvaluacionRepository::class);
    }

    /**
     * @test create
     */
    public function testCreateEvaluacion()
    {
        $evaluacion = $this->fakeEvaluacionData();
        $createdEvaluacion = $this->evaluacionRepo->create($evaluacion);
        $createdEvaluacion = $createdEvaluacion->toArray();
        $this->assertArrayHasKey('id', $createdEvaluacion);
        $this->assertNotNull($createdEvaluacion['id'], 'Created Evaluacion must have id specified');
        $this->assertNotNull(Evaluacion::find($createdEvaluacion['id']), 'Evaluacion with given id must be in DB');
        $this->assertModelData($evaluacion, $createdEvaluacion);
    }

    /**
     * @test read
     */
    public function testReadEvaluacion()
    {
        $evaluacion = $this->makeEvaluacion();
        $dbEvaluacion = $this->evaluacionRepo->find($evaluacion->id);
        $dbEvaluacion = $dbEvaluacion->toArray();
        $this->assertModelData($evaluacion->toArray(), $dbEvaluacion);
    }

    /**
     * @test update
     */
    public function testUpdateEvaluacion()
    {
        $evaluacion = $this->makeEvaluacion();
        $fakeEvaluacion = $this->fakeEvaluacionData();
        $updatedEvaluacion = $this->evaluacionRepo->update($fakeEvaluacion, $evaluacion->id);
        $this->assertModelData($fakeEvaluacion, $updatedEvaluacion->toArray());
        $dbEvaluacion = $this->evaluacionRepo->find($evaluacion->id);
        $this->assertModelData($fakeEvaluacion, $dbEvaluacion->toArray());
    }

    /**
     * @test delete
     */
    public function testDeleteEvaluacion()
    {
        $evaluacion = $this->makeEvaluacion();
        $resp = $this->evaluacionRepo->delete($evaluacion->id);
        $this->assertTrue($resp);
        $this->assertNull(Evaluacion::find($evaluacion->id), 'Evaluacion should not exist in DB');
    }
}
