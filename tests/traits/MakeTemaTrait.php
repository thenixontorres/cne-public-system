<?php

use Faker\Factory as Faker;
use App\Models\Tema;
use App\Repositories\TemaRepository;

trait MakeTemaTrait
{
    /**
     * Create fake instance of Tema and save it in database
     *
     * @param array $temaFields
     * @return Tema
     */
    public function makeTema($temaFields = [])
    {
        /** @var TemaRepository $temaRepo */
        $temaRepo = App::make(TemaRepository::class);
        $theme = $this->fakeTemaData($temaFields);
        return $temaRepo->create($theme);
    }

    /**
     * Get fake instance of Tema
     *
     * @param array $temaFields
     * @return Tema
     */
    public function fakeTema($temaFields = [])
    {
        return new Tema($this->fakeTemaData($temaFields));
    }

    /**
     * Get fake data of Tema
     *
     * @param array $postFields
     * @return array
     */
    public function fakeTemaData($temaFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'titulo' => $fake->word,
            'descripcion' => $fake->text,
            'miniatura' => $fake->word,
            'created_at' => $fake->word,
            'updated_at' => $fake->word
        ], $temaFields);
    }
}
