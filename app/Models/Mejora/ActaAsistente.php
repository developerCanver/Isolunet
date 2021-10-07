<?php

namespace App\Models\mejora;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ActaAsistente extends Model
{
    use HasFactory;
    protected $table 		= 'tbl_mejo_acta_asistente';
    protected $primaryKey   = 'id_asistente';
    public $timestamps 		= false;

protected 	$fillable = [ 
    'asistente',		
    'bool_estado',	
    'fk_acta',	        

];
}
