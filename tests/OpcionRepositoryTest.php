<?php

use App\Models\Opcion;
use App\Repositories\OpcionRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class OpcionRepositoryTest extends TestCase
{
    use MakeOpcionTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var OpcionRepository
     */
    protected $opcionRepo;

    public function setUp()
    {
        parent::setUp();
        $this->opcionRepo = App::make(OpcionRepository::class);
    }

    /**
     * @test create
     */
    public function testCreateOpcion()
    {
        $opcion = $this->fakeOpcionData();
        $createdOpcion = $this->opcionRepo->create($opcion);
        $createdOpcion = $createdOpcion->toArray();
        $this->assertArrayHasKey('id', $createdOpcion);
        $this->assertNotNull($createdOpcion['id'], 'Created Opcion must have id specified');
        $this->assertNotNull(Opcion::find($createdOpcion['id']), 'Opcion with given id must be in DB');
        $this->assertModelData($opcion, $createdOpcion);
    }

    /**
     * @test read
     */
    public function testReadOpcion()
    {
        $opcion = $this->makeOpcion();
        $dbOpcion = $this->opcionRepo->find($opcion->id);
        $dbOpcion = $dbOpcion->toArray();
        $this->assertModelData($opcion->toArray(), $dbOpcion);
    }

    /**
     * @test update
     */
    public function testUpdateOpcion()
    {
        $opcion = $this->makeOpcion();
        $fakeOpcion = $this->fakeOpcionData();
        $updatedOpcion = $this->opcionRepo->update($fakeOpcion, $opcion->id);
        $this->assertModelData($fakeOpcion, $updatedOpcion->toArray());
        $dbOpcion = $this->opcionRepo->find($opcion->id);
        $this->assertModelData($fakeOpcion, $dbOpcion->toArray());
    }

    /**
     * @test delete
     */
    public function testDeleteOpcion()
    {
        $opcion = $this->makeOpcion();
        $resp = $this->opcionRepo->delete($opcion->id);
        $this->assertTrue($resp);
        $this->assertNull(Opcion::find($opcion->id), 'Opcion should not exist in DB');
    }
}
