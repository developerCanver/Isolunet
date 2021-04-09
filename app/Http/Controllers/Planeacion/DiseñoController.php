<?php

namespace App\Http\Controllers\Planeacion;

use App\Http\Controllers\Controller;
use App\Models\Planeacion\Diseño;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
use Redirect;
use Illuminate\Support\Facades\Auth;


class DiseñoController extends Controller
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
                        ->join('tbl_plane_diseño as p','p.fk_empresa','=','e.id_empresa')
                        ->where('e.fk_usuario','=',''.Auth::User()->id.'')
                        ->where('p.bool_estado','=','1')
                        ->where('e.bool_estado','=','1')
                        ->paginate(20);
                    
        return view('pages.planeacion.diseño.index',[
                                'empresa'=>$empresa,
                                'consultas'=>$consultas,
                                    ]);
    	    
    }


    public function store(Request $request)
    {
    try {
                DB::beginTransaction();

                $variable 				  = new Diseño();
  
                $variable->general          = ($request->get('general')) ?           $request->get('general') : '';
                $variable->unitarios        = ($request->get('unitarios')) ?         $request->get('unitarios') : '';
                $variable->cate_aspectos    = ($request->get('cate_aspectos')) ?     $request->get('cate_aspectos') : '';
                $variable->aspectos_ambiental=($request->get('aspectos_ambiental')) ? $request->get('aspectos_ambiental') : '';
                $variable->impacto          = ($request->get('impacto')) ?           $request->get('impacto') : '';
                $variable->responsabilidad  = ($request->get('responsabilidad')) ?   $request->get('responsabilidad') : '';
                $variable->situacion        = ($request->get('situacion')) ?         $request->get('situacion') : '';
                $variable->tipo_impacto     = ($request->get('tipo_impacto')) ?      $request->get('tipo_impacto') : '';
                $variable->legal            = ($request->get('legal')) ?             $request->get('legal') : '';
                $variable->control          = ($request->get('control')) ?           $request->get('control') : '';
                $variable->periodicidad     = ($request->get('periodicidad')) ?      $request->get('periodicidad') : '';
                $variable->intensidad       = ($request->get('intensidad')) ?        $request->get('intensidad') : '';
                $variable->permanencia      = ($request->get('permanencia')) ?       $request->get('permanencia') : '';
                $variable->afectacion       = ($request->get('afectacion')) ?        $request->get('afectacion') : '';
                $variable->num_sinificancia = ($request->get('num_sinificancia')) ?  $request->get('num_sinificancia') : '';
                $variable->sinificancia     = ($request->get('sinificancia')) ?      $request->get('sinificancia') : '';
                $variable->programa         = ($request->get('programa')) ?          $request->get('programa') : '';
                $variable->fk_empresa       =  $request->get('fk_empresa');
               
                $variable->bool_estado        = '1';
                $variable->save();    

                DB::commit();
                return Redirect::to('diseno_desarrollo')->with('status','Se guardó correctamente');
            } catch (Exception $e) {
                DB::rollback();
        }

    }


    public function edit($id)
    {

        $consulta   = Diseño::findOrfail($id);

        $empresa = DB::table('tbl_empresa as e')
        ->where('e.fk_usuario','=',''.Auth::User()->id.'')
        ->where('e.bool_estado','=','1')
        ->first();
                    //dd($cheSisGestiones);
        return view('pages.planeacion.diseño.edit',[
            'empresa'=>$empresa,
            'consulta'=>$consulta,
            ]);
    }



    public function update(Request $request, $id)
    {
        try {
            DB::beginTransaction();

     
                $variable                     = Diseño::findOrfail($id);
                $variable->general          = ($request->get('general')) ?           $request->get('general') : '';
                $variable->unitarios        = ($request->get('unitarios')) ?         $request->get('unitarios') : '';
                $variable->cate_aspectos    = ($request->get('cate_aspectos')) ?     $request->get('cate_aspectos') : '';
                $variable->aspectos_ambiental=($request->get('aspectos_ambiental')) ? $request->get('aspectos_ambiental') : '';
                $variable->impacto          = ($request->get('impacto')) ?           $request->get('impacto') : '';
                $variable->responsabilidad  = ($request->get('responsabilidad')) ?   $request->get('responsabilidad') : '';
                $variable->situacion        = ($request->get('situacion')) ?         $request->get('situacion') : '';
                $variable->tipo_impacto     = ($request->get('tipo_impacto')) ?      $request->get('tipo_impacto') : '';
                $variable->legal            = ($request->get('legal')) ?             $request->get('legal') : '';
                $variable->control          = ($request->get('control')) ?           $request->get('control') : '';
                $variable->periodicidad     = ($request->get('periodicidad')) ?      $request->get('periodicidad') : '';
                $variable->intensidad       = ($request->get('intensidad')) ?        $request->get('intensidad') : '';
                $variable->permanencia      = ($request->get('permanencia')) ?       $request->get('permanencia') : '';
                $variable->afectacion       = ($request->get('afectacion')) ?        $request->get('afectacion') : '';
                $variable->num_sinificancia = ($request->get('num_sinificancia')) ?  $request->get('num_sinificancia') : '';
                $variable->sinificancia     = ($request->get('sinificancia')) ?      $request->get('sinificancia') : '';
                $variable->programa         = ($request->get('programa')) ?          $request->get('programa') : '';
               
                 $variable->update();



            DB::commit();
            alert()->success('Se ha Editado correctamente.', 'Editado!')->persistent('Cerrar');
        
        } catch (Exception $e) {
            DB::rollback();
            alert()->error('Se ha Presentador un error.', 'Error!')->persistent('Cerrar');
            
        }
        return Redirect::to('diseno_desarrollo')->with('status','Se actualizó correctamente');
    }


    public function destroy($id)
    {
            try {
            DB::beginTransaction();
          
            $ocultar 					= Diseño::findOrfail($id);
            $ocultar->bool_estado		= 0;
            $ocultar->update();


           DB::commit();
           return Redirect::to('diseno_desarrollo')->with('status','Se eliminó correctamente');
        } catch (Exception $e) {
            DB::rollback();
        }
    }
}
