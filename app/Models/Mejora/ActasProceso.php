<?php

namespace App\Models\Mejora;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ActasProceso extends Model
{
    use HasFactory;

    protected $table 		= 'tbl_mejo_acta_proce';
    public $timestamps 		= false;

    protected 	$fillable = [ 
        'acta_id',	
        'proceso_id',		        

    ];
}
