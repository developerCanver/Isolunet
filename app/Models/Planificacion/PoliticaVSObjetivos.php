<?php

namespace App\Models\Planificacion;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PoliticaVSObjetivos extends Model
{
    use HasFactory;
    protected $table 		= 'tbl_pla_politica_objetivo';
    protected $primaryKey   = 'id_politica_objetivo';
    public $timestamps 		= false;

    protected 	$fillable = [
		'integrada',	
        'nom_objetivos',	
        'meta',	
        'indicador',	
        'unidad',	
        'frecuencia',	
        'directrices',	
        'mejor',	
        'actividad',	
        'recurso',	
        'fecha_finilizacion',	
        'evaluacion',	
        'bool_estado',	
        'fk_politica',	
        'fk_proceso',	
        'fk_cargo',       
    ];

}
/*
integrada	
nom_objetivos	
meta
indicador	
unidad	
frecuencia	
directrices	
mejor	
actividad	
recurso	
fecha_finilizacion	
evaluacion	
bool_estado	
fk_politica	
fk_proceso	
fk_cargo

*/
