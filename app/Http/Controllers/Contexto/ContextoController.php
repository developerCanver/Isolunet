<?php

namespace App\Http\Controllers\Contexto;

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

class ContextoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        
        $datos_empresarial = DB::table('tbl_datos_corporativos')
                            ->where('fk_empresa','=',''.Auth::User()->fk_empresa.'')
                            ->get();

        // definicion de variable para el scroll
         $cont = 0;
         $cont1 = 0;
         $cont3 = 0;
         $cont4 = 0;
         $cont5 = 0;
        
        // condiciones del campo para llenar la barra de completado
        if (count($datos_empresarial) != 0) {

            $datos_empresarial = DB::table('tbl_datos_corporativos')
                            ->where('fk_empresa','=',''.Auth::User()->fk_empresa.'')
                            ->first();
           
            if ($datos_empresarial->str_mision != "") {
                $cont = $cont+15;   
            }

            if ($datos_empresarial->str_vision != "") {
               $cont = $cont+15;   
            }

            if ($datos_empresarial->str_principios != "") {
               $cont =$cont+ 15;   
            }

            if ($datos_empresarial->str_estrategias != "") {
               $cont = $cont+15;   
            }

            if ($datos_empresarial->str_politica != "") {
               $cont =$cont+ 15;   
            }

            if ($datos_empresarial->str_Objetivos != "") {
               $cont =$cont+ 25;   
            }
        }
       

        $tendencia = DB::table('tbl_contexto_tendencias_colombia')
                ->where('fk_empresa','=',''.Auth::User()->fk_empresa.'')
                ->get();

         // condiciones del campo para llenar la barra de completado
        if (count($tendencia) != 0) {

            $tendencia = DB::table('tbl_contexto_tendencias_colombia')
                            ->where('fk_empresa','=',''.Auth::User()->fk_empresa.'')
                            ->first();
           
            if ($tendencia->tendencia_colombia != "") {
                $cont1 = $cont1+100;   
            }
 
        }

        $pestal = DB::table('tbl_contexto_analisis_pestal')
                    ->where('fk_empresa','=',''.Auth::User()->fk_empresa.'')
                    ->get();

         // condiciones del campo para llenar la barra de completado
        if (count($pestal) != 0) {

            $pestal = DB::table('tbl_contexto_analisis_pestal')
                            ->where('fk_empresa','=',''.Auth::User()->fk_empresa.'')
                            ->first();
           
            if ($pestal->politicos != "") {
                $cont3 = $cont3+15;   
            }
            if ($pestal->economicos != "") {
                $cont3 = $cont3+15;   
            }
            if ($pestal->sociales != "") {
                $cont3 = $cont3+15;   
            }
            if ($pestal->tecnologicos != "") {
                $cont3 = $cont3+15;   
            }
            if ($pestal->ambientales != "") {
                $cont3 = $cont3+15;   
            }
            if ($pestal->legales != "") {
                $cont3 = $cont3+25;   
            }
 
 
        }

         $dofa = DB::table('tbl_contexto_dofa')
                    ->where('fk_empresa','=',''.Auth::User()->fk_empresa.'')
                    ->get();

         // condiciones del campo para llenar la barra de completado
        if (count($dofa) != 0) {

            $dofa = DB::table('tbl_contexto_dofa')
                            ->where('fk_empresa','=',''.Auth::User()->fk_empresa.'')
                            ->first();
           
            if ($dofa->debilidades != "") {
                $cont4 = $cont4+25;   
            }
            if ($dofa->fortalezas != "") {
                $cont4 = $cont4+25;   
            }
            if ($dofa->amenazas != "") {
                $cont4 = $cont4+25;   
            }
            if ($dofa->oportunidades != "") {
                $cont4 = $cont4+25;   
            }
         
 
 
        }

        $riesgos = DB::table('tbl_contexto_riesgos_oportunidades')
                    ->where('fk_empresa','=',''.Auth::User()->fk_empresa.'')
                    ->get();

         // condiciones del campo para llenar la barra de completado
        if (count($riesgos) != 0) {

            $riesgos = DB::table('tbl_contexto_riesgos_oportunidades')
                            ->where('fk_empresa','=',''.Auth::User()->fk_empresa.'')
                            ->first();
           
            if ($riesgos->riesgo_oportunidad != "") {
                $cont5 = $cont5+50;   
            }
            if ($riesgos->clasificacion != "") {
                $cont5 = $cont5+50;   
            }
   
            
            // Contador padf    
            
         

 
        }


        return view('pages.contexto.index',['cont'=>$cont,'cont1'=>$cont1,'cont3'=>$cont3,'cont4'=>$cont4,'cont5'=>$cont5]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
