<?php

use Faker\Factory as Faker;
use App\Models\Evaluacion;
use App\Repositories\EvaluacionRepository;

trait MakeEvaluacionTrait
{
    /**
     * Create fake instance of Evaluacion and save it in database
     *
     * @param array $evaluacionFields
     * @return Evaluacion
     */
    public function makeEvaluacion($evaluacionFields = [])
    {
        /** @var EvaluacionRepository $evaluacionRepo */
        $evaluacionRepo = App::make(EvaluacionRepository::class);
        $theme = $this->fakeEvaluacionData($evaluacionFields);
        return $evaluacionRepo->create($theme);
    }

    /**
     * Get fake instance of Evaluacion
     *
     * @param array $evaluacionFields
     * @return Evaluacion
     */
    public function fakeEvaluacion($evaluacionFields = [])
    {
        return new Evaluacion($this->fakeEvaluacionData($evaluacionFields));
    }

    /**
     * Get fake data of Evaluacion
     *
     * @param array $postFields
     * @return array
     */
    public function fakeEvaluacionData($evaluacionFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'titulo' => $fake->word,
            'tipo' => $fake->word,
            'modulo_id' => $fake->randomDigitNotNull,
            'created_at' => $fake->word,
            'updated_at' => $fake->word
        ], $evaluacionFields);
    }
}
