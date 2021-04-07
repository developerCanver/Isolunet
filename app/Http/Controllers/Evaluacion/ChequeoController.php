<?php

namespace App\Http\Controllers\Evaluacion;

use App\Http\Controllers\Controller;
use App\Models\Evaluacion\Chequeo;
use App\Models\Evaluacion\ChequeoSisGEstion;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
use Redirect;
use Illuminate\Support\Facades\Auth;


class ChequeoController extends Controller
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
     

        $chequeos =  DB::table('tbl_empresa as e')
                        ->join('tbl_procesos as p','p.fk_empresa','=','e.id_empresa')
                        ->join('tbl_plane_auditoria_chequeo as c','c.fk_proceso','=','p.id_proceso')
                        ->where('e.fk_usuario','=',''.Auth::User()->id.'')
                        ->where('p.bool_estado','=','1')
                        ->where('c.bool_estado','=','1')
                        ->paginate(20);
                        //dd($chequeo); 

        $procesos = DB::table('tbl_empresa as e')
                        ->join('tbl_procesos as p','p.fk_empresa','=','e.id_empresa')
                        ->where('e.fk_usuario','=',''.Auth::User()->id.'')
                        ->where('e.bool_estado','=','1')
                        ->where('p.bool_estado','=','1')
                        ->get();
                        
       $gestiones = DB::table('tbl_empresa as e')
                        ->join('tbl_sistemas_gestion as g','g.fk_empresa','=','e.id_empresa')
                        ->where('e.fk_usuario','=',''.Auth::User()->id.'')
                        ->where('e.bool_estado','=','1')
                        ->where('g.bool_estado','=','1')
                        ->orderby('str_nombre')->get();

        $cheSisGestiones =  DB::table('tbl_empresa as e')
                        ->join('tbl_procesos as p','p.fk_empresa','=','e.id_empresa')
                        ->join('tbl_plane_auditoria_chequeo as c','c.fk_proceso','=','p.id_proceso')
                        ->join('tbl_plane_auditoria_che_sis_gestion as ag','ag.fk_audchequeo','=','c.id_chequeo')
                        ->join('tbl_sistemas_gestion as g','g.id_sisgestion','=','ag.fk_sisgestion')
                        ->where('e.fk_usuario','=',''.Auth::User()->id.'')
                        ->where('p.bool_estado','=','1')
                        ->where('c.bool_estado','=','1')
                        ->where('ag.bool_estado','=','1')
                        ->where('g.bool_estado','=','1')
                        ->get();
                        //dd($cheSisGestiones);

        return view('pages.evaluacion.auditoria.chequeo.index',[
                                'empresa'=>$empresa,
                                'procesos'=>$procesos,
                                'chequeos'=>$chequeos,
                                'cheSisGestiones'=>$cheSisGestiones,
                                'gestiones'=>$gestiones,
                                    ]);
    	    
    }


    public function store(Request $request)
    {
    try {
                DB::beginTransaction();

                $variable 				  = new Chequeo();
                $variable->fecha_chequeo      = ($request->get('fecha_chequeo')) ?   $request->get('fecha_chequeo') : '';
                $variable->equi_auditor       = ($request->get('equi_auditor')) ?    $request->get('equi_auditor') : '';
                $variable->aspectos           = ($request->get('aspectos')) ?        $request->get('aspectos') : '';
                $variable->cumple             = ($request->get('cumple')) ?          $request->get('cumple') : '';
                $variable->obervaciones_chequeo   = ($request->get('obervaciones_chequeo')) ?    $request->get('obervaciones_chequeo') : '';

                $variable->bool_estado        = '1';
                $variable->fk_proceso         =    $request->get('fk_proceso') ;
          

                $variable->save();    
                
                $fk_sisgestion  = $request->get('fk_sisgestion');
                $seleccion_chequeo     = $request->get('seleccion_chequeo');
               

                for ($i=0; $i <  count($fk_sisgestion) ; $i++) {

                    $tiporequisito = new ChequeoSisGEstion();
                    $tiporequisito->fk_sisgestion      =    $fk_sisgestion[$i];
                    $tiporequisito->seleccion_chequeo  =    $seleccion_chequeo[$i];

                    $tiporequisito->fk_audchequeo      = $variable->id_chequeo;
                    $variable->bool_estado    = '1';
                    $tiporequisito->save();
                }


                DB::commit();
                return Redirect::to('chequeo_auditoria')->with('status','Se guardó correctamente');
            } catch (Exception $e) {
                DB::rollback();
        }

    }


    public function edit($id)
    {

    
        $chequeo =  DB::table('tbl_empresa as e')
                            ->join('tbl_procesos as p','p.fk_empresa','=','e.id_empresa')
                            ->join('tbl_plane_auditoria_chequeo as c','c.fk_proceso','=','p.id_proceso')
                            ->join('tbl_plane_auditoria_che_sis_gestion as ag','ag.fk_audchequeo','=','c.id_chequeo')
                            ->join('tbl_sistemas_gestion as g','g.id_sisgestion','=','ag.fk_sisgestion')
                            ->where('fk_audchequeo',  $id)
                            ->first();

       $cheSisGestiones =  DB::table('tbl_empresa as e')
                            ->join('tbl_procesos as p','p.fk_empresa','=','e.id_empresa')
                            ->join('tbl_plane_auditoria_chequeo as c','c.fk_proceso','=','p.id_proceso')
                            ->join('tbl_plane_auditoria_che_sis_gestion as ag','ag.fk_audchequeo','=','c.id_chequeo')
                            ->join('tbl_sistemas_gestion as g','g.id_sisgestion','=','ag.fk_sisgestion')
                            ->where('fk_audchequeo',  $id)
                            ->get();

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
                    //dd($cheSisGestiones);
        return view('pages.evaluacion.auditoria.chequeo.edit',[
            'chequeo'=>$chequeo,
            'empresa'=>$empresa,
            'procesos'=>$procesos,
            'cheSisGestiones'=>$cheSisGestiones,
            ]);
    }

    public function update(Request $request, $id)
    {
        try {
            DB::beginTransaction();

     
                $variable                     = Chequeo::findOrfail($id);
                $variable->fecha_chequeo      = ($request->get('fecha_chequeo')) ?   $request->get('fecha_chequeo') : '';
                $variable->equi_auditor       = ($request->get('equi_auditor')) ?    $request->get('equi_auditor') : '';
                $variable->aspectos           = ($request->get('aspectos')) ?        $request->get('aspectos') : '';
                $variable->cumple             = ($request->get('cumple')) ?          $request->get('cumple') : '';
                $variable->obervaciones_chequeo   = ($request->get('obervaciones_chequeo')) ?    $request->get('obervaciones_chequeo') : '';
        
            $variable->update();

            ChequeoSisGEstion::where('fk_audchequeo', $id)->delete();

            $fk_sisgestion  = $request->get('fk_sisgestion');
            $seleccion_chequeo     = $request->get('seleccion_chequeo');
           

            for ($i=0; $i <  count($fk_sisgestion) ; $i++) {

                $tiporequisito = new ChequeoSisGEstion();
                $tiporequisito->fk_sisgestion      =    $fk_sisgestion[$i];
                $tiporequisito->seleccion_chequeo  =    $seleccion_chequeo[$i];

                $tiporequisito->fk_audchequeo      = $variable->id_chequeo;
                $variable->bool_estado    = '1';
                $tiporequisito->save();
            }



            DB::commit();
            alert()->success('Se ha Editado correctamente.', 'Editado!')->persistent('Cerrar');
        
        } catch (Exception $e) {
            DB::rollback();
            alert()->error('Se ha Presentador un error.', 'Error!')->persistent('Cerrar');
            
        }
        return Redirect::to('chequeo_auditoria')->with('status','Se actualizó correctamente');
    }


    public function destroy($id)
    {
            try {
            DB::beginTransaction();
            
            $ocultar 					= Chequeo::findOrfail($id);
            $ocultar->bool_estado		= 0;
            $ocultar->update();


           DB::commit();
           return Redirect::to('chequeo_auditoria')->with('status','Se eliminó correctamente');
        } catch (Exception $e) {
            DB::rollback();
        }
    }

}
