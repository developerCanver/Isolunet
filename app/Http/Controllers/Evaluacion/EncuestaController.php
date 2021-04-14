<?php

namespace App\Http\Controllers\Evaluacion;

use App\Http\Controllers\Controller;
use App\Models\Evaluacion\Encuesta;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
use Redirect;
use Illuminate\Support\Facades\Auth;

 

class EncuestaController extends Controller
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
    

    $procesos = DB::table('tbl_empresa as e')
                    ->join('tbl_procesos as p','p.fk_empresa','=','e.id_empresa')
                    ->where('e.fk_usuario','=',''.Auth::User()->id.'')
                    ->where('e.bool_estado','=','1')
                    ->where('p.bool_estado','=','1')
                    ->get();

    $consultas = DB::table('tbl_eva_encuesta as ee')
                    ->join('tbl_empresa as e','e.id_empresa','=','ee.fk_empresa')
                    ->where('e.fk_usuario','=',''.Auth::User()->id.'')
                    ->where('e.bool_estado','=','1')
                    ->paginate(20);


                    //dd($consultas);
                    

                
    return view('pages.evaluacion.encuesta.index',[
                            'empresa'=>$empresa,
                            'procesos'=>$procesos,
                            'consultas'=>$consultas,                                            
                                ]);
        
}


public function store(Request $request)
{
try {
            DB::beginTransaction();

            $variable 				  = new Encuesta();
      	
            $variable->cliente     = $request->get('cliente');
            $variable->quien     = $request->get('quien');
            $variable->cargo     = $request->get('cargo');
            $variable->calidad     = $request->get('calidad');
            $variable->nivel     = $request->get('nivel');
            $variable->tiempo     = $request->get('tiempo');
            $variable->plazos     = $request->get('plazos');
            $variable->atencion     = $request->get('atencion');
            $variable->inconvenientes     = $request->get('inconvenientes');
            $variable->propuesta     = $request->get('propuesta');
            $variable->fk_empresa       =  $request->get('fk_empresa');
            
            $variable->bool_estado        = '1';
            $variable->save();    

            DB::commit();
            return Redirect::to('encuesta_satisfaccion')->with('status','Se guardó correctamente');
        } catch (Exception $e) {
            DB::rollback();
    }

}



public function update(Request $request, $id)
{
    try {
        DB::beginTransaction();

    
            $variable                 = Encuesta::findOrfail($id);
            $variable->cliente     = $request->get('cliente');
            $variable->quien     = $request->get('quien');
            $variable->cargo     = $request->get('cargo');
            $variable->calidad     = $request->get('calidad');
            $variable->nivel     = $request->get('nivel');
            $variable->tiempo     = $request->get('tiempo');
            $variable->plazos     = $request->get('plazos');
            $variable->atencion     = $request->get('atencion');
            $variable->inconvenientes     = $request->get('inconvenientes');
            $variable->propuesta     = $request->get('propuesta');
            
                $variable->update();



        DB::commit();
        alert()->success('Se ha Editado correctamente.', 'Editado!')->persistent('Cerrar');
    
    } catch (Exception $e) {
        DB::rollback();
        alert()->error('Se ha Presentador un error.', 'Error!')->persistent('Cerrar');
        
    }
    return Redirect::to('encuesta_satisfaccion')->with('status','Se actualizó correctamente');
}


public function destroy($id)
{
        try {
        DB::beginTransaction();
        
        $ocultar 					= Encuesta::findOrfail($id);
    
        $ocultar->delete();

        DB::commit();
        return Redirect::to('encuesta_satisfaccion')->with('status','Se eliminó correctamente');
    } catch (Exception $e) {
        DB::rollback();
    }
}
}