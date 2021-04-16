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


public function edit($id)
{


    $consulta   = Acta::findOrfail($id);



}



public function update(Request $request, $id)
{
    try {
        DB::beginTransaction();

    
            $variable                     = Acta::findOrfail($id);
        
            $variable->acta         = ($request->get('causa_raiz')) ?            $request->get('causa_raiz') : '';	
	

            $variable->terminada  = '0';

            $variable->update(); 
            
            ActaAsistente::where('fk_acta', $id)->delete();

            $asistente     = $request->get('fk_user');
            $cargo     = $request->get('fk_cargor');
            

            for ($i=0; $i <  count($asistente) ; $i++) {

                $tiporequisito = new ActaAsistente();
                $tiporequisito->asistente    =    $asistente[$i];
                $tiporequisito->cargo  =    $cargo[$i];

                $tiporequisito->fk_acta       = $variable->id_acta;
                $tiporequisito->bool_estado    = '1';
                $tiporequisito->save();
            }

            

        DB::commit();
        alert()->success('Se ha Editado correctamente.', 'Editado!')->persistent('Cerrar');
    
    } catch (Exception $e) {
        DB::rollback();
        alert()->error('Se ha Presentador un error.', 'Error!')->persistent('Cerrar');
        
    }
    return Redirect::to('causa_raiz')->with('status','Se actualizó correctamente');
}


public function destroy($id)
{
        try {
        DB::beginTransaction();
        // ActaAsistente::where('fk_acta', $id)->delete();
        // ActaTemas::where('fk_acta', $id)->delete();
        
        $variable 					= Acta::findOrfail($id);

        $mi_imagen = public_path().'/archivos/acta/'.$variable -> archivo;
    
        if (is_file($mi_imagen)) {
            unlink(public_path().'/archivos/acta/'.$variable -> archivo);
        
        }
        $variable -> delete();
        


        DB::commit();
        return Redirect::to('causa_raiz')->with('status','Se eliminó correctamente');
    } catch (Exception $e) {
        DB::rollback();
    }
}

public function destroy_asistente($id,$consulta)
{
        try {
        DB::beginTransaction();
        

        $variable = ActaAsistente::findOrfail($id);
        $variable -> delete();

        DB::commit();
        return Redirect::to('acta/'.$consulta.'/edit')->with('status','Se eliminó correctamente');
    } catch (Exception $e) {
        DB::rollback();
    }
}


}


