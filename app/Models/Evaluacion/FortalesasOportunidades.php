<?php

namespace App\Models\Evaluacion;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FortalesasOportunidades extends Model
{
    use HasFactory;
    protected $table 		= 'tbl_plane_auditoria_foropur';
    protected $primaryKey   = 'id_foropur';
    public $timestamps 		= false;

    protected 	$fillable = [ 
        'fecha_foropur',	
        'lider',	
        'equipo',	
        'tipo_informe',	
        'descripcion_foropur',	
        'bool_estado',	
        'fk_proceso',	
        'fk_usuario',
        ];

   
}
