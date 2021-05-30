<?php

namespace App\Http\Controllers\Planeacion;

use App\Http\Controllers\Controller;
use App\Models\Planeacion\PlaneacionControl;
use App\Models\User;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
use Redirect;
use Illuminate\Support\Facades\Auth;


class PlaneacioControlController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {

        $usuario = User::findOrfail(Auth::User()->id);
        $rolUsuario=$usuario->fk_rol;
        $id_empresa=$usuario->fk_empresa;

        $empresa = DB::table('users as u')
                    ->join('tbl_empresa as e','e.id_empresa','=','u.fk_empresa')
                    ->where('u.id','=',Auth::User()->id)
                    ->where('e.bool_estado','=','1')
                    ->first();

                        
        $procesos      = DB::table('tbl_procesos as p')
                    ->join('tbl_empresa as e','p.fk_empresa','=','e.id_empresa')
                    ->where('e.id_empresa',  $id_empresa)
                    ->where('p.bool_estado',  '=','1')
                    ->where('e.bool_estado',  '=','1')
                    ->orderby('id_proceso', 'DESC')->get();

                $planeaciones =  DB::table('tbl_empresa as e')
                        ->join('tbl_plane_planificacion as i','i.fk_empresa','=','e.id_empresa')
                        ->where('e.id_empresa',  $id_empresa)
                        ->where('e.bool_estado','=','1')
                        ->where('i.bool_estado','=','1')
                        ->paginate(20);
                        //dd($planeaciones);

        return view('pages.planeacion.planeacio_control.index',[
            'empresa'=>$empresa,
            'procesos'=>$procesos,
            'planeaciones'=>$planeaciones,
            ]);
    }

    public function store(Request $request)
    {
        try {
            //dd($request);
            DB::beginTransaction();

            $variable                    = new PlaneacionControl();
          
            $variable->proceso      =$request->get('proceso');
            $variable->variable     =$request->get('variable');
            $variable->unidad       =$request->get('unidad');
            $variable->control      =$request->get('control');
            $variable->operacion    =$request->get('operacion');
            $variable->frecuencia   =$request->get('frecuencia');
            $variable->seguimiento  =$request->get('seguimiento');
            $variable->fk_empresa   =$request->get('fk_empresa');
          


            $variable->material  = ($request->get('material')) ?  $request->get('material') : '';
            $variable->li  = ($request->get('li')) ?  $request->get('li') : '';
            $variable->lc  = ($request->get('lc')) ?  $request->get('lc') : '';
            $variable->ls  = ($request->get('ls')) ?  $request->get('ls') : '';
            $variable->metodo    = ($request->get('metodo')) ?  $request->get('metodo') : '';
            $variable->registro  = ($request->get('registro')) ?  $request->get('registro') : '';
            $variable->instrumento  = ($request->get('instrumento')) ?  $request->get('instrumento') : '';
           
          
            $variable->bool_estado           = '1';
            $variable->save();


            DB::commit();
            alert()->success('Se ha creado correctamente.', 'Creado!')->persistent('Cerrar');
        
        } catch (Exception $e) {
            DB::rollback();
            alert()->error('Se ha Presentador un error.', 'Error!')->persistent('Cerrar');
            
        }

        return Redirect::to('planeacio_control/')->with('status','Se guardó correctamente');
    }

 
   
    public function edit($id)
    {
        $usuario 					= User::findOrfail(Auth::User()->id);
                    $rolUsuario=$usuario->fk_rol;
                    $id_empresa=$usuario->fk_empresa;
                    
        $planeacion = PlaneacionControl::findOrfail($id);
   

        $empresa = DB::table('users as u')
                        ->join('tbl_empresa as e','e.id_empresa','=','u.fk_empresa')
                        ->where('u.id','=',Auth::User()->id)
                        ->where('e.bool_estado','=','1')
                        ->first();
        
        $procesos      = DB::table('tbl_procesos as p')
                        ->join('tbl_empresa as e','p.fk_empresa','=','e.id_empresa')
                        ->where('e.id_empresa',  $id_empresa)
                        ->where('p.bool_estado',  '=','1')
                        ->where('e.bool_estado',  '=','1')
                        ->orderby('id_proceso', 'DESC')->get();
        
        return view('pages.planeacion.planeacio_control.edit',[
            'planeacion'=>$planeacion,
            'empresa'=>$empresa,
            'procesos'=>$procesos,
            ]);
    }

  
    public function update(Request $request, $id)
    {
        try {
            DB::beginTransaction();

                $variable               = PlaneacionControl::findOrfail($id);
                $variable->proceso      =$request->get('proceso');
                $variable->variable     =$request->get('variable');
                $variable->unidad       =$request->get('unidad');
                $variable->control      =$request->get('control');
                $variable->operacion    =$request->get('operacion');
                $variable->frecuencia   =$request->get('frecuencia');
                $variable->seguimiento  =$request->get('seguimiento');
                $variable->fk_empresa   =$request->get('fk_empresa');
              
    
    
                $variable->material  = ($request->get('material')) ?  $request->get('material') : '';
                $variable->li  = ($request->get('li')) ?  $request->get('li') : '';
                $variable->lc  = ($request->get('lc')) ?  $request->get('lc') : '';
                $variable->ls  = ($request->get('ls')) ?  $request->get('ls') : '';
                $variable->metodo    = ($request->get('metodo')) ?  $request->get('metodo') : '';
                $variable->registro  = ($request->get('registro')) ?  $request->get('registro') : '';
                $variable->instrumento  = ($request->get('instrumento')) ?  $request->get('instrumento') : '';


            $variable->update();

            DB::commit();
            alert()->success('Se ha Editado correctamente.', 'Editado!')->persistent('Cerrar');
        
        } catch (Exception $e) {
            DB::rollback();
            alert()->error('Se ha Presentador un error.', 'Error!')->persistent('Cerrar');
            
        }

        return Redirect::to('planeacio_control/')->with('status','Se actualizó correctamente');
    }


    public function destroy($id)
    {
        try {
            DB::beginTransaction();

            $variable                   = PlaneacionControl::findOrfail($id);
            $variable->bool_estado      = '0';
            $variable->update();
          


            DB::commit();
            alert()->success('Se ha eliminado correctamente.', 'Eliminado!')->persistent('Cerrar');
        
        } catch (Exception $e) {
            DB::rollback();
            alert()->error('Se ha Presentador un error.', 'Error!')->persistent('Cerrar');
            
        }
        return Redirect::to('planeacio_control/')->with('status','Se elimiinó correctamente');
     
    
    }
}
