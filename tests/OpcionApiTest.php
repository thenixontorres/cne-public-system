<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class OpcionApiTest extends TestCase
{
    use MakeOpcionTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreateOpcion()
    {
        $opcion = $this->fakeOpcionData();
        $this->json('POST', '/api/v1/opcions', $opcion);

        $this->assertApiResponse($opcion);
    }

    /**
     * @test
     */
    public function testReadOpcion()
    {
        $opcion = $this->makeOpcion();
        $this->json('GET', '/api/v1/opcions/'.$opcion->id);

        $this->assertApiResponse($opcion->toArray());
    }

    /**
     * @test
     */
    public function testUpdateOpcion()
    {
        $opcion = $this->makeOpcion();
        $editedOpcion = $this->fakeOpcionData();

        $this->json('PUT', '/api/v1/opcions/'.$opcion->id, $editedOpcion);

        $this->assertApiResponse($editedOpcion);
    }

    /**
     * @test
     */
    public function testDeleteOpcion()
    {
        $opcion = $this->makeOpcion();
        $this->json('DELETE', '/api/v1/opcions/'.$opcion->id);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/opcions/'.$opcion->id);

        $this->assertResponseStatus(404);
    }
}
