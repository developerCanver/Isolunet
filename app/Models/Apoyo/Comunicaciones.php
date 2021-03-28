<?php

namespace App\Models\Apoyo;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comunicaciones extends Model
{
    use HasFactory;
    protected $table 		= 'tbl_apo_comunicaciones';
    protected $primaryKey   = 'id_comunicaciones';
    public $timestamps 		= false;

    protected 	$fillable = [
        'sgc',	
        'sga',	
        'sgscs',	
        'sgsst',	
        'asunto',	
        'mecanimo',	
        'detalle',	
        'frecuencia',	
        'interesada',	
        'apoyo',	
        'registros',	
        'fk_empresa',
		     
    ];
    /*
'sgc',	
'sga',	
'sgscs',	
'sgsst',	
'asunto',	
'mecanimo',	
'detalle',	
'frecuencia',	
'interesada',	
'apoyo',	
'registros',	
'fk_empresa',
    */

}
