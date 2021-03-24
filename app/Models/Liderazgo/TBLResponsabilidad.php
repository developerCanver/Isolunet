<?php

namespace App\Models\Liderazgo;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TBLResponsabilidad extends Model
{
    use HasFactory;
    protected $table 		= 'tbl_lid_responsabilidades';
    protected $primaryKey   = 'id_responsabilidades';
    public $timestamps 		= false;

    protected 	$fillable = [
        'nom_responsabilidades',  
        'cuentas_rinde',        
        'autoridad',          
        'a_quien',          
        'cada_cuanto',          
        'fk_roles_res',          
    ];
}
