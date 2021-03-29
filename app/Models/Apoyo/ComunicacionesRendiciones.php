<?php

namespace App\Models\Apoyo;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ComunicacionesRendiciones extends Model
{
    use HasFactory;
    protected $table 		= 'tbl_apo_com_rendiciones';
    protected $primaryKey   = 'id_rendiciones';
    public $timestamps 		= false;

    protected 	$fillable = [
            'Quien',	
            'mecanismo',	
            'frecuencia',	
            'a_quien',	
            'registro',	
            'sistema',	
            'fk_empresa',
		     
    ];
}
