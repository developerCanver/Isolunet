<?php

namespace App\Models\Apoyo;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InfomacionGestion extends Model
{
    use HasFactory;
    protected $table 		= 'tbl_apo_info_gestion';
    protected $primaryKey   = 'id_inf_ges ';
    public $timestamps 		= false;

    protected 	$fillable = [
                'fk_informacion ',	
                'fk_gestion ',	
		     
    ];

}
