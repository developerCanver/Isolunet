<?php

namespace App\Http\Controllers\mejora;

use App\Http\Controllers\Controller;
use App\Models\Mejora\Causa;
use Illuminate\Http\Request;


use Illuminate\Support\Facades\DB;
use Redirect;
use Illuminate\Support\Facades\Auth;

class CausaController extends Controller
{


public function __construct()
{
    $this->middleware('auth');
}

public function index(Request $request)
{


    $anomalias =  DB::table('tbl_empresa as e')
                    ->join('tbl_mejora_anomalia as a','a.fk_empresa','=','e.id_empresa')
                    ->where('e.fk_usuario','=',''.Auth::User()->id.'')
                    ->get();
   
            return view('pages.mejora.anomalia.causa_raiz',[
            'anomalias' => $anomalias,
            ]);

        
}


public function store(Request $request)
{
try {
            DB::beginTransaction();


            $causa     = $request->get('causa');
            //dd($causa);
            $fk_anomalia     = $request->get('fk_anomalia');
      	

            for ($i=0; $i <  count($causa) ; $i++) {

                $tiporequisito = new Causa();
                $tiporequisito->causa    =    $causa[$i];
                $tiporequisito->fk_anomalia  =    $fk_anomalia;

                $tiporequisito->save();
            }

            DB::commit();
            return Redirect::to('causa_raiz')->with('status','Se guardó correctamente');
        } catch (Exception $e) {
            DB::rollback();
    }

}







}


