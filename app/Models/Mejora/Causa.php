<?php

namespace App\Models\Mejora;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Causa extends Model
{
    use HasFactory;
    protected $table 		= 'tbl_mejo_causas';
    protected $primaryKey   = 'id_causas';
    public $timestamps 		= false;

    protected 	$fillable = [
		'causa',
		'fk_anomalia',
	
    ];
}
