<?php

namespace App\Models\Parametrizacion;

use Illuminate\Database\Eloquent\Model;

class Sistema_procesos extends Model
{
    protected $table 		= 'tbl_sistemas_gestion_procesos';
    public $timestamps 		= false;

    protected 	$fillable = [
		'proceso_id',
		'sisgestionr_id',
     
    ];
}
