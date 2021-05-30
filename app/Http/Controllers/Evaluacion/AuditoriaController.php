<?php

namespace App\Http\Controllers\Evaluacion;

use App\Http\Controllers\Controller;
use App\Models\Evaluacion\Auditoria;
use App\Models\Evaluacion\AuditoriaMultiple;
use App\Models\User;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
use Redirect;
use Illuminate\Support\Facades\Auth;


class AuditoriaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        $usuario = User::findOrfail(Auth::User()->id);
        $rolUsuario=$usuario->fk_rol;
        $id_empresa=$usuario->fk_empresa;
        
        $empresa = DB::table('users as u')
               ->join('tbl_empresa as e','e.id_empresa','=','u.fk_empresa')
               ->where('u.id','=',Auth::User()->id)
               ->where('e.bool_estado','=','1')
               ->first();

    
        $cargos = DB::table('tbl_areas as a')
                        ->join('tbl_empresa as em','a.fk_empresa','=','em.id_empresa')
                        ->join('tbl_cargos as e','a.id_area','=','e.fk_area')
                        ->where('em.id_empresa',  $id_empresa)
                        ->where('e.bool_estado','=','1')
                        ->where('em.bool_estado','=','1')
                        ->where('a.bool_estado','=','1')
                        ->orderby('em.razon_social','desc')
                        ->get();    

        $auditorias = DB::table('tbl_areas as a')
                        ->join('tbl_empresa as em','a.fk_empresa','=','em.id_empresa')
                        ->join('tbl_cargos as e','a.id_area','=','e.fk_area')
                        ->join('tbl_plane_auditoria as pa','pa.fk_cargo','=','e.id_cargo')
                        ->where('em.id_empresa',  $id_empresa)
                        ->where('e.bool_estado','=','1')
                        ->where('em.bool_estado','=','1')
                        ->where('pa.bool_estado','=','1')
                        ->where('a.bool_estado','=','1')
                        ->orderby('em.razon_social','desc')
                        ->paginate(20);
                        //dd($auditorias);             

        return view('pages.evaluacion.auditoria.index',[
                                'empresa'=>$empresa,
                                'auditorias'=>$auditorias,
                                'cargos'=>$cargos,
                                    ]);
    	    
    }


    public function store(Request $request)
    {
    try {
                DB::beginTransaction();

                $variable 				  = new Auditoria();
                $variable->direcion       = ($request->get('direcion')) ?    $request->get('direcion') : '';
                $variable->representante  = ($request->get('representante')) ?   $request->get('representante') : '';
                $variable->correo         = ($request->get('correo')) ?      $request->get('correo') : '';
                $variable->alcance        = ($request->get('alcance')) ?     $request->get('alcance') : '';
                $variable->criterios      = ($request->get('criterios')) ?   $request->get('criterios') : '';
                $variable->tipo_auditoria = ($request->get('tipo_auditoria')) ?      $request->get('tipo_auditoria') : '';
                $variable->multisitio     = ($request->get('multisitio')) ?      $request->get('multisitio') : '';
                $variable->nocturno       = ($request->get('nocturno')) ?    $request->get('nocturno') : '';
                $variable->descripcion    = ($request->get('descripcion')) ?     $request->get('descripcion') : '';
                $variable->auditor_1      = ($request->get('auditor_1')) ?   $request->get('auditor_1') : '';
                $variable->cooreo_aud_1   = ($request->get('cooreo_aud_1')) ?    $request->get('cooreo_aud_1') : '';
                $variable->auditor_2      = ($request->get('auditor_2')) ?   $request->get('auditor_2') : '';
                $variable->cooreo_aud_2   = ($request->get('cooreo_aud_2')) ?    $request->get('cooreo_aud_2') : '';
                $variable->auditor_3      = ($request->get('auditor_3')) ?   $request->get('auditor_3') : '';
                $variable->cooreo_aud_3   = ($request->get('cooreo_aud_3')) ?    $request->get('cooreo_aud_3') : '';
                $variable->auditor_4      = ($request->get('auditor_4')) ?   $request->get('auditor_4') : '';
                $variable->cooreo_aud_4   = ($request->get('cooreo_aud_4')) ?    $request->get('cooreo_aud_4') : '';
                $variable->auditor_5      = ($request->get('auditor_5')) ?   $request->get('auditor_5') : '';
                $variable->cooreo_aud_5   = ($request->get('cooreo_aud_5')) ?    $request->get('cooreo_aud_5') : '';
                $variable->auditor_6      = ($request->get('auditor_6')) ?   $request->get('auditor_6') : '';
                $variable->cooreo_aud_6   = ($request->get('cooreo_aud_6')) ?    $request->get('cooreo_aud_6') : '';
                $variable->observaciones  = ($request->get('observaciones')) ?   $request->get('observaciones') : '';
                $variable->modalidad      = ($request->get('modalidad')) ?   $request->get('modalidad') : '';
                $variable->fecha_emision  = ($request->get('fecha_emision')) ?   $request->get('fecha_emision') : '';
                $variable->bool_estado    = '1';
                $variable->fk_cargo       =  $request->get('fk_cargo');

                $variable->save();    
                
                $fecha_multiple  = $request->get('fecha_multiple');
                $hora_inicio     = $request->get('hora_inicio');
                $hora_fin    = $request->get('hora_fin');
                $requisitos  = $request->get('requisitos');
                $equipo  = $request->get('equipo');
                $info_personas   = $request->get('info_personas');

                for ($i=0; $i <  count($fecha_multiple) ; $i++) {

                    $tiporequisito = new AuditoriaMultiple();
                    $tiporequisito->fecha_multiple      = ($fecha_multiple[$i]) ?    $fecha_multiple[$i] : '';
                    $tiporequisito->hora_inicio         = ($hora_inicio[$i]) ?       $hora_inicio[$i] : '';
                    $tiporequisito->hora_fin            = ($hora_fin[$i]) ?          $hora_fin[$i] : '';
                    $tiporequisito->requisitos          = ($requisitos[$i]) ?        $requisitos[$i] : '';
                    $tiporequisito->equipo              = ($equipo[$i]) ?            $equipo[$i] : '';
                    $tiporequisito->info_personas       = ($info_personas[$i]) ?     $info_personas[$i] : '';



                    $tiporequisito->fk_auditoria      = $variable->id_auditoria;
                    $variable->bool_estado    = '1';
                    $tiporequisito->save();
                }


                DB::commit();
                return Redirect::to('auditoria')->with('status','Se guardó correctamente');
            } catch (Exception $e) {
                DB::rollback();
        }

    }


    public function edit($id)
    {
        $usuario = User::findOrfail(Auth::User()->id);
        $rolUsuario=$usuario->fk_rol;
        $id_empresa=$usuario->fk_empresa;
        
        $cargos = DB::table('tbl_areas as a')
                                ->join('tbl_empresa as em','a.fk_empresa','=','em.id_empresa')
                                ->join('tbl_cargos as e','a.id_area','=','e.fk_area')
                                ->where('em.id_empresa',  $id_empresa)
                                ->where('e.bool_estado','=','1')
                                ->where('em.bool_estado','=','1')
                                ->where('a.bool_estado','=','1')
                                ->orderby('em.razon_social','desc')
                                ->get();     

        $auditoria = DB::table('tbl_areas as a')
                    ->join('tbl_empresa as em','a.fk_empresa','=','em.id_empresa')
                    ->join('tbl_cargos as e','a.id_area','=','e.fk_area')
                    ->join('tbl_plane_auditoria as pa','pa.fk_cargo','=','e.id_cargo')
                    ->where('pa.id_auditoria', $id)
                    ->first();
                    

        $multiples = DB::table('tbl_areas as a')
                    ->join('tbl_empresa as em','a.fk_empresa','=','em.id_empresa')
                    ->join('tbl_cargos as e','a.id_area','=','e.fk_area')
                    ->join('tbl_plane_auditoria as pa','pa.fk_cargo','=','e.id_cargo')
                    ->join('tbl_plane_auditoria_multiples as am','am.fk_auditoria','=','pa.id_auditoria')
                    ->where('pa.id_auditoria', $id)
                    ->get();
                   // dd($multiples);
                    
        return view('pages.evaluacion.auditoria.edit',[
            'auditoria'=>$auditoria,
            'multiples'=>$multiples,
            'cargos'=>$cargos,
            ]);
    }

    public function update(Request $request, $id)
    {
        try {
            DB::beginTransaction();

     
            $variable                 = Auditoria::findOrfail($id);
           
            $variable->direcion       = ($request->get('direcion')) ?    $request->get('direcion') : '';
            $variable->representante  = ($request->get('representante')) ?   $request->get('representante') : '';
            $variable->correo         = ($request->get('correo')) ?      $request->get('correo') : '';
            $variable->alcance        = ($request->get('alcance')) ?     $request->get('alcance') : '';
            $variable->criterios      = ($request->get('criterios')) ?   $request->get('criterios') : '';
            $variable->tipo_auditoria = ($request->get('tipo_auditoria')) ?      $request->get('tipo_auditoria') : '';
            $variable->multisitio     = ($request->get('multisitio')) ?      $request->get('multisitio') : '';
            $variable->nocturno       = ($request->get('nocturno')) ?    $request->get('nocturno') : '';
            $variable->descripcion    = ($request->get('descripcion')) ?     $request->get('descripcion') : '';
            $variable->auditor_1      = ($request->get('auditor_1')) ?   $request->get('auditor_1') : '';
            $variable->cooreo_aud_1   = ($request->get('cooreo_aud_1')) ?    $request->get('cooreo_aud_1') : '';
            $variable->auditor_2      = ($request->get('auditor_2')) ?   $request->get('auditor_2') : '';
            $variable->cooreo_aud_2   = ($request->get('cooreo_aud_2')) ?    $request->get('cooreo_aud_2') : '';
            $variable->auditor_3      = ($request->get('auditor_3')) ?   $request->get('auditor_3') : '';
            $variable->cooreo_aud_3   = ($request->get('cooreo_aud_3')) ?    $request->get('cooreo_aud_3') : '';
            $variable->auditor_4      = ($request->get('auditor_4')) ?   $request->get('auditor_4') : '';
            $variable->cooreo_aud_4   = ($request->get('cooreo_aud_4')) ?    $request->get('cooreo_aud_4') : '';
            $variable->auditor_5      = ($request->get('auditor_5')) ?   $request->get('auditor_5') : '';
            $variable->cooreo_aud_5   = ($request->get('cooreo_aud_5')) ?    $request->get('cooreo_aud_5') : '';
            $variable->auditor_6      = ($request->get('auditor_6')) ?   $request->get('auditor_6') : '';
            $variable->cooreo_aud_6   = ($request->get('cooreo_aud_6')) ?    $request->get('cooreo_aud_6') : '';
            $variable->observaciones  = ($request->get('observaciones')) ?   $request->get('observaciones') : '';
            $variable->modalidad      = ($request->get('modalidad')) ?   $request->get('modalidad') : '';
            $variable->fecha_emision  = ($request->get('fecha_emision')) ?   $request->get('fecha_emision') : '';
            $variable->fk_cargo       =  $request->get('fk_cargo');
            $variable->update();

            AuditoriaMultiple::where('fk_auditoria', $id)->delete();

            $fecha_multiple  = $request->get('fecha_multiple');
            $hora_inicio     = $request->get('hora_inicio');
            $hora_fin    = $request->get('hora_fin');
            $requisitos  = $request->get('requisitos');
            $equipo  = $request->get('equipo');
            $info_personas   = $request->get('info_personas');

            for ($i=0; $i <  count($fecha_multiple) ; $i++) {

                $tiporequisito = new AuditoriaMultiple();
                $tiporequisito->fecha_multiple      = ($fecha_multiple[$i]) ?    $fecha_multiple[$i] : '';
                $tiporequisito->hora_inicio         = ($hora_inicio[$i]) ?       $hora_inicio[$i] : '';
                $tiporequisito->hora_fin            = ($hora_fin[$i]) ?          $hora_fin[$i] : '';
                $tiporequisito->requisitos          = ($requisitos[$i]) ?        $requisitos[$i] : '';
                $tiporequisito->equipo              = ($equipo[$i]) ?            $equipo[$i] : '';
                $tiporequisito->info_personas       = ($info_personas[$i]) ?     $info_personas[$i] : '';



                $tiporequisito->fk_auditoria      = $variable->id_auditoria;
                $variable->bool_estado    = '1';
                $tiporequisito->save();
            }



            DB::commit();
            alert()->success('Se ha Editado correctamente.', 'Editado!')->persistent('Cerrar');
        
        } catch (Exception $e) {
            DB::rollback();
            alert()->error('Se ha Presentador un error.', 'Error!')->persistent('Cerrar');
            
        }
        return Redirect::to('auditoria')->with('status','Se actualizó correctamente');
    }


    public function destroy($id)
    {
            try {
            DB::beginTransaction();
            
            $ocultar 					= Auditoria::findOrfail($id);
            $ocultar->bool_estado		= 0;
            $ocultar->update();


           DB::commit();
           return Redirect::to('auditoria')->with('status','Se eliminó correctamente');
        } catch (Exception $e) {
            DB::rollback();
        }
    }

}
