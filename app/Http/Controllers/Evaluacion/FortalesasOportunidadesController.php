<?php

namespace App\Http\Controllers\Evaluacion;

use App\Http\Controllers\Controller;
use App\Models\Evaluacion\FortalesasOportunidades;
use App\Models\Evaluacion\FortalesasOportunidadesGestion;
use Illuminate\Http\Request;


use Illuminate\Support\Facades\DB;
use Redirect;
use Illuminate\Support\Facades\Auth;


class FortalesasOportunidadesController extends Controller
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
                        ->join('tbl_plane_auditoria_foropur as c','c.fk_proceso','=','p.id_proceso')
                        ->join('users as u','u.id','=','c.fk_usuario')
                        ->where('e.fk_usuario','=',''.Auth::User()->id.'')
                        ->where('p.bool_estado','=','1')
                        ->where('c.bool_estado','=','1')
                        ->paginate(20);
                        //dd($chequeos); 

        $procesos = DB::table('tbl_empresa as e')
                        ->join('tbl_procesos as p','p.fk_empresa','=','e.id_empresa')
                        ->where('e.fk_usuario','=',''.Auth::User()->id.'')
                        ->where('e.bool_estado','=','1')
                        ->where('p.bool_estado','=','1')
                        ->get();

        $usuarios = DB::table('users as u')
                        ->join('tbl_empresa as e','u.fk_empresa','=','e.id_empresa')
                        ->where('e.id_empresa','=',''.Auth::User()->fk_empresa.'')
                        ->where('e.bool_estado','=','1')
                        ->get();
                        
       $gestiones = DB::table('tbl_empresa as e')
                        ->join('tbl_sistemas_gestion as g','g.fk_empresa','=','e.id_empresa')
                        ->where('e.fk_usuario','=',''.Auth::User()->id.'')
                        ->where('e.bool_estado','=','1')
                        ->where('g.bool_estado','=','1')
                        ->orderby('str_nombre')->get();

     
                        
                       //dd($chequeos);

        return view('pages.evaluacion.auditoria.for_opu.index',[
                                'empresa'=>$empresa,
                                'procesos'=>$procesos,
                                'chequeos'=>$chequeos,
                                'gestiones'=>$gestiones,
                                'usuarios'=>$usuarios,
                                    ]);
    	    
    }


    public function store(Request $request)
    {
    try {
                DB::beginTransaction();

                $variable 				  = new FortalesasOportunidades();
               
               	
               	
                $variable->fecha_foropur      =  $request->get('fecha_foropur');
                $variable->lider              = ($request->get('lider')) ?         $request->get('lider') : '';
                $variable->equipo             = ($request->get('equipo')) ?        $request->get('equipo') : '';
                $variable->tipo_informe       =  $request->get('tipo_informe');
                $variable->descripcion_foropur = ($request->get('descripcion_foropur')) ? $request->get('descripcion_foropur') : '';
                $variable->fk_usuario          = $request->get('fk_usuario');
                $variable->fk_proceso         =    $request->get('fk_proceso') ;

                $variable->bool_estado        = '1';
               
          

                $variable->save();    
                
                $fk_sisgestion  = $request->get('fk_sisgestion');
                $seleccion_foropur     = $request->get('seleccion_foropur');
               

                for ($i=0; $i <  count($fk_sisgestion) ; $i++) {

                    $tiporequisito = new FortalesasOportunidadesGestion();
                    $tiporequisito->fk_sisgestion      =    $fk_sisgestion[$i];
                    $tiporequisito->seleccion_foropur  =    $seleccion_foropur[$i];

                    $tiporequisito->fk_foropur      = $variable->id_foropur;
                    $tiporequisito->bool_estado    = '1';
                    $tiporequisito->save();
                }


                DB::commit();
                return Redirect::to('fortalezas_opurtunidades')->with('status','Se guardó correctamente');
            } catch (Exception $e) {
                DB::rollback();
        }

    }


    public function edit($id)
    {

    
        $chequeo   = FortalesasOportunidades::findOrfail($id);

       $cheSisGestiones =  DB::table('tbl_empresa as e')
                            ->join('tbl_procesos as p','p.fk_empresa','=','e.id_empresa')
                            ->join('tbl_plane_auditoria_foropur as a','a.fk_proceso','=','p.id_proceso')
                            ->join('tbl_plane_auditoria_foropur_gestion as ag','ag.fk_foropur','=','a.id_foropur')
                            ->join('tbl_sistemas_gestion as g','g.id_sisgestion','=','ag.fk_sisgestion')
                            ->where('id_foropur',  $id)
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
        $usuarios = DB::table('users as u')
                        ->join('tbl_empresa as e','u.fk_empresa','=','e.id_empresa')
                        ->where('e.id_empresa','=',''.Auth::User()->fk_empresa.'')
                        ->where('e.bool_estado','=','1')
                        ->get();
                    //dd($cheSisGestiones);
        return view('pages.evaluacion.auditoria.for_opu.edit',[
            'chequeo'=>$chequeo,
            'empresa'=>$empresa,
            'procesos'=>$procesos,
            'cheSisGestiones'=>$cheSisGestiones,
            'usuarios'=>$usuarios,
            ]);
    }

    public function update(Request $request, $id)
    {
        try {
            DB::beginTransaction();

     
                $variable                     = FortalesasOportunidades::findOrfail($id);
                $variable->fecha_foropur      =  $request->get('fecha_foropur');
                $variable->lider              = ($request->get('lider')) ?         $request->get('lider') : '';
                $variable->equipo             = ($request->get('equipo')) ?        $request->get('equipo') : '';
                $variable->tipo_informe       =  $request->get('tipo_informe');
                $variable->descripcion_foropur = ($request->get('descripcion_foropur')) ? $request->get('descripcion_foropur') : '';
                $variable->fk_usuario          = $request->get('fk_usuario');
                $variable->fk_proceso          = $request->get('fk_proceso') ;
        
            $variable->update();

            FortalesasOportunidadesGestion::where('fk_foropur', $id)->delete();

            $fk_sisgestion  = $request->get('fk_sisgestion');
            $seleccion_foropur     = $request->get('seleccion_foropur');
           

            for ($i=0; $i <  count($fk_sisgestion) ; $i++) {

                $tiporequisito = new FortalesasOportunidadesGestion();
                $tiporequisito->fk_sisgestion      =    $fk_sisgestion[$i];
                $tiporequisito->seleccion_foropur  =    $seleccion_foropur[$i];

                $tiporequisito->fk_foropur      = $variable->id_foropur;
                $tiporequisito->bool_estado    = '1';
                $tiporequisito->save();
            }



            DB::commit();
            alert()->success('Se ha Editado correctamente.', 'Editado!')->persistent('Cerrar');
        
        } catch (Exception $e) {
            DB::rollback();
            alert()->error('Se ha Presentador un error.', 'Error!')->persistent('Cerrar');
            
        }
        return Redirect::to('fortalezas_opurtunidades')->with('status','Se actualizó correctamente');
    }


    public function destroy($id)
    {
            try {
            DB::beginTransaction();
            
            $ocultar 					= FortalesasOportunidades::findOrfail($id);
            $ocultar->bool_estado		= 0;
            $ocultar->update();


           DB::commit();
           return Redirect::to('fortalezas_opurtunidades')->with('status','Se eliminó correctamente');
        } catch (Exception $e) {
            DB::rollback();
        }
    }
}
