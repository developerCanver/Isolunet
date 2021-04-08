<?php

namespace App\Http\Controllers\Evaluacion;

use App\Http\Controllers\Controller;
use App\Models\Evaluacion\Hallazgos;
use App\Models\Evaluacion\HallazgosGestion;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
use Redirect;
use Illuminate\Support\Facades\Auth;


class HallazgosController extends Controller
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
                        ->join('tbl_plane_auditoria_hallazgos as p','p.fk_empresa','=','e.id_empresa')
                        ->where('e.fk_usuario','=',''.Auth::User()->id.'')
                        ->where('p.bool_estado','=','1')
                        ->paginate(20);
                        //dd($chequeos); 


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

        return view('pages.evaluacion.auditoria.hallazgos.index',[
                                'empresa'=>$empresa,
                                'chequeos'=>$chequeos,
                                'gestiones'=>$gestiones,
                                'usuarios'=>$usuarios,
                                    ]);
    	    
    }


    public function store(Request $request)
    {
    try {
                DB::beginTransaction();

                $variable 				  = new Hallazgos();
  
                $variable->ubicacion            = ($request->get('ubicacion')) ?         $request->get('ubicacion') : '';
                $variable->descripciones        = ($request->get('descripciones')) ?         $request->get('descripciones') : '';
                $variable->evidencia            = ($request->get('evidencia')) ?         $request->get('evidencia') : '';
                $variable->requisito            = ($request->get('requisito')) ?         $request->get('requisito') : '';
                $variable->num_detectadas       = ($request->get('num_detectadas')) ?         $request->get('num_detectadas') : '';
                $variable->num_cerredas         = ($request->get('num_cerredas')) ?         $request->get('num_cerredas') : '';
                $variable->reviso               = ($request->get('reviso')) ?         $request->get('reviso') : '';
                $variable->aprobo               = ($request->get('aprobo')) ?         $request->get('aprobo') : '';
                $variable->fk_empresa           =   $request->get('fk_empresa');
             

                $variable->bool_estado        = '1';
               
        
                $variable->save();    
                
                $fk_sisgestion  = $request->get('fk_sisgestion');
                $seleccion_hallazgos     = $request->get('seleccion_hallazgos');
               

                for ($i=0; $i <  count($fk_sisgestion) ; $i++) {

                    $tiporequisito = new HallazgosGestion();
                    $tiporequisito->fk_sisgestion        =    $fk_sisgestion[$i];
                    $tiporequisito->seleccion_hallazgos  =    $seleccion_hallazgos[$i];

                    $tiporequisito->fk_hallazgos      = $variable->id_hallazgos;
                    $tiporequisito->bool_estado    = '1';
                    $tiporequisito->save();
                }


                DB::commit();
                return Redirect::to('hallasgos')->with('status','Se guardó correctamente');
            } catch (Exception $e) {
                DB::rollback();
        }

    }


    public function edit($id)
    {

    
        $chequeo   = Hallazgos::findOrfail($id);

       $cheSisGestiones =  DB::table('tbl_empresa as e')
                            ->join('tbl_plane_auditoria_hallazgos as h','h.fk_empresa','=','e.id_empresa')
                            ->join('tbl_plane_auditoria_hallazgos_gestion as hg','hg.fk_hallazgos','=','h.id_hallazgos')
                            ->join('tbl_sistemas_gestion as g','g.id_sisgestion','=','hg.fk_sisgestion')
                            ->where('id_hallazgos',  $id)
                            ->get();

        $empresa = DB::table('tbl_empresa as e')
                            ->where('e.fk_usuario','=',''.Auth::User()->id.'')
                            ->where('e.bool_estado','=','1')
                            ->first();

        $usuarios = DB::table('users as u')
                        ->join('tbl_empresa as e','u.fk_empresa','=','e.id_empresa')
                        ->where('e.id_empresa','=',''.Auth::User()->fk_empresa.'')
                        ->where('e.bool_estado','=','1')
                        ->get();
                    //dd($cheSisGestiones);
        return view('pages.evaluacion.auditoria.hallazgos.edit',[
            'chequeo'=>$chequeo,
            'empresa'=>$empresa,
            'cheSisGestiones'=>$cheSisGestiones,
            'usuarios'=>$usuarios,
            ]);
    }

    public function update(Request $request, $id)
    {
        try {
            DB::beginTransaction();

     
                $variable                     = Hallazgos::findOrfail($id);
                $variable->ubicacion            = ($request->get('ubicacion')) ?         $request->get('ubicacion') : '';
                $variable->descripciones        = ($request->get('descripciones')) ?         $request->get('descripciones') : '';
                $variable->evidencia            = ($request->get('evidencia')) ?         $request->get('evidencia') : '';
                $variable->requisito            = ($request->get('requisito')) ?         $request->get('requisito') : '';
                $variable->num_detectadas       = ($request->get('num_detectadas')) ?         $request->get('num_detectadas') : '';
                $variable->num_cerredas         = ($request->get('num_cerredas')) ?         $request->get('num_cerredas') : '';
                $variable->reviso               = ($request->get('reviso')) ?         $request->get('reviso') : '';
                $variable->aprobo               = ($request->get('aprobo')) ?         $request->get('aprobo') : '';
               
        
            $variable->update();

            HallazgosGestion::where('fk_hallazgos', $id)->delete();

            $fk_sisgestion  = $request->get('fk_sisgestion');
            $seleccion_hallazgos     = $request->get('seleccion_hallazgos');
           

            for ($i=0; $i <  count($fk_sisgestion) ; $i++) {

                $tiporequisito = new HallazgosGestion();
                $tiporequisito->fk_sisgestion        =    $fk_sisgestion[$i];
                $tiporequisito->seleccion_hallazgos  =    $seleccion_hallazgos[$i];

                $tiporequisito->fk_hallazgos      = $variable->id_hallazgos;
                $tiporequisito->bool_estado    = '1';
                $tiporequisito->save();
            }



            DB::commit();
            alert()->success('Se ha Editado correctamente.', 'Editado!')->persistent('Cerrar');
        
        } catch (Exception $e) {
            DB::rollback();
            alert()->error('Se ha Presentador un error.', 'Error!')->persistent('Cerrar');
            
        }
        return Redirect::to('hallasgos')->with('status','Se actualizó correctamente');
    }


    public function destroy($id)
    {
            try {
            DB::beginTransaction();
            
            $ocultar 					= Hallazgos::findOrfail($id);
            $ocultar->bool_estado		= 0;
            $ocultar->update();


           DB::commit();
           return Redirect::to('hallasgos')->with('status','Se eliminó correctamente');
        } catch (Exception $e) {
            DB::rollback();
        }
    }
}
