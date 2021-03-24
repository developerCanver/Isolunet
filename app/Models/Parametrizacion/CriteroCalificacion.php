<?php

namespace App\Models\Parametrizacion;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CriteroCalificacion extends Model
{
    use HasFactory;
    protected $table 		= 'tbl_cri_calificacion';
    protected $primaryKey   = 'id_cri_calificacion';
    public $timestamps 		= true;

    protected 	$fillable = [
        'fecha_calificacion',
        'pro_reevaluacion', 
        'bool_estado',
        'fk_cal_proveedor',       
    ];

    	

}
