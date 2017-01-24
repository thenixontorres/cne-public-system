<?php

use App\Models\Clase;
use App\Repositories\ClaseRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ClaseRepositoryTest extends TestCase
{
    use MakeClaseTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var ClaseRepository
     */
    protected $claseRepo;

    public function setUp()
    {
        parent::setUp();
        $this->claseRepo = App::make(ClaseRepository::class);
    }

    /**
     * @test create
     */
    public function testCreateClase()
    {
        $clase = $this->fakeClaseData();
        $createdClase = $this->claseRepo->create($clase);
        $createdClase = $createdClase->toArray();
        $this->assertArrayHasKey('id', $createdClase);
        $this->assertNotNull($createdClase['id'], 'Created Clase must have id specified');
        $this->assertNotNull(Clase::find($createdClase['id']), 'Clase with given id must be in DB');
        $this->assertModelData($clase, $createdClase);
    }

    /**
     * @test read
     */
    public function testReadClase()
    {
        $clase = $this->makeClase();
        $dbClase = $this->claseRepo->find($clase->id);
        $dbClase = $dbClase->toArray();
        $this->assertModelData($clase->toArray(), $dbClase);
    }

    /**
     * @test update
     */
    public function testUpdateClase()
    {
        $clase = $this->makeClase();
        $fakeClase = $this->fakeClaseData();
        $updatedClase = $this->claseRepo->update($fakeClase, $clase->id);
        $this->assertModelData($fakeClase, $updatedClase->toArray());
        $dbClase = $this->claseRepo->find($clase->id);
        $this->assertModelData($fakeClase, $dbClase->toArray());
    }

    /**
     * @test delete
     */
    public function testDeleteClase()
    {
        $clase = $this->makeClase();
        $resp = $this->claseRepo->delete($clase->id);
        $this->assertTrue($resp);
        $this->assertNull(Clase::find($clase->id), 'Clase should not exist in DB');
    }
}
