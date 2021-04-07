<?php

namespace App\Models\Evaluacion;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FortalesasOportunidadesGestion extends Model
{
    use HasFactory;				
    protected $table 		= 'tbl_plane_auditoria_foropur_gestion';
    protected $primaryKey   = 'id_foropur_gestion';
    public $timestamps 		= false;

    protected 	$fillable = [ 
        'seleccion_foropur',	
        'bool_estado',	
        'fk_foropur',	
        'fk_sisgestion',
        ];
}
