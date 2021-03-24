<?php

namespace App\Models\Liderazgo;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ingreso extends Model
{
    use HasFactory;
    					
    protected $table 		= 'tbl_contexto_ingresos';
    protected $primaryKey   = 'id_ingreso';
    public $timestamps 		= true;

    protected 	$fillable = [
        'nom_ingreso',
        'proyectado_ingreso',          
        'real_ingreso',          
        'total_diferencia_ingreso',          
        'diferencia_ingreso', 
        'bool_estado',         
        'fk_empresa',           
    ];

}
