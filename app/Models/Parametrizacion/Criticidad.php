<?php

namespace App\Models\Parametrizacion;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Criticidad extends Model
{
    use HasFactory;
    protected $table 		= 'tbl_criticidad';
    protected $primaryKey   = 'id_criticidad';
    public $timestamps 		= true;

    protected 	$fillable = [
        'antiguedad',
        'calidad',
        'ubicacion', 
        'postventa',
        'cal_total',
        'bool_estado',         
        'fk_insumo',         
    ];
}
