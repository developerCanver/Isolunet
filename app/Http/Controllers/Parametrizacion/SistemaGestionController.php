<?php

namespace App\Http\Controllers\Parametrizacion;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Redirect;
use Alert;
use View;
use Validator;
use DB;

use Carbon\Carbon;
use Response;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

use App\Models\Parametrizacion\DatosCorporativos;
use App\Models\Parametrizacion\Empresa;
use App\Models\Parametrizacion\Areas;
use App\Models\Parametrizacion\Cargos;
use App\Models\Parametrizacion\Sistema_gestion;
use App\Models\Parametrizacion\Sistema_procesos;
use App\Models\User;

class SistemaGestionController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index(Request $request)
    {
        $empresa = DB::table('users as u')
		->join('tbl_empresa as e','e.id_empresa','=','u.fk_empresa')
		->where('u.id','=',Auth::User()->id)
		->where('e.bool_estado','=','1')
		->first();
	if ($empresa==null) {
		Auth::logout();
		return Redirect::to('login')->with('status','El Administrador acaba de cerrar la empresa, para más información comuníquese con el administrador');
	}
    	if ($request) {
            $usuario 					= User::findOrfail(Auth::User()->id);
            $rolUsuario=$usuario->fk_rol;
            $id_empresa=$usuario->fk_empresa;

            $procesos      = DB::table('tbl_procesos as p')
                            ->join('tbl_empresa as e','p.fk_empresa','=','e.id_empresa')
                            ->join('users as u','u.fk_empresa','=','e.id_empresa')
                            ->where('u.id', Auth::User()->id)
                            ->where('p.bool_estado',  '=','1')
                            ->where('e.bool_estado',  '=','1')
                            ->orderby('id_proceso', 'DESC')->get();

    		$tabla_sisgestion           = DB::table('tbl_sistemas_gestion')
                                        ->where('fk_empresa', $id_empresa)
                                        ->where('bool_estado','=','1')
                                        ->orderby('id_sisgestion', 'DESC')->get();

    		$tabla_procesos_sisgestion  = DB::table('tbl_sistemas_gestion_procesos as tsgp')
    							        ->leftjoin('tbl_sistemas_gestion as tsg','tsgp.sisgestionr_id','=','tsg.id_sisgestion')
                                        ->leftjoin('tbl_procesos as tp','tsgp.proceso_id','=','tp.id_proceso')
                                        ->where('tsg.bool_estado','=','1')
    							        ->get();


    		return view('pages.parametrizacion.sistema_gestion',[
                'procesos'=>$procesos,
                'tabla_sisgestion'=>$tabla_sisgestion,
                'tabla_procesos_sisgestion'=>$tabla_procesos_sisgestion
                ]);
    	}
    }

    public function store(Request  $request)
    {
    	
        try {
            DB::beginTransaction();

            $variable                   = new Sistema_gestion();
            $variable->str_nombre       = $request->get('nom_sisgestion');
            $variable->str_sigla      	= $request->get('sigla');
            $variable->str_descripcion  = $request->get('descripcion');
            $variable->fk_empresa       = Auth::User()->fk_empresa;
            $variable->save();

            $cont = 0;
            $procesos_relacionados = $request->get('procesos');            
            for ($i=0; $i <  count($procesos_relacionados) ; $i++) { 
            
               $proceso = new Sistema_procesos();
               $proceso->sisgestionr_id = $variable->id_sisgestion;
               $proceso->proceso_id = $procesos_relacionados[$i];
               $proceso->save();
            }

            DB::commit();
            alert()->success('Se ha creado correctamente.', 'Creado!')->persistent('Cerrar');
        
        } catch (Exception $e) {
            DB::rollback();
            alert()->error('Se ha Presentador un error.', 'Error!')->persistent('Cerrar');            
        }
        return Redirect::to('parm_sistema_gestion')->with('status','Se guardó correctamente');
    }

    public function edit(Request $request, $id)
    {
    	$registro  = Sistema_gestion::findOrFail($id);
   

    	$tabla_procesos_sisgestion = DB::table('tbl_sistemas_gestion_procesos as tsgp')
    							->leftjoin('tbl_sistemas_gestion as tsg','tsgp.sisgestionr_id','=','tsg.id_sisgestion')
    							->leftjoin('tbl_procesos as tp','tsgp.proceso_id','=','tp.id_proceso')
    							->get();

        $procesos      = DB::table('tbl_procesos as p')
                                ->join('tbl_empresa as e','p.fk_empresa','=','e.id_empresa')
                                ->join('users as u','u.fk_empresa','=','e.id_empresa')
                                ->where('u.id', Auth::User()->id)
                                ->where('p.bool_estado',  '=','1')
                                ->where('e.bool_estado',  '=','1')
                                ->orderby('id_proceso', 'DESC')->get();
                                //dd($procesos);

    	$procesoSelect = DB::table('tbl_sistemas_gestion as sg')
    				->join('tbl_sistemas_gestion_procesos as gp','gp.sisgestionr_id','=','sg.id_sisgestion')
    				->join('tbl_procesos as p','p.id_proceso','=','gp.proceso_id')
                    ->where('sisgestionr_id',$id)
    				->get();
                   // dd($procesoSelect);

    

    	return view('pages.parametrizacion.Edit.edit_sistema_gestion',[
                        'registro'=>$registro,
                        'tabla_procesos_sisgestion'=>$tabla_procesos_sisgestion,
                        'procesoSelect'=>$procesoSelect,
                        'procesos'=>$procesos,
            ]);
    }

    public function update(Request $request,$id)
    {
    	 try {
            DB::beginTransaction();

            $variable                   = Sistema_gestion::findOrFail($id);
            $variable->str_nombre       = $request->get('nom_sisgestion');
            $variable->str_sigla      	= $request->get('sigla');
            $variable->str_descripcion  = $request->get('descripcion');
            $variable->fk_empresa       = Auth::User()->fk_empresa;
            $variable->update();

            
            Sistema_procesos::where('sisgestionr_id', $id)->delete();

       
            if ($request->get('procesos')) {              

                $procesos_relacionados = $request->get('procesos');            
                for ($i=0; $i <  count($procesos_relacionados) ; $i++) { 
                
                   $proceso = new Sistema_procesos();
                   $proceso->sisgestionr_id = $variable->id_sisgestion;
                   $proceso->proceso_id = $procesos_relacionados[$i];
                   $proceso->save();
                }
            }


           
            DB::commit();
            alert()->success('Se ha Editado correctamente.', 'Creado!')->persistent('Cerrar');
        
        } catch (Exception $e) {
            DB::rollback();
            alert()->error('Se ha Presentador un error.', 'Error!')->persistent('Cerrar');
            
        }

        return Redirect::to('parm_sistema_gestion')->with('status','Se actualizó correctamente');
    }

    public function destroy(Request $request,$id)
    {
        try {
            DB::beginTransaction();

            $sisgestion = Sistema_gestion::findOrfail($id);
            $sisgestion->bool_estado = '0';
            $sisgestion->update();

            DB::commit();
            alert()->success('Se ha eliminado correctamente.', 'Eliminado!')->persistent('Cerrar');
        
        } catch (Exception $e) {
            DB::rollback();
            alert()->error('Ha ocurrdio un error tratando de eliminar el proceso.', 'Error!')->persistent('Cerrar');            
        }

        return Redirect::to('parm_sistema_gestion')->with('status','Se eliminó correctamente');
    }
}
