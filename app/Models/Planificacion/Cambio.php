<?php

namespace App\Models\Planificacion;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cambio extends Model
{
    use HasFactory;
    protected $table 		= 'tbl_pla_cambio';
    protected $primaryKey   = 'id_cambio';
    public $timestamps 		= false;

    protected 	$fillable = [
		'fecha_cambio',	
        'cambio_interno',	
        'cambio_externo',	
        'otro_interno',	
        'otro_externo',	
        'actividad',	
        'responsable',	
        'tiempo',	
        'recursos',	
        'seguimiento',	
        'validad',	
        'archivo',	
        'descripcionCambio',	
        'justificacionCambio',	
        'bool_estado',	
        'fk_proceso',	
        'fk_usuario',	
        'fk_cargo',       
        'fk_empresa',       
    ];
}
/*
id_cambio	
fecha_cambio	
cambio_interno	
cambio_externo	
otro_interno	
otro_externo	
actividad	
responsable	
tiempo	
recursos	
seguimiento	
validad	
bool_estado	
fk_proceso	
fk_usuario	
fk_cargo
*/