<?php

namespace App\Models\Anomalia_Origen;

use Illuminate\Database\Eloquent\Model;

class OrigenAnomalias extends Model
{
  
    protected $table 		= 'tbl_origen_anomalia';
    protected $primaryKey   = 'id_origen_anomalia';
    public $timestamps 		= true;

    protected 	$fillable = [
		'nombre',
		'bool_estado',
    ];

}
