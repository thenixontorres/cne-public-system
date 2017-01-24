<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ImagenApiTest extends TestCase
{
    use MakeImagenTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreateImagen()
    {
        $imagen = $this->fakeImagenData();
        $this->json('POST', '/api/v1/imagens', $imagen);

        $this->assertApiResponse($imagen);
    }

    /**
     * @test
     */
    public function testReadImagen()
    {
        $imagen = $this->makeImagen();
        $this->json('GET', '/api/v1/imagens/'.$imagen->id);

        $this->assertApiResponse($imagen->toArray());
    }

    /**
     * @test
     */
    public function testUpdateImagen()
    {
        $imagen = $this->makeImagen();
        $editedImagen = $this->fakeImagenData();

        $this->json('PUT', '/api/v1/imagens/'.$imagen->id, $editedImagen);

        $this->assertApiResponse($editedImagen);
    }

    /**
     * @test
     */
    public function testDeleteImagen()
    {
        $imagen = $this->makeImagen();
        $this->json('DELETE', '/api/v1/imagens/'.$imagen->id);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/imagens/'.$imagen->id);

        $this->assertResponseStatus(404);
    }
}
