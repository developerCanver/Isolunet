<?php

namespace App\Models\Liderazgo;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RolesCargos extends Model
{
    use HasFactory;
    protected $table 		= 'tbl_lid_roles_cargos';
    protected $primaryKey   = 'id_roles_cargo';
    public $timestamps 		= false;

    protected 	$fillable = [
        'fk_roles_res',          
        'fk_cargos',          
    ];
}
