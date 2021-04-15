<?php

namespace App\Models\Mejora;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tarea extends Model
{
    use HasFactory;
    protected $table 		= 'tbl_mejo_tareas';
    protected $primaryKey   = 'id_tareas';
    public $timestamps 		= false;

    protected 	$fillable = [
        'acciones_ta',	
        'responsable_ta',	
        'fechaini',	
        'fechafin',	
        'compromiso_ta',	
        'accion_ta',	
        'fecha_ini_ta',	
        'fecha_fin_ta',	
        'archivo_ta',	
        'observaciones_ta',	
        'terminada',	
        'fk_empresa',
    ];
}


