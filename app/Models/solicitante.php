<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @SWG\Definition(
 *      definition="solicitante",
 *      required={"nombre", "apellido", "cedula", "contacto"},
 *      @SWG\Property(
 *          property="id",
 *          description="id",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="created_at",
 *          description="created_at",
 *          type="string",
 *          format="date-time"
 *      ),
 *      @SWG\Property(
 *          property="updated_at",
 *          description="updated_at",
 *          type="string",
 *          format="date-time"
 *      )
 * )
 */
class solicitante extends Model
{
    use SoftDeletes;

    public $table = 'solicitantes';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'nombre',
        'apellido',
        'cedula',
        'telefono',
        'email',
    ];

    public function solicituds()
    {
        return $this->hasMany('App\Models\solicitud');
    }

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'nombre' => 'required',
        'apellido' => 'required',
        'cedula' => 'required',
    ];
}
