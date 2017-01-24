<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @SWG\Definition(
 *      definition="receptor",
 *      required={"receptor", "ubicacion"},
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
class receptor extends Model
{
    use SoftDeletes;

    public $table = 'receptors';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'receptor',
        'ubicacion'
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
        'receptor' => 'required',
        'ubicacion' => 'required'
    ];
}
