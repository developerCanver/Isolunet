<?php

namespace App\Models\Parametrizacion;

use Illuminate\Database\Eloquent\Model;

class Procesos extends Model
{
    protected $table 		= 'tbl_procesos';
    protected $primaryKey   = 'id_proceso';
    public $timestamps 		= true;

    protected 	$fillable = [
        'tipo_proceso',
		'nom_proceso',
		'sigla',
		'fk_usuario_responsable',
		'descripcion',
		'fk_empresa',          
		'bool_estado',          
    ];
}
