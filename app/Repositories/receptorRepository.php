<?php

namespace App\Repositories;

use App\Models\receptor;
use InfyOm\Generator\Common\BaseRepository;

class receptorRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'receptor',
        'ubicacion'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return receptor::class;
    }
}
