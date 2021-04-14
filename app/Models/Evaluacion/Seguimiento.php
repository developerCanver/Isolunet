<?php

namespace App\Models\Evaluacion;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Seguimiento extends Model
{
    use HasFactory;
    protected $table 		= 'tbl_eva_seguimiento';
    protected $primaryKey   = 'id_seguimiento';
    public $timestamps 		= false;

    protected 	$fillable = [ 
        'id_seguimiento',	
        'proceso',	
        'medir',	
        'fuente',	
        'metodo',	
        'medicion',	
        'evaluacion',	
        'bool_estado',	
        'fk_empresa',
        ];

}
