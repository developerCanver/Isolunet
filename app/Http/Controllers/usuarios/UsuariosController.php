<?php

namespace App\Http\Controllers\usuarios;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use DB;
use Redirect;
use RealRashid\SweetAlert\Facades\Alert;


/**
 * Carga de modelos
 */
use App\Models\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;


/**
 * carga de request - validaciones
 */
use App\Http\Requests\UsuariosRequest;

class UsuariosController extends Controller
{
	
	private $form = 'create';    
    
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware(['permission:crear usuario'],['only' => 'create','store']);

    }


    public function index(Request $request)
    {	
    	$user = new User();
    	$users = User::orderBy('id','Desc')->paginate(15);
        $roles = Role::all()->pluck('name','id');
    	return view('administracion_usuarios.panel',[
    		'users' => $users,
    		'user'  => $user,
    		'form'  => $this->form,
            'roles' => $roles
     	]);
    }

    public function store(UsuariosRequest $request)
    {
    	try {
    		
    		DB::beginTransaction();

    			$user 				= new User();
    			$user->name			= $request->get('name');
    			$user->email  		= $request->get('email');
    			$user->password		= bcrypt($request->get('password'));

                if ($user->save()) {
                    $user->assignRole($request->get('rol'));
                }
    			    			
                alert()->success('Se creo Correctamente', 'asdas')->autoclose(1500);
    		DB::commit();

    	} catch (Exception $e) {
    		DB::rollback();
    	}

    	return Redirect::to('administracion_usuarios');
    }

    public function edit($id)
    {
        $user =  User::findOrFail($id);
        $users = User::orderBy('id','Desc')->paginate(15);
        $form = 'edit';
        $roles = Role::all()->pluck('name','id');
        return view('administracion_usuarios.panel',[
            'users' => $users,
            'user'  => $user,
            'form'  => $form,
            'roles' => $roles
        ]);
    }

    public function update(UsuariosRequest $request,$id)
    {

        try {
            
            DB::beginTransaction();

                $user               = User::findOrFail($id);
                $user->name         = $request->get('name');
                $user->email        = $request->get('email');

                if ($request->get('password') != null) {
                    $user->password     = bcrypt($request->get('password'));
                }
                
                $user->syncRoles($request->get('rol'));
                $user->update();

                
                alert()->success('Se Modifico Correctamente', 'asdas')->autoclose(1500);
            DB::commit();

        } catch (Exception $e) {
            DB::rollback();
        }

        return Redirect::to('administracion_usuarios');
    }

    public function destroy($id)
    {
         try {
            
            DB::beginTransaction();

                $user               = User::findOrFail($id);
                $user->delete();

                
                alert()->success('Se Elimino Correctamente', 'asdas')->autoclose(1500);
            DB::commit();

        } catch (Exception $e) {
            DB::rollback();
        }

        return Redirect::to('administracion_usuarios');
    }

}
