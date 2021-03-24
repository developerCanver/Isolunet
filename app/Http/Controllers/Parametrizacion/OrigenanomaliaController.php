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

use App\Models\Anomalia_Origen\OrigenAnomalias;

class OrigenanomaliaController extends Controller
{
    // Validacion de logueo
 	public function __construct()
    {
        $this->middleware('auth');
    }

    public function origen_anomalia(Request $request)
    {
    	if($request){

            $anomalias = DB::table('tbl_origen_anomalia')
                    ->where('bool_estado','=','1')
                    ->get();
    	
    		return view('pages.parametrizacion.origen_anomalia',[

                'anomalias' => $anomalias
            ]);
    	}
    }


    public function store(Request $request)
    {
         try {
            DB::beginTransaction();

            $origen_anomalia                    = new OrigenAnomalias();
            $origen_anomalia->nombre            = $request->get('origen_anomalia');
            $origen_anomalia->bool_estado       = 1;
            $origen_anomalia->save();

            DB::commit();
            alert()->success('Se ha creado correctamente.', 'Creado!')->persistent('Cerrar');

        } catch (Exception $e) {
            DB::rollback();
            alert()->error('Se ha Presentador un error.', 'Error!')->persistent('Cerrar');

        }

        return Redirect::to('parm_origen_anomalia')->with('status','Se guardó correctamente');
    }

    public function edit_origen_anomalia(Request $request, $id)
    {
        if($request){

            $anomalia = OrigenAnomalias::where('id_origen_anomalia','=',$id)->firstOrfail();
            $anomalias = DB::table('tbl_origen_anomalia')
                    ->where('bool_estado','=','1')
                    ->get();


            return view('pages.parametrizacion.origen_anomalia_edit',[
                'anomalias' => $anomalias,
                'anomalia' => $anomalia
            ]);
        }
    }

    public function edit(Request $request,$id)
    {
         try {
            DB::beginTransaction();

            $origen_anomalia                    = OrigenAnomalias::findOrfail($id);
            $origen_anomalia->nombre            = $request->get('origen_anomalia');
            $origen_anomalia->bool_estado       = 1;
            $origen_anomalia->update();

            DB::commit();
            alert()->success('Se ha editado correctamente.', 'Editado!')->persistent('Cerrar');

        } catch (Exception $e) {
            DB::rollback();
            alert()->error('Se ha Presentador un error.', 'Error!')->persistent('Cerrar');

        }

        return Redirect::to('parm_origen_anomalia')->with('status','Se actualizó correctamente');
    }

    public function delete(Request $request,$id)
    {
         try {
            DB::beginTransaction();

            $origen_anomalia                    = OrigenAnomalias::findOrfail($id);
            $origen_anomalia->bool_estado       = 0;
            $origen_anomalia->update();

            DB::commit();
            alert()->success('Se ha Elminado correctamente.', 'Eliminado!')->persistent('Cerrar');

        } catch (Exception $e) {
            DB::rollback();
            alert()->error('Se ha Presentador un error.', 'Error!')->persistent('Cerrar');

        }

        return Redirect::to('parm_origen_anomalia')->with('status','Se eliminó correctamente');
    }



    // proceso de ajax sistema de gestion 
    
    public function myform()
    {
        $states = DB::table("tbl_sistemas_gestion")->lists("name","id");
        return view('myform',compact('states'));
    }


    /**
     * Get Ajax Request and restun Data
     *
     * @return \Illuminate\Http\Response
     */
    public function myformAjax($id)
    {
        $procesos = DB::table("tbl_sistemas_gestion_procesos as sp")
                    ->join('tbl_procesos as p','sp.proceso_id','=','p.id_proceso')
                    ->where("sp.sisgestionr_id","=",$id)
                   ->pluck("p.nom_proceso","p.id_proceso");
        return response()->json($procesos); 
    }
    
}
