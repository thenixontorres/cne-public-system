<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class EvaluacionApiTest extends TestCase
{
    use MakeEvaluacionTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreateEvaluacion()
    {
        $evaluacion = $this->fakeEvaluacionData();
        $this->json('POST', '/api/v1/evaluacions', $evaluacion);

        $this->assertApiResponse($evaluacion);
    }

    /**
     * @test
     */
    public function testReadEvaluacion()
    {
        $evaluacion = $this->makeEvaluacion();
        $this->json('GET', '/api/v1/evaluacions/'.$evaluacion->id);

        $this->assertApiResponse($evaluacion->toArray());
    }

    /**
     * @test
     */
    public function testUpdateEvaluacion()
    {
        $evaluacion = $this->makeEvaluacion();
        $editedEvaluacion = $this->fakeEvaluacionData();

        $this->json('PUT', '/api/v1/evaluacions/'.$evaluacion->id, $editedEvaluacion);

        $this->assertApiResponse($editedEvaluacion);
    }

    /**
     * @test
     */
    public function testDeleteEvaluacion()
    {
        $evaluacion = $this->makeEvaluacion();
        $this->json('DELETE', '/api/v1/evaluacions/'.$evaluacion->id);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/evaluacions/'.$evaluacion->id);

        $this->assertResponseStatus(404);
    }
}
