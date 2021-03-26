<?php

namespace App\Models\Planificacion;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SistemaGestion extends Model
{
    use HasFactory;
    protected $table 		= 'tbl_pla_gestion_cambio';
    protected $primaryKey   = 'id_riesgo';
    public $timestamps 		= false;

    protected 	$fillable = [
		'fk_gestion',
		'fk_cambio',      
    ];
}

