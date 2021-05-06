<?php

namespace App\Models\Parametrizacion;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserAdmin extends Model
{
    use HasFactory;
    protected $table 		= 'users';
    public $timestamps 		= false;
   

    protected 	$fillable = [
        'name',
		'email',
		'password',
		'fk_empresa',
		'fk_rol',
    ];
}
