<?php

namespace App\Models\Partes_interesadas;

use Illuminate\Database\Eloquent\Model;

class master extends Model
{
    protected $table 		= 'tbl_partei_master';
    protected $primaryKey   = 'id_partei_master';
    public $timestamps 		= true;

    protected 	$fillable = [
		'nombreInteresada',
		'impacto',
		'influencia',
		'expectativa',
		'estrategia',
		'medicion',
		'fk_empresa',
    ];

}
