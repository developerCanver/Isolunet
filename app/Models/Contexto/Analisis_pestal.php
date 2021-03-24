<?php

namespace App\Models\Contexto;

use Illuminate\Database\Eloquent\Model;

class Analisis_pestal extends Model
{
    protected $table 		= 'tbl_contexto_Analisis_pestal';
    protected $primaryKey   = 'id_analisis_pestal';
    public $timestamps 		= true;

    protected 	$fillable = [
		'politicos',
		'economicos',
		'sociales',
		'tecnologicos',
		'ambientales',
		'legales',
		'fk_empresa',      
    ];
}
