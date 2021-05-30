<?php

namespace App\Http\Controllers\mejora;

use App\Http\Controllers\Controller;
use App\Models\Mejora\Correcciones;
use App\Models\Mejora\Correlativa;
use App\Models\User;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
use Redirect;
use Illuminate\Support\Facades\Auth;

class CorrelativasController extends Controller
{
     
public function __construct()
{
    $this->middleware('auth');
}

public function index(Request $request)
{
    $usuario = User::findOrfail(Auth::User()->id);
    $id_empresa=$usuario->fk_empresa;


    $empresa = DB::table('tbl_empresa as e')
                    ->where('e.id_empresa',  $id_empresa)
                    ->where('e.bool_estado','=','1')
                    ->first();

    $usuarios = DB::table('users as u')
                ->join('tbl_empresa as e','u.fk_empresa','=','e.id_empresa')
                ->where('e.id_empresa',  $id_empresa)
                ->where('e.bool_estado','=','1')
                ->where('fk_rol',3)
                ->get();

    $consultas =  DB::table('tbl_mejora_anomalia as a')
                     ->join('tbl_empresa as e','e.id_empresa','=','a.fk_empresa')
                    ->join('tbl_mejo_causas as c','c.fk_anomalia','=','a.id_anomalia')
                    ->join('tbl_mejo_correlativas as co','co.fk_causa','=','c.id_causas')
                    ->where('e.id_empresa',  $id_empresa)
                    ->orderByDesc('id_anomalia')
                    ->paginate(20);

                
    return view('pages.mejora.anomalia.acciones_correctivas',[
        'usuarios' => $usuarios,
        'empresa' => $empresa,
        'consultas' => $consultas,
      
    ]);
        
}

public function store(Request $request)
{
try {
            DB::beginTransaction();

            $variable 				  = new Correlativa();
        
            $variable->que        = ($request->get('que')) ?            $request->get('que') : '';	
            $variable->quien      = ($request->get('quien')) ?          $request->get('quien') : '';	
            $variable->fecha_cer  = ($request->get('fecha_cer')) ?      $request->get('fecha_cer') : '';
            
            $variable->compromiso_co  =  '';
            $variable->fecha_ini_co   = '2021-01-01';
            $variable->fecha_fin_co   = '2021-01-01';
            $variable->observaciones_co  ='';
            $variable->accion_co  ='';

            
            $variable->fk_causa   =  $request->get('fk_causa');	

            if ($request->file('archivo')) {
                $file =$request->file('archivo');
                $name = time().$file->getClientOriginalName();
                $file->move(public_path().'/archivos/acta/', $name);
            } else {
                $name='';
                
            }
            $variable->archivo =  $name;
            $variable->save();   

            DB::commit();
            return Redirect::to('acciones_correctivas')->with('status','Se guardó correctamente');
        } catch (Exception $e) {
            DB::rollback();
    }

}

public function update(Request $request, $id)
{
    try {
        DB::beginTransaction();
    
            $variable                     = Correlativa::findOrfail($id);
        
            $variable->que        = ($request->get('que')) ?            $request->get('que') : '';	
            $variable->quien      = ($request->get('quien')) ?          $request->get('quien') : '';	
            $variable->fecha_cer  = ($request->get('fecha_cer')) ?      $request->get('fecha_cer') : '';

            $variable->compromiso_co  = ($request->get('compromiso_co')) ?     $request->get('compromiso_co') : '';	 
            $variable->accion_co      = ($request->get('accion_co')) ?         $request->get('accion_co') : '';	 
            $variable->fecha_ini_co   = ($request->get('fecha_ini_co')) ?      $request->get('fecha_ini_co') : '2021-01-01';	 
            $variable->fecha_fin_co   = ($request->get('fecha_fin_co')) ?         $request->get('fecha_fin_co') : '2021-01-01';	 
            $variable->observaciones_co  = ($request->get('observaciones_co')) ?  $request->get('observaciones_co') : '';
            

            if ($request->file('archivo')) {
                $archivo=$request->get('archivo_anterior');
                //nombre para eliinar el anterior archivo
            
                    $mi_archivo= public_path().'/archivos/acta/'.$archivo;
        
                    if (is_file($mi_archivo)) {
                        //consulto si esta ena carpeta y borro
                        unlink(public_path().'/archivos/acta/'.$archivo);
                    }
                

                $file =$request->file('archivo');
                $name = time().$file->getClientOriginalName();
                $file->move(public_path().'/archivos/acta/', $name);
                $variable->archivo =  $name;
            
            }

            $variable->update(); 

        DB::commit();
        alert()->success('Se ha Editado correctamente.', 'Editado!')->persistent('Cerrar');
    
    } catch (Exception $e) {
        DB::rollback();
        alert()->error('Se ha Presentador un error.', 'Error!')->persistent('Cerrar');
        
    }
    return Redirect::to('acciones_correctivas')->with('status','Se actualizó correctamente');
}

public function destroy($id)
{
        try {
        DB::beginTransaction();
        // ActaAsistente::where('fk_acta', $id)->delete();
        // ActaTemas::where('fk_acta', $id)->delete();
        
        $variable 					= Correlativa::findOrfail($id);

        $mi_imagen = public_path().'/archivos/acta/'.$variable -> archivo;
    
        if (is_file($mi_imagen)) {
            unlink(public_path().'/archivos/acta/'.$variable -> archivo);
        
        }
        $variable -> delete();
        


        DB::commit();
        return Redirect::to('acciones_correctivas')->with('status','Se eliminó correctamente');
    } catch (Exception $e) {
        DB::rollback();
    }
}



}
