<?php

namespace App\Http\Controllers\Planificacion;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
use Redirect;
use Illuminate\Support\Facades\Auth;

class RiesgosOportunoReeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function reeeriesgo($fk_riesgo)
    {
        
        $riesgos      = DB::table('tbl_procesos as p')
                        ->join('tbl_empresa as e','p.fk_empresa','=','e.id_empresa')
                        ->join('tbl_pla_matriz_riesgo as m','m.fk_proceso','=','p.id_proceso')
                        ->join('tbl_pla_riesgo_oportuno as rp','rp.fk_riesgo','=','m.id_riesgo')
                        ->join('tbl_pla_rie_opor_reevaluacion as rpr','rpr.fk_riesgo','=','m.id_riesgo')
                        ->join('users as u','u.id','=','e.fk_usuario')
                        ->where('e.fk_usuario', '=',''.Auth::User()->id.'')
                        ->where('rpr.id_rie_opu_reevaluacion', '=',''.$fk_riesgo.'')
                        ->where('p.bool_estado',  '=','1')
                        ->where('rp.bool_estado',  '=','1')
                        ->where('e.bool_estado',  '=','1')
                        ->where('m.bool_estado',  '=','1')
                        ->where('rpr.bool_estado',  '=','1')
                        ->orderby('id_proceso', 'DESC')->get();
                        //dd($riesgos);

        return view('pages.planificacion.reevaluacioRiesgo.index',[
        'riesgos'  => $riesgos,
        'fk_riesgo'  => $fk_riesgo,
        ]);
    }

   
    public function create()
    {
        //
    }

   
    public function store(Request $request)
    {
        //
    }

  

    public function edit($id)
    {
        //
    }

   
    public function update(Request $request, $id)
    {
        //
    }

  
    public function destroy($id)
    {
        //
    }
}
