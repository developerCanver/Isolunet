<?php

namespace App\Models\Parametrizacion;

use Illuminate\Database\Eloquent\Model;

class DatosCorporativos extends Model
{
    protected $table 		= 'tbl_datos_corporativos';
    protected $primaryKey   = 'id_datos_corporativos';
    public $timestamps 		= true;

    protected 	$fillable = [
        'str_mision',
		'str_vision',
		'str_principios',
		'str_estrategias',
		'str_politica',
		'str_Objetivos',
		'fk_empresa',         
    ];
}
