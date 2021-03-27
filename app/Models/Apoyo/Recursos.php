<?php

namespace App\Models\Apoyo;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Recursos extends Model
{
    use HasFactory;
    protected $table 		= 'tbl_apo_recursos';
    protected $primaryKey   = 'id_recurso';
    public $timestamps 		= false;

    protected 	$fillable = [
		'url',
		'fk_empresa',
		     
    ];


}
