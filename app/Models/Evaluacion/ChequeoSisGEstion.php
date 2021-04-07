<?php

namespace App\Models\Evaluacion;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChequeoSisGEstion extends Model
{
    use HasFactory;
    protected $table 		= 'tbl_plane_auditoria_che_sis_gestion';
    protected $primaryKey   = 'id_che_sisgestion';
    public $timestamps 		= false;

    protected 	$fillable = [ 
        'seleccion_chequeo',	
        'bool_estado',	
        'fk_audchequeo',	
        'fk_sisgestion',
        ];
}
