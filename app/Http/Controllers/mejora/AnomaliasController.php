<?php

namespace App\Http\Controllers\mejora;

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

use App\Models\Mejora\AccionesCorrectiva;
use App\Models\Mejora\Anomalias;
use App\Models\Mejora\CausaRaiz;
use App\Models\Mejora\Correcciones;


class AnomaliasController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
    	if ($request) {
    		return view('pages.mejora.anomalia.panel');
    	}
    }

     public function anomalia(Request $request)
    {
    	if ($request) {

            $sistema_gestion = DB::table('tbl_sistemas_gestion')
                            ->where('fk_empresa','=',''.Auth::User()->fk_empresa.'')
                            ->get();

            $usuarios   = DB::table('users')
                        ->where('fk_empresa','=',''.Auth::User()->fk_empresa.'')
                        ->get();


            $origen_anomalias   = DB::table('tbl_origen_anomalia')
                        ->where('bool_estado','=','1')
                        ->get();


    		return view('pages.mejora.anomalia.anomalia_index',[
                'sistema_gestion'   => $sistema_gestion,
                'usuarios'          => $usuarios,
                'origen_anomalias'  => $origen_anomalias
            ]);
    	}
    }

    public function causa_raiz(Request $request)
    {
        if ($request) {

            $anomalias = DB::Table('tbl_mejora_anomalia')
                        ->where('bool_estado_anomalia','=','1')
                        ->get();

            $causa = new CausaRaiz();

            return view('pages.mejora.anomalia.causa_raiz',[
                'anomalias' => $anomalias,
                'causa'     => $causa,
            ]);
        }
    }

     public function acciones_correctivas(Request $request)
    {
        if ($request) {
            return view('pages.mejora.anomalia.acciones_correctivas');
        }
    }


    public function store_anomalia(Request $request)
    {
         try {
            DB::beginTransaction();

            $anomalia                           = new Anomalias();
            $anomalia->fk_empresa               = Auth::User()->fk_empresa;
            $anomalia->str_sistema_de_gestion   = $request->get('sistema_gestion');
            $anomalia->str_proceso              = $request->get('procesos');
            $anomalia->str_origen_anomalia      = $request->get('origen_anomalia');
            $anomalia->str_reportado_por        = $request->get('reportado_por');
            $anomalia->fecha                    = $request->get('fecha');
            $anomalia->str_anomalia             = $request->get('anomalia');
            $anomalia->file_archivo             = $request->get('documento_anomalia');
            $anomalia->file_archivo_correcciones= $request->get('documento_correcciones');
            $anomalia->bool_estado_anomalia     = 1;
            $anomalia->save();


            $cont                               = $request->get('cont');
            $str_correccion                     = $request->get('str_correccion');
            $str_quien                          = $request->get('str_quien');
            $date_fecha                         = $request->get('date_fecha');
            $acumulador                         = 0;

             while($acumulador < count ($cont)){
                    
                $detalle                            = new Correcciones();
                $detalle->fk_anomalia               = $anomalia->id_anomalia;
                $detalle->str_correccion_anomalia   = $str_correccion[$acumulador];
                $detalle->str_quien                 = $str_quien[$acumulador];
                $detalle->fecha                     = $date_fecha[$acumulador];
                $detalle->bool_estado_correcion     = "1";
                $detalle->save(); 
             
                $acumulador = $acumulador+1;
            }


            DB::commit();
            alert()->success('Se ha creado correctamente.', 'Creado!')->persistent('Cerrar');
        
        } catch (Exception $e) {
            DB::rollback();
            alert()->error('Se ha Presentador un error.', 'Error!')->persistent('Cerrar');
            
        }

        return Redirect::to('parm_areas');
    }

}
