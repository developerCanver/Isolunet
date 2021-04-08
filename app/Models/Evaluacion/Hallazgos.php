<?php

namespace App\Models\Evaluacion;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hallazgos extends Model
{
    use HasFactory;
    protected $table 		= 'tbl_plane_auditoria_hallazgos';
    protected $primaryKey   = 'id_hallazgos';
    public $timestamps 		= false;

    protected 	$fillable = [ 
        'ubicacion',	
        'descripciones',	
        'evidencia',	
        'requisito',	
        'num_detectadas',	
        'num_cerredas',	
        'bool_estado',	
        'reviso',	
        'aprobo',	
        'fk_empresa',
        ];
}
