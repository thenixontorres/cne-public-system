<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class PreguntaApiTest extends TestCase
{
    use MakePreguntaTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreatePregunta()
    {
        $pregunta = $this->fakePreguntaData();
        $this->json('POST', '/api/v1/preguntas', $pregunta);

        $this->assertApiResponse($pregunta);
    }

    /**
     * @test
     */
    public function testReadPregunta()
    {
        $pregunta = $this->makePregunta();
        $this->json('GET', '/api/v1/preguntas/'.$pregunta->id);

        $this->assertApiResponse($pregunta->toArray());
    }

    /**
     * @test
     */
    public function testUpdatePregunta()
    {
        $pregunta = $this->makePregunta();
        $editedPregunta = $this->fakePreguntaData();

        $this->json('PUT', '/api/v1/preguntas/'.$pregunta->id, $editedPregunta);

        $this->assertApiResponse($editedPregunta);
    }

    /**
     * @test
     */
    public function testDeletePregunta()
    {
        $pregunta = $this->makePregunta();
        $this->json('DELETE', '/api/v1/preguntas/'.$pregunta->id);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/preguntas/'.$pregunta->id);

        $this->assertResponseStatus(404);
    }
}
