<?php

namespace App\Models\Planificacion;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RiesgosOportuno extends Model
{
    use HasFactory;
    protected 	$fillable = [
		'nom_probabilidad',
		'nom_riesgo',
		'nom_negativo',        
		'control',        
		'probabilidad',        
		'impacto',        
		'cada_cuanto',        
		'bool_estado',        
		'fk_riesgo',        
    ];
}
/*
id_riesgo_opurtuno	
nom_probabilidad	
nom_riesgo	
nom_negativo	
control	
probabilidad	
impacto	
cada_cuanto	
bool_estado	
fk_riesgo
*/