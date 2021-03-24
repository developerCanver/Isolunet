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
use App\Models\Parametrizacion\Areas;
use App\Models\Parametrizacion\Cargos;

class AreasCargoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index_areas(Request $request)
    {
    	if($request){
    		
    		$empresa = DB::table('tbl_empresa as e')
                    ->join('users as u','e.fk_usuario','=','u.id')
                    ->where('u.id','=',''.Auth::User()->id.'')
    				->where('e.bool_estado','=','1')
    				->first();

            $tabla_areas = DB::table('tbl_areas as a')
                        ->join('tbl_empresa as e','a.fk_empresa','=','e.id_empresa')
                        ->where('e.bool_estado','=','1')
                        ->where('a.bool_estado','=','1')
                        ->paginate(10);

    		return view('pages.parametrizacion.areas',['empresa'=>$empresa,'tabla_areas'=>$tabla_areas]);
    	}

    }

    public function store_areas(Request $request)
    {
        try {
            DB::beginTransaction();

            $variable                   = new Areas();
            $variable->nom_area         = $request->get('nom_area');
            $variable->bool_estado      = '1';
            $variable->fk_empresa       = $request->get('empresa');
            $variable->fk_usuario       = 
            $variable->save();


            DB::commit();
        
        } catch (Exception $e) {
            DB::rollback();
            
        }

        return Redirect::to('parm_areas')->with('status','Se guardó correctamente');
    }

    public function edit_areas(Request $request,$id)
    {
        $areas = Areas::findOrfail($id);

        $empresa = DB::table('tbl_empresa as e')
                    ->join('users as u','e.fk_usuario','=','u.id')
                    ->where('u.id','=',''.Auth::User()->id.'')
                    ->where('e.bool_estado','=','1')
                    ->first();
                    
        return view('pages.parametrizacion.Edit.edit_areas',['empresa'=>$empresa,'areas'=>$areas]);
    }

    public function update_areas(Request $request,$id)
    {
       try {
            DB::beginTransaction();

            $variable                   = Areas::findOrfail($id);
            $variable->nom_area         = $request->get('nom_area');
            $variable->bool_estado      = '1';
            $variable->fk_empresa       = $request->get('empresa');
            $variable->update();


            DB::commit();
            alert()->success('Se ha Editado correctamente.', 'Editado!')->persistent('Cerrar');
        
        } catch (Exception $e) {
            DB::rollback();
            alert()->error('Se ha Presentador un error.', 'Error!')->persistent('Cerrar');
            
        }
        return Redirect::to('parm_areas')->with('status','Se actualizó correctamente');
    }

    public function destroy(Request $request,$id)
    {
        try {
            DB::beginTransaction();

            $variable                   = Areas::findOrfail($id);
            $variable->bool_estado      = '0';
            $variable->update();


            DB::commit();
            alert()->success('Se ha Elimino correctamente.', 'Eliminado!')->persistent('Cerrar');
        
        } catch (Exception $e) {
            DB::rollback();
            alert()->error('Se ha Presentador un error.', 'Error!')->persistent('Cerrar');
            
        }

        return Redirect::to('parm_areas')->with('status','Se eliminó correctamente');
    }

// Controlador Cargos
 public function index_cargos(Request $request)
    {
        if($request){
            
            $areas = DB::table('tbl_areas as t')
                    ->join('tbl_empresa as e','t.fk_empresa','=','e.id_empresa')
                    ->where('e.fk_usuario','=',''.Auth::User()->id.'')
                    ->where('t.bool_estado','=','1')                  
                    ->where('e.bool_estado','=','1')                  
                    ->get();

            $tabla_cargos = DB::table('tbl_areas as a')
                        ->join('tbl_empresa as em','a.fk_empresa','=','em.id_empresa')
                        ->join('tbl_cargos as e','a.id_area','=','e.fk_area')
                        ->where('e.bool_estado','=','1')
                        ->where('em.bool_estado','=','1')
                        ->where('a.bool_estado','=','1')
                        ->orderby('em.razon_social','desc')
                        ->paginate(10);

            return view('pages.parametrizacion.cargos',['areas'=>$areas,'tabla_cargos'=>$tabla_cargos]);
        }

    }

     public function store_cargos(Request $request)
    {
        try {
            DB::beginTransaction();

            $variable               = new Cargos();
            $variable->nom_cargo    = $request->get('nom_cargo');
            $variable->bool_estado  = '1';
            $variable->fk_area      = $request->get('area');
            $variable->save();


            DB::commit();
            alert()->success('Se ha creado correctamente.', 'Creado!')->persistent('Cerrar');
        
        } catch (Exception $e) {
            DB::rollback();
            alert()->error('Se ha Presentador un error.', 'Error!')->persistent('Cerrar');
            
        }

        return Redirect::to('parm_cargo')->with('status','Se guardó correctamente');
    }

    public function edit_cargo(Request $request,$id)
    {
        $cargos = Cargos::findOrfail($id);
        
        $areas = DB::table('tbl_areas')
                    ->where('bool_estado','=','1')
                    ->get();

        return view('pages.parametrizacion.Edit.edit_cargos',['areas'=>$areas,'cargos'=>$cargos]);
    }

    public function update_cargos(Request $request,$id)
    {
       try {
            DB::beginTransaction();

            $variable                   = Cargos::findOrfail($id);
            $variable->nom_cargo         = $request->get('nom_cargo');
            $variable->bool_estado      = '1';
            $variable->fk_area       = $request->get('area');
            $variable->update();


            DB::commit();
            alert()->success('Se ha Editado correctamente.', 'Editado!')->persistent('Cerrar');
        
        } catch (Exception $e) {
            DB::rollback();
            alert()->error('Se ha Presentador un error.', 'Error!')->persistent('Cerrar');
            
        }

        return Redirect::to('parm_cargo')->with('status','Se actualizó correctamente');
    }

    public function destroy_cargos(Request $request,$id)
    {
        try {
            DB::beginTransaction();

            $variable                   = Cargos::findOrfail($id);
            $variable->bool_estado      = '0';
            $variable->update();


            DB::commit();
            alert()->success('Se ha eliminado correctamente.', 'Eliminado!')->persistent('Cerrar');
        
        } catch (Exception $e) {
            DB::rollback();
            alert()->error('Se ha Presentador un error.', 'Error!')->persistent('Cerrar');
            
        }

        return Redirect::to('parm_cargo')->with('status','Se elimiinó correctamente');
    }

}
