<?php

namespace App\Models\Parametrizacion;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Insumo extends Model
{
    use HasFactory;

    protected $table 		= 'tbl_insumos';
    protected $primaryKey   = 'id_insumo';
    public $timestamps 		= true;

    protected 	$fillable = [
        'nom_insumo',
        'bool_estado',
        'fk_proveedor',          
        'cal_proveedor_status',          
    ];
}
