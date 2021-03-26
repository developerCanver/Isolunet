<?php

namespace App\Models\Apoyo;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Competencia extends Model
{
    use HasFactory;
    protected $table 		= 'tbl_apo_competencia';
    protected $primaryKey   = 'id_competencia';
    public $timestamps 		= false;

    protected 	$fillable = [
    'fecha_competencia',
    'cargo_com',	
    'area_com',	
    'genero',	
    'reporta_a',	
    'mision_cargo',	
    'directas',	
    'indirectas',	
    'nivel1',	
    'especialidad1',	
    'edu_area1',	
    'idioma1',	
    'sistema1',	
    'nivel2',	
    'especialidad2',	
    'edu_area2',	
    'idioma2',	
    'sistema2',	
    'exp_area1',	
    'tiempo1',	
    'exp_area2',	
    'tiempo2',	
    'exp_area3',	
    'tiempo3',	
    'descripcion',	
    'compartida1',	
    'dec_area1',	
    'autonoma1',	
    'compartida2',	
    'dec_area2',	
    'autonoma2',	
    'compartida3',	
    'dec_area3',	
    'autonoma3',	
    'compartida4',	
    'dec_area4',	
    'autonoma4',	
    'tecnica',	
    'especial',	
    'int_area1',	
    'int_objetivo1',	
    'int_area2',	
    'int_objetivo2',	
    'int_area3',	
    'int_objetivo3',	
    'ext_area1',	
    'ext_objetivo1',	
    'ext_area2',
    'ext_objetivo2',	
    'ext_area3',	
    'ext_objetivo3',	
    'actividades',
    'bool_estado',
    'fk_empresa',
	      
    ];
}
