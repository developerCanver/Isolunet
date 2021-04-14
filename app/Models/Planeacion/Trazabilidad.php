<?php

namespace App\Models\Planeacion;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Trazabilidad extends Model
{
    use HasFactory;
    protected $table 		= 'tbl_plane_trazabilidad';
    protected $primaryKey   = 'id_trazabilidad';
    public $timestamps 		= false;

    protected 	$fillable = [ 
            'fecha_trazabilidad',	
            'terminado',	
            'cliente_destino',	
            'orden_compra',	
            'orden_produccion',	
            'fecha_produccion',	
            'unidades',	
            'materias',	
            'utilizados',	
            'utilizados_lotes',	
            'provedor_materias',	
            'cantidad',	
            'destino_producto',	
            'fecha_entrega',	
            'cantidad_entrega',	
            'entrega',	
            'archivo_tra',	
            'bool_estado',	
            'fk_empresa',
 
];
}
