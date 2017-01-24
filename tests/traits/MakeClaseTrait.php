<?php

use Faker\Factory as Faker;
use App\Models\Clase;
use App\Repositories\ClaseRepository;

trait MakeClaseTrait
{
    /**
     * Create fake instance of Clase and save it in database
     *
     * @param array $claseFields
     * @return Clase
     */
    public function makeClase($claseFields = [])
    {
        /** @var ClaseRepository $claseRepo */
        $claseRepo = App::make(ClaseRepository::class);
        $theme = $this->fakeClaseData($claseFields);
        return $claseRepo->create($theme);
    }

    /**
     * Get fake instance of Clase
     *
     * @param array $claseFields
     * @return Clase
     */
    public function fakeClase($claseFields = [])
    {
        return new Clase($this->fakeClaseData($claseFields));
    }

    /**
     * Get fake data of Clase
     *
     * @param array $postFields
     * @return array
     */
    public function fakeClaseData($claseFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'titulo' => $fake->word,
            'contenido' => $fake->text,
            'modulo_id' => $fake->randomDigitNotNull,
            'created_at' => $fake->word,
            'updated_at' => $fake->word
        ], $claseFields);
    }
}
