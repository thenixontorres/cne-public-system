<?php

use App\Models\Imagen;
use App\Repositories\ImagenRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ImagenRepositoryTest extends TestCase
{
    use MakeImagenTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var ImagenRepository
     */
    protected $imagenRepo;

    public function setUp()
    {
        parent::setUp();
        $this->imagenRepo = App::make(ImagenRepository::class);
    }

    /**
     * @test create
     */
    public function testCreateImagen()
    {
        $imagen = $this->fakeImagenData();
        $createdImagen = $this->imagenRepo->create($imagen);
        $createdImagen = $createdImagen->toArray();
        $this->assertArrayHasKey('id', $createdImagen);
        $this->assertNotNull($createdImagen['id'], 'Created Imagen must have id specified');
        $this->assertNotNull(Imagen::find($createdImagen['id']), 'Imagen with given id must be in DB');
        $this->assertModelData($imagen, $createdImagen);
    }

    /**
     * @test read
     */
    public function testReadImagen()
    {
        $imagen = $this->makeImagen();
        $dbImagen = $this->imagenRepo->find($imagen->id);
        $dbImagen = $dbImagen->toArray();
        $this->assertModelData($imagen->toArray(), $dbImagen);
    }

    /**
     * @test update
     */
    public function testUpdateImagen()
    {
        $imagen = $this->makeImagen();
        $fakeImagen = $this->fakeImagenData();
        $updatedImagen = $this->imagenRepo->update($fakeImagen, $imagen->id);
        $this->assertModelData($fakeImagen, $updatedImagen->toArray());
        $dbImagen = $this->imagenRepo->find($imagen->id);
        $this->assertModelData($fakeImagen, $dbImagen->toArray());
    }

    /**
     * @test delete
     */
    public function testDeleteImagen()
    {
        $imagen = $this->makeImagen();
        $resp = $this->imagenRepo->delete($imagen->id);
        $this->assertTrue($resp);
        $this->assertNull(Imagen::find($imagen->id), 'Imagen should not exist in DB');
    }
}
