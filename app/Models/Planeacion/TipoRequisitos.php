<?php

namespace App\Models\Planeacion;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipoRequisitos extends Model
{
    use HasFactory;
    protected $table 		= 'tbl_plane_planeacion_tipo_car';
    protected $primaryKey   = 'id_tipo';
    public $timestamps 		= false;

    protected 	$fillable = [ 
        'nombre',	
        'unidad',	
        'minimo',	
        'maximo',	
        'metodo',	
        'tipo_cataa',	
        'fk_pla_control',
 
];
}
