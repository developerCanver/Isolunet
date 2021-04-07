<?php

namespace App\Models\Evaluacion;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AuditoriaMultiple extends Model
{
    use HasFactory;
    protected $table 		= 'tbl_plane_auditoria_multiples';
    protected $primaryKey   = 'id_multiple';
    public $timestamps 		= false;

    protected 	$fillable = [ 
'fecha_multiple',	
'hora_inicio',	
'hora_fin',	
'requisitos',	
'equipo',	
'info_personas',	
'bool_estado',	
'fk_auditoria',
];
}
