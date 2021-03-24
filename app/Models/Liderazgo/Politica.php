<?php

namespace App\Models\Liderazgo;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Politica extends Model
{
    use HasFactory;
    protected $table 		= 'tbl_politica';
    protected $primaryKey   = 'id_politica';
    public $timestamps 		= true;

    protected 	$fillable = [
        'politica',
        'fk_empresa',          
    ];
}
