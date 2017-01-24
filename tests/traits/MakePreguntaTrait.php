<?php

use Faker\Factory as Faker;
use App\Models\Pregunta;
use App\Repositories\PreguntaRepository;

trait MakePreguntaTrait
{
    /**
     * Create fake instance of Pregunta and save it in database
     *
     * @param array $preguntaFields
     * @return Pregunta
     */
    public function makePregunta($preguntaFields = [])
    {
        /** @var PreguntaRepository $preguntaRepo */
        $preguntaRepo = App::make(PreguntaRepository::class);
        $theme = $this->fakePreguntaData($preguntaFields);
        return $preguntaRepo->create($theme);
    }

    /**
     * Get fake instance of Pregunta
     *
     * @param array $preguntaFields
     * @return Pregunta
     */
    public function fakePregunta($preguntaFields = [])
    {
        return new Pregunta($this->fakePreguntaData($preguntaFields));
    }

    /**
     * Get fake data of Pregunta
     *
     * @param array $postFields
     * @return array
     */
    public function fakePreguntaData($preguntaFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'pregunta' => $fake->word,
            'evaluacion_id' => $fake->randomDigitNotNull,
            'created_at' => $fake->word,
            'updated_at' => $fake->word
        ], $preguntaFields);
    }
}
