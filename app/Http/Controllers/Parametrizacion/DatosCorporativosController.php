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

use App\Models\Parametrizacion\DatosCorporativos;
use App\Models\Parametrizacion\Empresa;

// use App\Http\Requests\DatosCorporativos;

class DatosCorporativosController extends Controller
{
    	// Validacion de logueo
 	public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
    	if($request){
    		
    		$empresa_count = DB::table('tbl_empresa')
    				->where('fk_usuario','=',Auth::User()->id)
    				->where('bool_estado','=','1')
    				->get();
    		
    				// dd($empresa);
    		if (count($empresa_count) < 1) {	
    			return view('pages.parametrizacion.datos_corporativa_sin_datos');
    		}else{
                
    			$empresa = DB::table('tbl_empresa')
		    				->where('id_empresa','=',''.Auth::User()->fk_empresa.'')
		    				->where('bool_estado','=','1')
		    				->first();

    			$datos_corporativos_count = DB::table('tbl_datos_corporativos')
    								->where('fk_empresa','=',''.$empresa->id_empresa.'')
    								->get();

    		
    			$datos_corporativos = DB::table('tbl_datos_corporativos')
    								->where('fk_empresa','=',''.$empresa->id_empresa.'')
    								->first();
    			
    			return view('pages.parametrizacion.datos_corporativa',['empresa'=>$empresa,'datos_corporativos'=>$datos_corporativos,'datos_corporativos_count'=>$datos_corporativos_count]);

    		}
    		// dd($empresa);
    		
    	}
    }

    public function store(Request $request)
    {
    	
    	$id_empresa = $request->get('fk_empresa');
    	$validacion_update = DatosCorporativos::where('fk_empresa','=',$id_empresa)->get();

    	if (count($validacion_update) < 1) {
    		try {
	            DB::beginTransaction();
	            
	            $empresa 						= new DatosCorporativos();
	            $empresa->str_mision			= $request->get('str_mision');
				$empresa->str_vision			= $request->get('str_vision');
				$empresa->str_principios		= $request->get('str_principios');
				$empresa->str_estrategias		= $request->get('str_estrategias');
				$empresa->str_politica			= $request->get('str_politica');
				$empresa->str_Objetivos			= $request->get('str_Objetivos');
				$empresa->fk_empresa			= $request->get('fk_empresa');
	            $empresa->save();

	           DB::commit();
	           alert()->success('Se ha creado correctamente.', 'Creado!')->persistent('Cerrar');
	           return Redirect::to('parm_datos_corportativo')->with('status','Se guardó correctamente');
	        } catch (Exception $e) {
	            DB::rollback();
	        }
    	}else{
    		try {
	            DB::beginTransaction();
	            
	            $empresa 						= DatosCorporativos::findOrfail($id_empresa);
	            $empresa->str_mision			= $request->get('str_mision');
				$empresa->str_vision			= $request->get('str_vision');
				$empresa->str_principios		= $request->get('str_principios');
				$empresa->str_estrategias		= $request->get('str_estrategias');
				$empresa->str_politica			= $request->get('str_politica');
				$empresa->str_Objetivos			= $request->get('str_Objetivos');
	            $empresa->update();

	           DB::commit();
	           alert()->success('Se ha Actualizado correctamente.', 'Actualizado!')->persistent('Cerrar');
	           return Redirect::to('parm_datos_corportativo')->with('status','Se actualizó correctamente');
	        } catch (Exception $e) {
	            DB::rollback();
	        }
		}
	 }
}