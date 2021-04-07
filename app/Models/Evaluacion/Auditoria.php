<?php

namespace App\Models\Evaluacion;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Auditoria extends Model
{
    use HasFactory;
    protected $table 		= 'tbl_plane_auditoria';
    protected $primaryKey   = 'id_auditoria';
    public $timestamps 		= false;

    protected 	$fillable = [ 
            'direcion',	
            'representante',	
            'correo',	
            'alcance',	
            'criterios',	
            'tipo_auditoria',	
            'multisitio',	
            'nocturno',	
            'descripcion',	
            'auditor_1',	
            'cooreo_aud_1',	
            'auditor_2',	
            'cooreo_aud_2',	
            'auditor_3',	
            'cooreo_aud_3',	
            'auditor_4',	
            'cooreo_aud_4',	
            'auditor_5',	
            'cooreo_aud_5',	
            'auditor_6',	
            'cooreo_aud_6',	
            'observaciones',	
            'modalidad',	
            'fecha_emision',	
            'bool_estado',	
            'fk_cargo',
];
}
/*
direcion	
representante	
correo	
alcance	
criterios	
tipo_auditoria	
multisitio	
nocturno	
descripcion	
auditor_1	
cooreo_aud_1	
auditor_2	
cooreo_aud_2	
auditor_3	
cooreo_aud_3	
auditor_4	
cooreo_aud_4	
auditor_5	
cooreo_aud_5	
auditor_6	
cooreo_aud_6	
observaciones	
modalidad	
bool_estado	
fk_cargo

*/