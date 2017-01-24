<?php

use App\Models\Tema;
use App\Repositories\TemaRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class TemaRepositoryTest extends TestCase
{
    use MakeTemaTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var TemaRepository
     */
    protected $temaRepo;

    public function setUp()
    {
        parent::setUp();
        $this->temaRepo = App::make(TemaRepository::class);
    }

    /**
     * @test create
     */
    public function testCreateTema()
    {
        $tema = $this->fakeTemaData();
        $createdTema = $this->temaRepo->create($tema);
        $createdTema = $createdTema->toArray();
        $this->assertArrayHasKey('id', $createdTema);
        $this->assertNotNull($createdTema['id'], 'Created Tema must have id specified');
        $this->assertNotNull(Tema::find($createdTema['id']), 'Tema with given id must be in DB');
        $this->assertModelData($tema, $createdTema);
    }

    /**
     * @test read
     */
    public function testReadTema()
    {
        $tema = $this->makeTema();
        $dbTema = $this->temaRepo->find($tema->id);
        $dbTema = $dbTema->toArray();
        $this->assertModelData($tema->toArray(), $dbTema);
    }

    /**
     * @test update
     */
    public function testUpdateTema()
    {
        $tema = $this->makeTema();
        $fakeTema = $this->fakeTemaData();
        $updatedTema = $this->temaRepo->update($fakeTema, $tema->id);
        $this->assertModelData($fakeTema, $updatedTema->toArray());
        $dbTema = $this->temaRepo->find($tema->id);
        $this->assertModelData($fakeTema, $dbTema->toArray());
    }

    /**
     * @test delete
     */
    public function testDeleteTema()
    {
        $tema = $this->makeTema();
        $resp = $this->temaRepo->delete($tema->id);
        $this->assertTrue($resp);
        $this->assertNull(Tema::find($tema->id), 'Tema should not exist in DB');
    }
}
