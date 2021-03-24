<?php

namespace App\Models\sgto_medicion;

use Illuminate\Database\Eloquent\Model;

class Indicadores extends Model
{
    protected $table 		= 'tbl_indicadores';
    protected $primaryKey   = 'id_indicador';
    public $timestamps 		= true;

    protected 	$fillable = [
		'nombre',
		'fk_sgc',
		'fk_proceso',
		'frequencia',
		'freq_inicio',
		'mejor_hacia',
		'titulo_eje_y',
		'decimales',
    ];
}
