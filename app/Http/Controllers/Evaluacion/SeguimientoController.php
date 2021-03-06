<?php

namespace App\Http\Controllers\Evaluacion;

use App\Http\Controllers\Controller;
use App\Models\Evaluacion\Seguimiento;
use App\Models\User;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
use Redirect;
use Illuminate\Support\Facades\Auth;

 


class SeguimientoController extends Controller
{
 
    public function __construct()
    {
        $this->middleware('auth');
    }

public function index(Request $request)
{
    $usuario = User::findOrfail(Auth::User()->id);
        $id_empresa=$usuario->fk_empresa;
    

        $empresa = DB::table('users as u')
                    ->join('tbl_empresa as e','e.id_empresa','=','u.fk_empresa')
                    ->where('u.id','=',Auth::User()->id)
                    ->where('e.bool_estado','=','1')
                    ->first();
    

    $procesos = DB::table('tbl_empresa as e')
                    ->join('tbl_procesos as p','p.fk_empresa','=','e.id_empresa')
                    ->where('e.id_empresa',  $id_empresa)
                    ->where('e.bool_estado','=','1')
                    ->where('p.bool_estado','=','1')
                    ->get();

    $consultas = DB::table('tbl_eva_seguimiento as s')
                    ->join('tbl_empresa as e','e.id_empresa','=','s.fk_empresa')
                    ->where('e.id_empresa',  $id_empresa)
                    ->where('e.bool_estado','=','1')
                    ->paginate(20);
    
    return view('pages.evaluacion.seguimiento.index',[
                            'empresa'=>$empresa,
                            'procesos'=>$procesos,
                            'consultas'=>$consultas,                                            
                                ]);
        
}


public function store(Request $request)
{
try {
            DB::beginTransaction();

            $variable 				  = new Seguimiento();
            $variable->proceso        = $request->get('proceso'); 	
            $variable->medir          = $request->get('medir'); 	
            $variable->fuente         = $request->get('fuente'); 	
            $variable->metodo         = $request->get('metodo'); 	
            $variable->medicion       = $request->get('medicion'); 	
            $variable->evaluacion     = $request->get('evaluacion'); 	
            $variable->fk_empresa       =  $request->get('fk_empresa');
            
            $variable->bool_estado        = '1';
            $variable->save();    

            DB::commit();
            return Redirect::to('seguimiento_medicion')->with('status','Se guard?? correctamente');
        } catch (Exception $e) {
            DB::rollback();
    }

}



public function update(Request $request, $id)
{
    try {
        DB::beginTransaction();

    
            $variable                 = Seguimiento::findOrfail($id);
            $variable->proceso        = $request->get('proceso'); 	
            $variable->medir          = $request->get('medir'); 	
            $variable->fuente         = $request->get('fuente'); 	
            $variable->metodo         = $request->get('metodo'); 	
            $variable->medicion       = $request->get('medicion'); 	
            $variable->evaluacion     = $request->get('evaluacion');
            
                $variable->update();


        DB::commit();
        alert()->success('Se ha Editado correctamente.', 'Editado!')->persistent('Cerrar');
    
    } catch (Exception $e) {
        DB::rollback();
        alert()->error('Se ha Presentador un error.', 'Error!')->persistent('Cerrar');
        
    }
    return Redirect::to('seguimiento_medicion')->with('status','Se actualiz?? correctamente');
}


public function destroy($id)
{
        try {
        DB::beginTransaction();
        
        $ocultar 					= Seguimiento::findOrfail($id);
    
        $ocultar->delete();

        DB::commit();
        return Redirect::to('seguimiento_medicion')->with('status','Se elimin?? correctamente');
    } catch (Exception $e) {
        DB::rollback();
    }
}
}