<?php

namespace App\Models\Planeacion;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Liberacion extends Model
{
    use HasFactory;
    protected $table 		= 'tbl_plane_liberacion';
    protected $primaryKey   = 'id_liberacion';
    public $timestamps 		= false;

    protected 	$fillable = [ 
        'lote',	
        'fecha_realizacion',	
        'verificacion',	
        'libero',	
        'exigido',	
        'obtenido',	
        'indicacion',	
        'equipo',	
        'condicion',	
        'evidencia',	
        'bool_estado',	
        'fk_empresa',	
        'fk_producto',	
        'fk_cliente',	
];
}
