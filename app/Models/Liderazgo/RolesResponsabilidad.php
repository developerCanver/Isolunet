<?php

namespace App\Models\Liderazgo;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RolesResponsabilidad extends Model
{
    use HasFactory;
    protected $table 		= 'tbl_lid_roles_responsabilidades';
    protected $primaryKey   = 'id_rol_res';
    public $timestamps 		= false;

    protected 	$fillable = [
        'nom_rol_res',  
        'bool_estado',        
        'fk_empresa',          
    ];



}
