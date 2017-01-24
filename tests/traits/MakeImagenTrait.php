<?php

use Faker\Factory as Faker;
use App\Models\Imagen;
use App\Repositories\ImagenRepository;

trait MakeImagenTrait
{
    /**
     * Create fake instance of Imagen and save it in database
     *
     * @param array $imagenFields
     * @return Imagen
     */
    public function makeImagen($imagenFields = [])
    {
        /** @var ImagenRepository $imagenRepo */
        $imagenRepo = App::make(ImagenRepository::class);
        $theme = $this->fakeImagenData($imagenFields);
        return $imagenRepo->create($theme);
    }

    /**
     * Get fake instance of Imagen
     *
     * @param array $imagenFields
     * @return Imagen
     */
    public function fakeImagen($imagenFields = [])
    {
        return new Imagen($this->fakeImagenData($imagenFields));
    }

    /**
     * Get fake data of Imagen
     *
     * @param array $postFields
     * @return array
     */
    public function fakeImagenData($imagenFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'imagen' => $fake->word,
            'clase_id' => $fake->randomDigitNotNull,
            'created_at' => $fake->word,
            'updated_at' => $fake->word
        ], $imagenFields);
    }
}
