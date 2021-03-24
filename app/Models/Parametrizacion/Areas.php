<?php

namespace App\Models\Parametrizacion;

use Illuminate\Database\Eloquent\Model;

class Areas extends Model
{
    protected $table 		= 'tbl_areas';
    protected $primaryKey   = 'id_area';
    public $timestamps 		= true;

    protected 	$fillable = [
		'nom_area',
		'bool_estado',
		'fk_empresa',        
    ];
}
