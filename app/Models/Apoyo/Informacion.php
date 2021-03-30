<?php

namespace App\Models\Apoyo;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Informacion extends Model
{
    use HasFactory;
    protected $table 		= 'tbl_apo_informacion';
    protected $primaryKey   = 'id_informacion';
    public $timestamps 		= false;

    protected 	$fillable = [
                'conservasion',	
                'codigo',	
                'tipo_informacion',	
                'proceso',	
                'tit_documento',	
                'tit_registro',	
                'version',	
                'descripcion',	
                'responsable',	
                'lugar_archivo',	
                'digital',	
                'tie_retencion',	
                'dis_final',	
                'organiza',	
                'archivo',	
                'fecha_info',	
                'vigente',	
                'contralado',	
                'sis_gestion',	
                'no_copia',	
                'bool_estado',	
                'fk_empresa',
		     
    ];
}
