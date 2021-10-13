<?php

namespace App\Models\Mejora;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Acta extends Model
{
    use HasFactory;
    protected $table 		= 'tbl_mejo_acta';
    protected $primaryKey   = 'id_acta';
    public $timestamps 		= false;

protected 	$fillable = [ 
	'acta',	
    'gestion',	
    'proceso',	
    'tipo_acta',	
    'fecha_acta',	
    'lugar',	
    'hora_acta',	
    'fecha_proxima',	
    'registrado',	
    'observaciones_acta',	
    'accion',	
    'responsable',	
    'fecha_inicio_acc',	
    'fecha_final_acc',	
    'compromiso',	
    'ejecutable',	
    'fecha_inicio_eje',	
    'fecha_final_eje',	
    'archivo',	
    'observaciones_ejecuccion',	
    'terminada',	
    'bool_estado',	
    'otros_user',
    'fk_empresa',         

];
}