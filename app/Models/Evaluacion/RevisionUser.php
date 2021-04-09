<?php

namespace App\Models\Evaluacion;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RevisionUser extends Model
{
    use HasFactory;
    protected $table 		= 'tbl_eva_revision_users';
    protected $primaryKey   = 'id_revision_user';
    public $timestamps 		= false;

    protected 	$fillable = [ 
        'represeta',	
        'bool_estado',	
        'fk_revision',	
        'fk_user',	
        'fk_cargor',
        ];
}
