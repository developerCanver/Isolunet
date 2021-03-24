<?php

namespace App\Models\Parametrizacion;

use Illuminate\Database\Eloquent\Model;

class Rol_User extends Model
{
    protected $table 		= 'role_user';
    public $timestamps 		= false;
   

    protected 	$fillable = [
        'role_id',
		'user_id',
    ];
}
