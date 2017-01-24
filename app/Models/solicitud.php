<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @SWG\Definition(
 *      definition="solicitud",
 *      required={"titular_id", "fecha", "numero_acta", "receptor_id", "solicitante_id", "tipo_acta", "estatus", "responsable_id", "emision"},
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
class solicitud extends Model
{
    use SoftDeletes;

    public $table = 'solicituds';
    

    protected $dates = ['deleted_at'];

//Campos del modelo

    public $fillable = [
        'titular_id',
        'tipoacta_id',
        'numero_acta',
        'fecha_acta',
        'receptor_id',
        'solicitante_id',
        'solicitado_a',
        'fecha_solicitud',
        'via',
        'recibido',
        'estatus_tramite',
        'responsable_id',
        
    ];

//Relaciones con otros modelos
    public function titular()
    {
        return $this->BelongsTo('App\Models\titular');
    }

    public function solicitante()
    {
        return $this->BelongsTo('App\Models\solicitante');
    }

    public function receptor()
    {
        return $this->BelongsTo('App\Models\receptor');
    }

    public function responsable()
    {
        return $this->BelongsTo('App\User');
    }

    public function tipoacta()
    {
        return $this->BelongsTo('App\Models\tipoacta');
    }
    
    protected $casts = [
        
    ];

    //validaciones

    public static $rules = [
        'numero_acta' => 'required',
        'fecha_acta' => 'required',
        'receptor_id' => 'required',
        'solicitado_a' => 'required',
        'fecha_solicitud' => 'required',
        'via' => 'required',
        'recibido' => 'required',
        'estatus_tramite' => 'required',
        'responsable_id' => 'required',
    ];
}
