<?php

namespace App\Models\Mejora;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ActaAcciones extends Model
{
    use HasFactory;
    protected $table 		= 'tbl_mejo_acta_acciones';
    protected $primaryKey   = 'id_acciones';
    public $timestamps 		= false;

    protected 	$fillable = [ 
        'acta',	
        'accion',	
        'responsable',	
        'fecha_inicio_acc',	
        'fecha_final_acc',	
        'fk_acta ',	        

    ];
}
