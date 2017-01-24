<?php

use Faker\Factory as Faker;
use App\Models\Opcion;
use App\Repositories\OpcionRepository;

trait MakeOpcionTrait
{
    /**
     * Create fake instance of Opcion and save it in database
     *
     * @param array $opcionFields
     * @return Opcion
     */
    public function makeOpcion($opcionFields = [])
    {
        /** @var OpcionRepository $opcionRepo */
        $opcionRepo = App::make(OpcionRepository::class);
        $theme = $this->fakeOpcionData($opcionFields);
        return $opcionRepo->create($theme);
    }

    /**
     * Get fake instance of Opcion
     *
     * @param array $opcionFields
     * @return Opcion
     */
    public function fakeOpcion($opcionFields = [])
    {
        return new Opcion($this->fakeOpcionData($opcionFields));
    }

    /**
     * Get fake data of Opcion
     *
     * @param array $postFields
     * @return array
     */
    public function fakeOpcionData($opcionFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'opcion' => $fake->word,
            'pregunta_id' => $fake->randomDigitNotNull,
            'created_at' => $fake->word,
            'updated_at' => $fake->word
        ], $opcionFields);
    }
}
