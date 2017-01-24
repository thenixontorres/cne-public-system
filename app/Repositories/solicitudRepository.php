<?php

namespace App\Repositories;

use App\Models\solicitud;
use InfyOm\Generator\Common\BaseRepository;

class solicitudRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'titular_id',
        'fecha',
        'numero_acta',
        'receptor_id',
        'solicitante_id',
        'tipo_acta',
        'estatus',
        'responsable_id',
        'emision'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return solicitud::class;
    }
}
