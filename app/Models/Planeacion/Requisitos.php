<?php

namespace App\Models\Planeacion;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Requisitos extends Model
{
    use HasFactory;
    protected $table 		= 'tbl_plane_planeaciocontrol';
    protected $primaryKey   = 'id_pla_control';
    public $timestamps 		= false;

    protected 	$fillable = [ 
    'tecnica',	
    'des_producto',	
    'composicion',	
    'vida',	
    'condicion',	
    'envase',	
    'etiquetado',	
    'metodo',	
    'requisito',	
    'uso',	
    'fisico',	
    'biologico',	
    'quimico',	
    'presentacion',	
    'bool_estado',	
    'fk_producto',
 
];

}
