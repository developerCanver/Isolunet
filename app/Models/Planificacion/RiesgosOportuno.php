<?php

namespace App\Models\Planificacion;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RiesgosOportuno extends Model
{
    use HasFactory;
	protected $table 		= 'tbl_pla_riesgo_oportuno';
    protected $primaryKey   = 'id_riesgo_opurtuno';
    public $timestamps 		= false;

    protected 	$fillable = [
		'nom_posivito',
		'nom_riesgo',
		'nom_negativo',        
		'control',        
		'probabilidad',        
		'impacto',   
		'bool_estado',        
		'fk_riesgo',        
		'ree_probabilidad',        
		'ree_impacto',        
		'nom_accion',        
		'nom_responsable',        
		'nom_indicador',        
    ];
}
/*
	id_riesgo_opurtuno	
	nom_posivito
	nom_riesgo	
	nom_negativo	
	control	
	probabilidad	
	impacto	
	bool_estado	
	ree_probabilidad	
	ree_impacto	
	nom_accion	
	nom_responsable	
	nom_indicador	
	
*/