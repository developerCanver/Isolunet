<?php

namespace App\Models\Mejora;

use Illuminate\Database\Eloquent\Model;

class CausaRaiz extends Model
{
    protected $table 		= 'tbl_causa_raiz_anomalia';
    protected $primaryKey   = 'id_causa_raiz_anomalia';
    public $timestamps 		= true;

    protected 	$fillable = [
		'fk_anomalia',
		'str_causa_raiz',
		'str_6m',
		'str_porque1',
		'str_porque2',
		'str_porque3',
		'str_porque4',
		'str_porque5',
    ];
}
