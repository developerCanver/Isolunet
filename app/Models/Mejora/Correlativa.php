<?php

namespace App\Models\Mejora;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Correlativa extends Model
{
    use HasFactory;
    protected $table 		= 'tbl_mejo_correlativas';
    protected $primaryKey   = 'id_correlativa';
    public $timestamps 		= false;

    protected 	$fillable = [
        'que',	
        'quien',	
        'fecha_cer',	
        'archivo',	
        'fk_causa',
    ];
}
