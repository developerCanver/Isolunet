<?php

namespace App\Models\Parametrizacion;

use Illuminate\Database\Eloquent\Model;

class Cargos extends Model
{
    protected $table 		= 'tbl_cargos';
    protected $primaryKey   = 'id_cargo';
    public $timestamps 		= true;

    protected 	$fillable = [
		'nom_cargo',
		'bool_estado',
		'fk_area',        
    ];
}
