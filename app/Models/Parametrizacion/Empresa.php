<?php

namespace App\Models\Parametrizacion;

use Illuminate\Database\Eloquent\Model;

class Empresa extends Model
{
    protected $table 		= 'tbl_empresa';
    protected $primaryKey   = 'id_empresa';
    public $timestamps 		= true;

    protected 	$fillable = [
        'razon_social',
        'nit', 
        'representante',           
        'direccion',           
        'celular',           
        'image',
        'bool_estado', 
        'fk_usuario',          
    ];

}
