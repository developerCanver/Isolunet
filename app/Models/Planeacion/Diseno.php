<?php

namespace App\Models\Planeacion;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Diseno extends Model
{
    use HasFactory;
    use HasFactory;
    protected $table 		= 'tbl_plane_diseño';
    protected $primaryKey   = 'id_diseno';
    public $timestamps 		= false;

    protected 	$fillable = [ 
        'general',	
        'unitarios',	
        'cate_aspectos',	
        'aspectos_ambiental',	
        'impacto',	
        'responsabilidad',	
        'situacion',	
        'tipo_impacto',	
        'legal',	
        'control',	
        'periodicidad',	
        'intensidad',	
        'permanencia',	
        'afectacion',	
        'num_sinificancia',	
        'sinificancia',	
        'programa',	
        'bool_estado',
        'fk_empresa',
];
}
