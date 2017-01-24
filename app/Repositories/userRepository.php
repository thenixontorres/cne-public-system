<?php

namespace App\Repositories;

use App\User;
use InfyOm\Generator\Common\BaseRepository;

class userRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'nombre',
        'apellido',
        'cedila',
        'email', 
        'tipo'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return user::class;
    }
}
