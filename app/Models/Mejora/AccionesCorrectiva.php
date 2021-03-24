<?php

namespace App\Models\Mejora;

use Illuminate\Database\Eloquent\Model;

class AccionesCorrectiva extends Model
{
    protected $table 		= 'tbl_acciones_correctivas';
    protected $primaryKey   = 'id_acciones_correctivas';
    public $timestamps 		= true;

    protected 	$fillable = [
		'fk_anomalia',
		'str_causa_raiz',
		'str_que',
		'str_quien',
		'fecha',
		'file_archivo_causa_raiz',
		'bool_estado_causa_raiz',
    ];
}
