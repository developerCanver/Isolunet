<?php

namespace App\Models\mejora;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ActaTemas extends Model
{
    use HasFactory;
    protected $table 		= 'tbl_mejo_acta_temas';
    protected $primaryKey   = 'id_tema';
    public $timestamps 		= false;

protected 	$fillable = [ 
    'tema',	
    'comentario',	
    'bool_estado',	
    'fk_acta',	        

];
}
