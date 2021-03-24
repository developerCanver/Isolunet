<?php

namespace App\Models\Planificacion;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Riesgos extends Model
{
    use HasFactory;
    protected $table 		= 'tbl_pla_matriz_riesgo';
    protected $primaryKey   = 'id_riesgo';
    public $timestamps 		= false;

    protected 	$fillable = [
		'nom_causa',
		'bool_estado',
		'fk_proceso',        
    ];

}
/*
id_riesgo
	nom_causa
    bool_estado
	fk_proceso
*/
