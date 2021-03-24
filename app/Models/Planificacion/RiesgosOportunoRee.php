<?php

namespace App\Models\Planificacion;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RiesgosOportunoRee extends Model
{
    use HasFactory;
    protected $table 		= 'tbl_pla_rie_opor_reevaluacion';
    protected $primaryKey   = 'id_rie_opu_reevaluacion';
    public $timestamps 		= false;

    protected 	$fillable = [
		'ree_probabilidad',
		'ree_impacto',
		'nom_accion',        
		'nom_responsable',        
		'nom_indicador',        
		'bool_estado',        
		'fk_riesgo',        
    ];
}
/*
ree_probabilidad	
ree_impacto	
nom_accion	
nom_responsable	
nom_indicador	
bool_estado	
fk_riesgo
*/