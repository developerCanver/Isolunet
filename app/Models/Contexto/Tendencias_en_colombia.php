<?php

namespace App\Models\Contexto;

use Illuminate\Database\Eloquent\Model;

class Tendencias_en_colombia extends Model
{
    protected $table 		= 'tbl_contexto_tendencias_colombia';
    protected $primaryKey   = 'id_tendencia_colombia';
    public $timestamps 		= true;

    protected 	$fillable = [
		'tendencia_colombia',
		'fk_empresa',        
    ];
}
