<?php

namespace App\Models\Contexto;

use Illuminate\Database\Eloquent\Model;

class Riesgos_oportunidades extends Model
{
    protected $table 		= 'tbl_contexto_riesgos_oportunidades';
    protected $primaryKey   = 'id_riesgos_oportunidades';
    public $timestamps 		= true;

    protected 	$fillable = [
		'riesgo_oportunidad',
		'clasificacion',
		'fk_empresa',        
    ];
}
