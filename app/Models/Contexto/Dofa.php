<?php

namespace App\Models\Contexto;

use Illuminate\Database\Eloquent\Model;

class Dofa extends Model
{
    protected $table 		= 'tbl_contexto_dofa';
    protected $primaryKey   = 'id_dofa';
    public $timestamps 		= true;

    protected 	$fillable = [
		'debilidades',
		'fortalezas',
		'amenazas',
		'oportunidades',
		'fk_empresa',  
    ];
}
