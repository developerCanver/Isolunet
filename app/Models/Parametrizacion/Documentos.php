<?php

namespace App\Models\Parametrizacion;

use Illuminate\Database\Eloquent\Model;

class Documentos extends Model
{
    protected $table 		    = 'tbl_documentos';
    protected $primaryKey   = 'id_documento';
    public $timestamps 		  = true;

    protected 	$fillable = [
		'nom_documento',
		'sigla_documento',
		'bool_estado',
		'fk_empresa',
    ];
}
