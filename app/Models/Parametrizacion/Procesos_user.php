<?php

namespace App\Models\Parametrizacion;

use Illuminate\Database\Eloquent\Model;

class Procesos_user extends Model
{
    protected $table 		= 'tbl_procesos_user';
    
    public $timestamps 		= false;

    protected 	$fillable = [
        'proceso_id',
		'user_id',
		
      
    ];
}
