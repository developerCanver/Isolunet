<?php

namespace App\Models\Parametrizacion;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CalificaionProveedor extends Model
{
    use HasFactory;
  
    protected $table 		= 'tbl_cal_proveedor';
    protected $primaryKey   = 'id_cal_proveedor';
    public $timestamps 		= true;

    protected 	$fillable = [
        'fec_evaluar',
        'cum_entrega', 
        'cum_pedidos',
        'cum_precios',
        'cum_servicios',         
        'cum_productos',        
        'total', 	        
        'bool_estado',         
        'fk_insumo',         
    ];

}
