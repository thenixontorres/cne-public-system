<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ClaseApiTest extends TestCase
{
    use MakeClaseTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreateClase()
    {
        $clase = $this->fakeClaseData();
        $this->json('POST', '/api/v1/clases', $clase);

        $this->assertApiResponse($clase);
    }

    /**
     * @test
     */
    public function testReadClase()
    {
        $clase = $this->makeClase();
        $this->json('GET', '/api/v1/clases/'.$clase->id);

        $this->assertApiResponse($clase->toArray());
    }

    /**
     * @test
     */
    public function testUpdateClase()
    {
        $clase = $this->makeClase();
        $editedClase = $this->fakeClaseData();

        $this->json('PUT', '/api/v1/clases/'.$clase->id, $editedClase);

        $this->assertApiResponse($editedClase);
    }

    /**
     * @test
     */
    public function testDeleteClase()
    {
        $clase = $this->makeClase();
        $this->json('DELETE', '/api/v1/clases/'.$clase->id);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/clases/'.$clase->id);

        $this->assertResponseStatus(404);
    }
}
