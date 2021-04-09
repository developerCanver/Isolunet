<?php

namespace App\Models\Evaluacion;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Revision extends Model
{
    use HasFactory;
    protected $table 		= 'tbl_eva_revision';
    protected $primaryKey   = 'id_revision';
    public $timestamps 		= false;

    protected 	$fillable = [ 
            'fecha_revision',	
            'periodo',	
            'entrada_salida',	
            'bool_estado',	
            'fk_empresa',
        ];
}
