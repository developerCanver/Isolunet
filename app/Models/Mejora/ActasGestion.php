<?php

namespace App\Models\Mejora;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ActasGestion extends Model
{
    use HasFactory;

    protected $table 		= 'tbl_mejo_acta_ges';
    public $timestamps 		= false;

protected 	$fillable = [ 
    'acta_id',	
    'gestion_id',		        

];
}
