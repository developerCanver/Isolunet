<?php

namespace App\Models\Evaluacion;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Encuesta extends Model
{
    use HasFactory;
    protected $table 		= 'tbl_eva_encuesta';
    protected $primaryKey   = 'id_encuesta';
    public $timestamps 		= false;

    protected 	$fillable = [ 
        'cliente',	
        'quien',	
        'cargo',	
        'calidad',	
        'nivel',	
        'tiempo',	
        'plazos',	
        'atencion',	
        'inconvenientes',	
        'propuesta',	
        'bool_estado',	
        'fk_empresa',
        ];
}
