<?php

namespace App\Http\Controllers\Parametrizacion;

use App\Http\Controllers\Controller;
use App\Models\Parametrizacion\UserAdmin;
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
                     
        $empresa       = DB::table('users as u')   
                        ->join('tbl_empresa as e','e.id_empresa','=','u.fk_empresa')                       
                        ->where('u.id',Auth::User()->id)
                        ->where('e.bool_estado',1)
                        ->first();
                        if ($empresa==null) {
                            Auth::logout();
                            return Redirect::to('login')->with('status','Se guardó correctamente');
                        }
                       
                           
        $usuario 					= User::findOrfail(Auth::User()->id);
        $rolUsuario=$usuario->fk_rol;
        $id_empresa=$usuario->fk_empresa;

        if ($rolUsuario==1) {
            $consultas = DB::table('users as u')
                                ->join('roles as r','r.id','=','u.fk_rol')
                                ->join('tbl_empresa as e','e.id_empresa','=','u.fk_empresa')
                                ->orderByDesc('u.id')
                                ->select(
                                    "u.id as id_user",
                                    "u.name",
                                    "u.email",
                                    "razon_social",
                                    "name_rol",
                                    "fk_empresa",
                                    "fk_rol",
                                    "imgUser"
                                    )
                                //->where('fk_rol','!=',1)
                                ->paginate(20);
            
        }else if($rolUsuario==2 ){
            $consultas = DB::table('users as u')
                            ->join('roles as r','r.id','=','u.fk_rol')
                            ->join('tbl_empresa as e','e.id_empresa','=','u.fk_empresa')
                            ->where('fk_empresa',$id_empresa)
                            ->orderByDesc('u.id')
                            ->select(
                            "u.id as id_user",
                            "u.name",
                            "u.email",
                            "razon_social",
                            "name_rol",
                            "fk_empresa",
                            "fk_rol",
                            "imgUser"
                            )
                            ->paginate(20);
               //dd($usuario);

        }else if( $rolUsuario==3 ){
            $consultas = DB::table('users as u')
            ->join('roles as r','r.id','=','u.fk_rol')
            ->join('tbl_empresa as e','e.id_empresa','=','u.fk_empresa')
            ->where('fk_empresa',$id_empresa)
            ->where('u.id',Auth::User()->id)
            ->orderByDesc('u.id')
           ->select(
               "u.id as id_user",
               "u.name",
               "u.email",
               "razon_social",
               "name_rol",
               "fk_empresa",
               "fk_rol",
               "imgUser"
               )
               ->paginate();
               //dd($consultas);

        }

        //dd($consultas);
    		return view('pages.parametrizacion.usuarioAdmin.index',[
                'empresa'=>$empresa,
                'empresas'=>$empresas,
                'consultas'=>$consultas,
                'rolUsuario'=>$rolUsuario,
                'usuario'=>$usuario,
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
            $usuario->fk_empresa	= $request->get('fk_empresa');
            $usuario->fk_rol	    = $request->get('fk_rol');
            $usuario->password 		= Hash::make($request->get('password'));
           // dd($request->file('imgUser'));
            if ($request->file('imgUser')) {
                $file =$request->file('imgUser');
                $name = time().$file->getClientOriginalName();
                $file->move(public_path().'/img/users/', $name);
            } else {
                $name='';
                
            }
            $usuario->imgUser =  $name;

            $usuario->save();

    
       

            DB::commit();
           alert()->success('Se ha creado correctamente.', 'Creado!')->persistent('Cerrar');
           
        } catch (Exception $e) {
            DB::rollback();
            alert()->success('Ha ocurrido un error tratando de Guardar.', 'Guardado!')->persistent('Cerrar');
        }
        return Redirect::to('parametrizacion_users')->with('status','Se guardó correctamente');
    }

    public function update(Request $request,$id)
    {

        DB::beginTransaction();
       

        $data = request()->validate([
            'nom_completo'=>'required|max:150',
            'correo'=>'required|min:4|unique:users,email,'.$id,
        ]);
        // 'correo'=> ['required|min:4|unique:users,email', Rule:.unique('users')->ignore($request->id)],
    		try {
     
            $usuario                = UserAdmin::findOrFail($id);
            $usuario->name			= $request->get('nom_completo');
            $usuario->email 		= $request->get('correo');
            $usuario->fk_empresa	= $request->get('fk_empresa');
            $usuario->fk_rol	    = $request->get('fk_rol');
            if ($request->get('password')) {
                $usuario->password 		= Hash::make($request->get('password'));
            }

            if ($request->file('imgUser')) {
                $archivo=$request->get('imgUser_anterior');
                //nombre para eliinar el anterior archivo
                    $mi_archivo= public_path().'/img/users/'.$archivo;
                    if (is_file($mi_archivo)) {
                        unlink(public_path().'/img/users/'.$archivo);
                    }
                $file =$request->file('imgUser');
                $name = time().$file->getClientOriginalName();
                $file->move(public_path().'/img/users/', $name);
                $usuario->imgUser =  $name;
            
            }
            $usuario->save();

            DB::commit();
           alert()->success('Se ha creado correctamente.', 'Creado!')->persistent('Cerrar');
           
        } catch (Exception $e) {
            DB::rollback();
            alert()->success('Ha ocurrido un error tratando de Guardar.', 'Guardado!')->persistent('Cerrar');
        }
        return Redirect::to('parametrizacion_users')->with('status','Se guardó correctamente');
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

    public function destroy($id)
{
        try {
        DB::beginTransaction();
        // ActaAsistente::where('fk_acta', $id)->delete();
        // ActaTemas::where('fk_acta', $id)->delete();
       // dd($id);
        $variable 					= UserAdmin::findOrfail($id);

  
        $variable -> delete();
        


        DB::commit();
        return Redirect::to('parametrizacion_users')->with('status','Se eliminó correctamente');
    } catch (Exception $e) {
        DB::rollback();
    }
}
}
