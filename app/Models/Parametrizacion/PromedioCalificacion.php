<?php

namespace App\Models\Parametrizacion;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PromedioCalificacion extends Model
{
    use HasFactory;

    protected $table 		= 'tbl_promedio_calificacion';
    protected $primaryKey   = 'id_promedio';
    public $timestamps 		= true;

    protected 	$fillable = [	
        'promedio',
        'fk_cri_calificacion',         
        'bool_estado',         
    ];
}
