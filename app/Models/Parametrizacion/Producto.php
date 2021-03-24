<?php

namespace App\Models\Parametrizacion;

use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    protected $table 		= 'tbl_producto';
    protected $primaryKey   = 'id_producto';
    public $timestamps 		= true;

    protected 	$fillable = [
        'str_producto',
        'str_imagen',
        'bool_estado', 
        'fk_usuario',          
    ];
}
