<?php

namespace App\Repositories;

use App\Models\titular;
use InfyOm\Generator\Common\BaseRepository;

class titularRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'nombres',
        'apellidos',
        'cedula'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return titular::class;
    }
}
