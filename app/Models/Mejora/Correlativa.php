<?php

namespace App\Models\Mejora;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Correlativa extends Model
{
    use HasFactory;
    protected $table 		= 'tbl_mejo_correlativas';
    protected $primaryKey   = 'id_correlativa';
    public $timestamps 		= false;

    protected 	$fillable = [
        'que',	
        'quien',	
        'fecha_cer',	
        'archivo',	
        'compromiso_co',
        'accion_co',
        'fecha_ini_co',
        'fecha_fin_co',
        'terminada_co',
        'observaciones_co',
        'fk_causa',
    ];
}
