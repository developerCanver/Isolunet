<?php

namespace App\Models\Contexto;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AlcanceModel extends Model
{
    use HasFactory;
    protected $table 		= 'tbl_contexto_alcances';
    protected $primaryKey   = 'id_alcance';
    public $timestamps 		= false;

    protected 	$fillable = [
        'nombre1',	
        'nombre2',	
        'bool_estado',	
        'fk_empresa',	
        'fk_sisgestion',
    ];
}
