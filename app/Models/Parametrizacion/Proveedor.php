<?php

namespace App\Models\Parametrizacion;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Proveedor extends Model
{
    use HasFactory;

    protected $table 		= 'tbl_proveedor';
    protected $primaryKey   = 'id_proveedor';
    public $timestamps 		= true;

    protected 	$fillable = [
        'nom_proveedor',
        'bool_estado',
        'ciudad',   
        'nit_proveedor',    
        'teléfono',   
        'fk_empresa',         
    ];
}
