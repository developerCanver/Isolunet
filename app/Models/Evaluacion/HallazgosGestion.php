<?php

namespace App\Models\Evaluacion;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HallazgosGestion extends Model
{
    use HasFactory;
    protected $table 		= 'tbl_plane_auditoria_hallazgos_gestion';
    protected $primaryKey   = 'id_hallazgos_gestion';
    public $timestamps 		= false;

    protected 	$fillable = [ 
        'seleccion_hallazgos',	
        'bool_estado',	
        'fk_hallazgos',	
        'fk_sisgestion',
        ];
}
