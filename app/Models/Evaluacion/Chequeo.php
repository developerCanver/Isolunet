<?php

namespace App\Models\Evaluacion;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chequeo extends Model
{
    use HasFactory;
    protected $table 		= 'tbl_plane_auditoria_chequeo';
    protected $primaryKey   = 'id_chequeo';
    public $timestamps 		= false;

    protected 	$fillable = [ 
        'fecha_chequeo',	
        'equi_auditor',	
        'aspectos',	
        'cumple',	
        'obervaciones_chequeo',	
        'bool_estado',	
        'fk_proceso',
        ];

}
