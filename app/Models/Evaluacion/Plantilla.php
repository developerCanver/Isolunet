<?php

namespace App\Models\Evaluacion;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Plantilla extends Model
{
    use HasFactory;
    protected $table 		= 'tbl_eva_plantilla';
    protected $primaryKey   = 'id_plantilla';
    public $timestamps 		= false;

    protected 	$fillable = [ 
        'plantilla',	
        'obs_plantilla',	
        'fk_empresa',
        ];
}
