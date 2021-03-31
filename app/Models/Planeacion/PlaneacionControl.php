<?php

namespace App\Models\Planeacion;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PlaneacionControl extends Model
{
    use HasFactory;
    protected $table 		= 'tbl_plane_planificacion';
    protected $primaryKey   = 'id_planeacion';
    public $timestamps 		= false;

    protected 	$fillable = [ 
        'proceso',	
        'material',	
        'variable',	
        'unidad',	
        'li',	
        'lc',	
        'ls',	
        'control',	
        'operacion',	
        'frecuencia',	
        'metodo',	
        'registro',	
        'instrumento',	    
        'seguimiento',	
        'bool_estado',	
        'fk_empresa',
];
}
