<?php

namespace App\Http\Controllers\mejora;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
use Redirect;
use Illuminate\Support\Facades\Auth;

class ListaAnomaliaController extends Controller
{

    public function __construct()
     {
         $this->middleware('auth');
     }
 
     public function index(Request $request)
     {
        $empresa = DB::table('tbl_empresa as e')
                    ->where('e.fk_usuario','=',''.Auth::User()->id.'')
                    ->where('e.bool_estado','=','1')
                    ->first();

        $consultas =  DB::table('tbl_empresa as e')
                        ->join('tbl_mejora_anomalia as a','a.fk_empresa','=','e.id_empresa')
                        ->leftJoin('tbl_mejo_causas as c','c.id_causas','=','a.id_anomalia')
                        ->leftJoin('tbl_mejo_correlativas as co','co.fk_causa','=','c.id_causas')
                        ->where('bool_estado_anomalia','=','1')
                        ->where('e.fk_usuario','=',''.Auth::User()->id.'')
                  
                     
                        ->paginate(20);
                        //dd($consultas);

        return view('pages.mejora.anomalia.listaanomalia',[
                     'consultas'=>$consultas,
                     'empresa'=>$empresa,
                ]);

     }
 
  
     
}
