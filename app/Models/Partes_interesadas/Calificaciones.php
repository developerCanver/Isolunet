<?php

namespace App\Models\Partes_interesadas;

use Illuminate\Database\Eloquent\Model;

class Calificaciones extends Model
{
    protected $table 		= 'tbl_partei_calificaciones';
    protected $primaryKey   = 'id_calificaciones';
    public $timestamps 		= true;

    protected 	$fillable = [
		'calcualitativa5',
		'descripcion5',
		'calcualitativa4',
		'descripcion4',
		'calcualitativa3',
		'descripcion3',
		'calcualitativa2',
		'descripcion2',
		'calcualitativa1',
		'descripcion1',
		'tipopa',       
    ];
}
