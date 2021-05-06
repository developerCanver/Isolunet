<?php

namespace App\Http\Controllers\Parametrizacion;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;

class UserAdminController extends Controller
{
    // Validacion de logueo
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
    	
        $empresas       = DB::table('tbl_empresa as e')                           
                        ->where('e.bool_estado','=','1')
                        ->get();
                           

    $consultas = DB::table('users as u')
             ->join('roles as r','r.id','=','u.fk_rol')
             //->join('tbl_empresa as e','e.fk_usuario','=','u.id')
             ->join('tbl_empresa as e','e.id_empresa','=','u.fk_empresa')
            //->where('id_empresa', $empresa->id_empresa)
            //->where('u.bool_estado','=','1')
            ->paginate(20);
            //dd($consultas);

    		return view('pages.parametrizacion.usuarioAdmin.index',[
                'empresas'=>$empresas,
                'consultas'=>$consultas
                ]);
    	
    }

    public function store(Request $request)
    {
        $request->validate([
            'nom_completo' =>'required|min:4|max:150',
            'correo'       =>'required|min:4|unique:users,email',
            'password'     =>'required|min:4|max:150',
        ]);
    		try {
            DB::beginTransaction();

            $usuario 				= new User();
            $usuario->name			= $request->get('nom_completo');
            $usuario->email 		= $request->get('correo');
            $usuario->fk_empresa	= $request->get('empresa');
            $usuario->fk_rol	    = $request->get('fk_rol');
            $usuario->password 		= Hash::make($request->get('password'));
            $usuario->save();

            // $consul_role = DB::table('roles')
            // 			->where('name','=','Usuario')
            // 			->first();

       

            DB::commit();
           alert()->success('Se ha creado correctamente.', 'Creado!')->persistent('Cerrar');
           
        } catch (Exception $e) {
            DB::rollback();
            alert()->success('Ha ocurrido un error tratando de Guardar.', 'Guardado!')->persistent('Cerrar');
        }
        return Redirect::to('parm_usuarios')->with('status','Se guardó correctamente');
    }

    public function update(Request $request)
    {
    		try {
            DB::beginTransaction();

            $data = request()->validate([
                'nom_completo'=>'required|min:4|max:150',
                'correo'=>'required|min:4|unique:users,email,'.$request->id,
            ]);
            // 'correo'=> ['required|min:4|unique:users,email', Rule:.unique('users')->ignore($request->id)],
            $usuario 				= new User();
            $usuario->name			= $request->get('nom_completo');
            $usuario->email 		= $request->get('correo');
            $usuario->fk_empresa	= $request->get('empresa');
            $usuario->fk_rol	    = $request->get('fk_rol');
            $usuario->password 		= Hash::make($request->get('password'));
            $usuario->save();

            // $consul_role = DB::table('roles')
            // 			->where('name','=','Usuario')
            // 			->first();

       

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
