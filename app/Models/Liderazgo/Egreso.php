<?php

namespace App\Models\Liderazgo;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Egreso extends Model
{
    use HasFactory;
    protected $table 		= 'tbl_contexto_egresos';
    protected $primaryKey   = 'id_egreso';
    public $timestamps 		= true;
  
    protected 	$fillable = [
        'nom_egreso',
        'proyectado_egreso',          
        'real_egreso',          
        'total_diferencia_egreso',          
        'diferencia_egreso',
        'bool_estado',          
        'fk_empresa',           
    ];

}
