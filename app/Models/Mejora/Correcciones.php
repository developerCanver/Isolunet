<?php

namespace App\Models\Mejora;

use Illuminate\Database\Eloquent\Model;

class Correcciones extends Model
{
    protected $table 		= 'tbl_correcciones_anomalias';
    protected $primaryKey   = 'id_correccion_anomalia';
    public $timestamps 		= true;

    protected 	$fillable = [
		'fk_anomalia',
		'str_correccion_anomalia',
		'str_quien',
		'fecha',
		'bool_estado_correcion',
    ];
}
