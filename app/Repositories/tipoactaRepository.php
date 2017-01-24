<?php

namespace App\Repositories;

use App\Models\tipoacta;
use InfyOm\Generator\Common\BaseRepository;

class tipoactaRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'tipo'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return tipoacta::class;
    }
}
