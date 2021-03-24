<?php

namespace App\Models\Mejora;

use Illuminate\Database\Eloquent\Model;

class Anomalias extends Model
{
    protected $table 		= 'tbl_mejora_anomalia';
    protected $primaryKey   = 'id_anomalia';
    public $timestamps 		= true;

    protected 	$fillable = [
		'fk_empresa',
		'str_sistema_de_gestion',
		'str_proceso',
		'str_origen_anomalia',
		'str_reportado_por',
		'fecha',
		'str_anomalia',
		'file_archivo',
		'file_archivo_correcciones',
		'bool_estado_anomalia', 
    ];
    
}
