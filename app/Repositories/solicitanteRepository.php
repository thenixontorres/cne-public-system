<?php

namespace App\Repositories;

use App\Models\solicitante;
use InfyOm\Generator\Common\BaseRepository;

class solicitanteRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'nombre',
        'apellido',
        'cedula',
        'contacto'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return solicitante::class;
    }
}
