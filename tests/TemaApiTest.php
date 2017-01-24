<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class TemaApiTest extends TestCase
{
    use MakeTemaTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreateTema()
    {
        $tema = $this->fakeTemaData();
        $this->json('POST', '/api/v1/temas', $tema);

        $this->assertApiResponse($tema);
    }

    /**
     * @test
     */
    public function testReadTema()
    {
        $tema = $this->makeTema();
        $this->json('GET', '/api/v1/temas/'.$tema->id);

        $this->assertApiResponse($tema->toArray());
    }

    /**
     * @test
     */
    public function testUpdateTema()
    {
        $tema = $this->makeTema();
        $editedTema = $this->fakeTemaData();

        $this->json('PUT', '/api/v1/temas/'.$tema->id, $editedTema);

        $this->assertApiResponse($editedTema);
    }

    /**
     * @test
     */
    public function testDeleteTema()
    {
        $tema = $this->makeTema();
        $this->json('DELETE', '/api/v1/temas/'.$tema->id);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/temas/'.$tema->id);

        $this->assertResponseStatus(404);
    }
}
