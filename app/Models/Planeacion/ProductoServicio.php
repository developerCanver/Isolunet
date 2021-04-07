<?php

namespace App\Models\Planeacion;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductoServicio extends Model
{
    use HasFactory;
    protected $table 		= 'tbl_plane_producto_servicio';
    protected $primaryKey   = 'id_pro_servicio';
    public $timestamps 		= false;

    protected 	$fillable = [ 
        'calidad_n1',	
        'calidad_n2',	
        'ambiental_n1',	
        'ambiental_n2',	
        'sst_n1',	
        'sst_n2',	
        'inocuidad_n1',	
        'inocuidad_n2',	
        'basic_n1',	
        'basic_n2',	
        'compra',	
        'transporte',	
        'recibo',	
        'almacenamiento',	
        'uso',	
        'final',	
        'bool_estado',	
        'fk_insumo',
];
}
