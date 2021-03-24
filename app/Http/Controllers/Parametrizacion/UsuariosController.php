<?php

namespace App\Http\Controllers\Parametrizacion;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use DB;
use Redirect;
use Alert;
use View;
use Validator;

use Carbon\Carbon;
use Response;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

use Illuminate\Support\Facades\Hash;


use Entrust;
use App\Models\User;
use App\Models\Parametrizacion\Rol_User;


class UsuariosController extends Controller
{
    // Validacion de logueo
 	public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
    	if ($request) {
    		$empresa                = DB::table('tbl_empresa as e')
                                    ->join('users as u','e.fk_usuario','=','u.id')
                                    ->where('u.id','=',''.Auth::User()->id.'')
                                    ->where('e.bool_estado','=','1')
                                    ->first();

    		$tabla_usuarios_cliente = DB::table('users as u')
    								->join('tbl_empresa as e','u.fk_empresa','=','e.id_empresa')
                                    ->where('e.id_empresa','=',''.Auth::User()->fk_empresa.'')
                                    ->where('e.bool_estado','=','1')
    								->get();

    		return view('pages.parametrizacion.usuario_cliente',['empresa'=>$empresa,'tabla_usuarios_cliente'=>$tabla_usuarios_cliente]);
    	}
    }

    public function store(Request $request)
    {
    		try {
            DB::beginTransaction();
            
            $usuario 				= new User();
            $usuario->name			= $request->get('nom_completo');
            $usuario->email 		= $request->get('correo');
            $usuario->fk_empresa	= $request->get('empresa');
            $usuario->password 		= Hash::make($request->get('password'));
            $usuario->save();

            $consul_role = DB::table('roles')
            			->where('name','=','Usuario')
            			->first();

            $rol_user     			= new Rol_User();
            $rol_user->user_id		= $usuario->id;
            $rol_user->role_id 		= $consul_role->id;
            $rol_user->save(); 

            DB::commit();
           alert()->success('Se ha creado correctamente.', 'Creado!')->persistent('Cerrar');
           
        } catch (Exception $e) {
            DB::rollback();
            alert()->success('Ha ocurrido un error tratando de Guardar.', 'Guardado!')->persistent('Cerrar');
        }
        return Redirect::to('parm_usuarios')->with('status','Se guardó correctamente');
    }

    public function cambio_usuario(Request $request)
    {
        if ($request) {

            $empresa    = DB::table('tbl_empresa')
                        ->where('bool_estado','=','1')
                        ->get();

            $usuarios   = DB::table('users')
                        ->get();

            $tabla      = DB::table('users as u')
                        ->join('tbl_empresa as te','u.fk_empresa','=','te.id_empresa')
                        ->where('te.bool_estado','=','1')
                        ->paginate(10);

            return view('pages.parametrizacion.cambio_empresa',['empresa'=>$empresa,'usuarios'=>$usuarios,'tabla'=>$tabla]);
       }      
    }

    public function mover_usuario(Request $request)
    {
        try {
            DB::beginTransaction();
            $id = $request->get('usuarios');
            $usuario = User::findOrfail($id);
            $usuario->fk_empresa = $request->get('empresa');
            $usuario->update();

           DB::commit();
           alert()->success('Se ha asignado correctamente.', 'Asignado!')->persistent('Cerrar');
           
        } catch (Exception $e) {
            DB::rollback();
            alert()->success('Ha ocurrido un error tratando de asignar', 'Creado!')->persistent('Cerrar');
        }
        return Redirect::to('parm_usuarios_camb')->with('status','Se actualizó correctamente');
    }
}
