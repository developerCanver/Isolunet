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
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

use App\Models\Parametrizacion\Empresa;
use App\Http\Requests\EmpresaFormRequest;
use App\Models\User;

class EmpresaController extends Controller
{
 	// Validacion de logueo
 	public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
    	if($request){
    		$usuarios = DB::table('users')
    					->get();

    		$empresa = DB::table('tbl_empresa')
    				->where('bool_estado','=','1')
    				->paginate(15);

    		return view('pages.parametrizacion.empresa',['usuarios'=>$usuarios,'empresa'=>$empresa]);
    	}
    }

    public function store(EmpresaFormRequest $request)
    {
    	try {
            DB::beginTransaction();
            
            $empresa 					= new Empresa();
            $empresa->razon_social		= $request->get('razon_social');
            $empresa->nit 				= $request->get('nit');
            $empresa->representante 	= $request->get('representante');
            $empresa->direccion			= $request->get('direccion');
            $empresa->celular			= $request->get('celular');
            
            if ($request->hasFile('image')){
                $file=  $request->file('image');
                $file->move(public_path().'/imgs/logo_empresa/',$file->getClientOriginalName());
                $empresa->image =$file->getClientOriginalName();
            }
            $empresa->bool_estado		= 1;
            $empresa->fk_usuario		= $request->get('fk_usuario');
            $empresa->save();

            $usuarios                   = User::findOrfail($request->get('fk_usuario'));
            $usuarios->fk_empresa       = $empresa->id_empresa;
            $usuarios->update(); 

           DB::commit();
           return Redirect::to('parm_empresa')->with('status','Se guardó correctamente');
        } catch (Exception $e) {
            DB::rollback();
        }
    }

    public function edit($id)
    {
    	$empresa    = Empresa::where('id_empresa','=',$id)->firstOrfail();
    	$usuarios   = DB::table('users')
    					->get();

    	return view('pages.parametrizacion.edit_empresa',['empresa'=>$empresa,'usuarios'=>$usuarios]);
    }

    public function update(Request $request,$id)
    {
    	try {
            DB::beginTransaction();
            
            $empresa 					= Empresa::findOrfail($id);
            $empresa->razon_social		= $request->get('razon_social');
            $empresa->nit 				= $request->get('nit');
            $empresa->representante 	= $request->get('representante');
            $empresa->direccion			= $request->get('direccion');
            $empresa->celular			= $request->get('celular');
            
            if ($request->hasFile('image')){
                $file= $request->file('image');
                $file->move(public_path().'/imgs/logo_empresa/',$file->getClientOriginalName());
                $empresa->image =$file->getClientOriginalName();
            }
            $empresa->bool_estado			= 1;
            $empresa->fk_usuario		= $request->get('fk_usuario');
            $empresa->update();

           DB::commit();
           return Redirect::to('parm_empresa')->with('status','Se actualizó correctamente');
        } catch (Exception $e) {
            DB::rollback();
        }
    }

    public function destroy($id)
    {
    	try {
            DB::beginTransaction();
            
            $empresa 					= Empresa::findOrfail($id);
            $empresa->bool_estado		= 0;
            $empresa->update();

           DB::commit();
           return Redirect::to('parm_empresa')->with('status','Se eliminó correctamente');
        } catch (Exception $e) {
            DB::rollback();
        }
    }
}
