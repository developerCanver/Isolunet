<?php

namespace App\Models\Parametrizacion;

use Illuminate\Database\Eloquent\Model;

class Sistema_gestion extends Model
{
    protected $table 		  = 'tbl_sistemas_gestion';
    protected $primaryKey = 'id_sisgestion';
    public    $timestamps 		= true;
    protected $fillable = [
		'str_nombre',
		'str_sigla',
		'str_descripcion',  
		'fk_empresa',      
		'bool_estado',      
    ];
}
