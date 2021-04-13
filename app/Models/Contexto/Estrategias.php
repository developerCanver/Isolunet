<?php

namespace App\Models\Contexto;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Estrategias extends Model
{
    use HasFactory;
    protected $table 		= 'tbl_contexto_estrategia';
    protected $primaryKey   = 'id_estrategia';
    public $timestamps 		= false;

    protected 	$fillable = [
        'pestal_est',	
        'estretegia',	
        'que_hacer',	
        'como_hacer',	
        'porque_hacer',	
        'quien',	
        'proceso',	
        'bool_estado',	
        'fk_empresa',
    ];

}
