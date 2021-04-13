<?php

namespace App\Models\Contexto;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MatrizDofa extends Model
{
    use HasFactory;
    protected $table 		= 'tbl_contexto_matriz';
    protected $primaryKey   = 'id_matriz';
    public $timestamps 		= false;

    protected 	$fillable = [
        'tipo_oa',	
        'tipo_fd',	
        'opo_ame',	
        'for_deb',	
        'descrpcion_matriz',	
        'bool_estado',	
        'fk_empresa',
    ];
}
