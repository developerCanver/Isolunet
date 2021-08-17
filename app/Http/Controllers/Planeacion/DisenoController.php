<?php

namespace App\Http\Controllers\Planeacion;

use App\Http\Controllers\Controller;
use App\Models\Planeacion\Diseno;
use App\Models\User;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
    use Redirect;
    use Illuminate\Support\Facades\Auth;

class DisenoController extends Controller
{
    
    
        public function __construct()
        {
            $this->middleware('auth');
        }
    
        public function index(Request $request)
        {

            $usuario 					= User::findOrfail(Auth::User()->id);
            $rolUsuario=$usuario->fk_rol;
            $id_empresa=$usuario->fk_empresa;

            $empresa = DB::table('users as u')
                                ->join('tbl_empresa as e','e.id_empresa','=','u.fk_empresa')
                                ->where('u.id','=',Auth::User()->id)
                                ->where('e.bool_estado','=','1')
                                ->first();
         
    
            $consultas =  DB::table('tbl_empresa as e')
                            ->join('tbl_plane_diseño as p','p.fk_empresa','=','e.id_empresa')
                           ->where('e.id_empresa',  $id_empresa)
                            ->where('p.bool_estado','=','1')
                            ->where('e.bool_estado','=','1')
                            ->paginate(20);
                            
                        
            return view('pages.planeacion.diseno.index',[
                                    'empresa'=>$empresa,
                                    'consultas'=>$consultas,
                                        ]);
                
        }
    
    
        public function store(Request $request)
        {
        try {
                    DB::beginTransaction();
    
                    $variable 				  = new Diseno();
      
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
                    
                  
                    $variable->programa         = ($request->get('programa')) ?          $request->get('programa') : '';
                    $variable->fk_empresa       =  $request->get('fk_empresa');

                    //=I5+J5+(2*(K5+L5+M5))+N5
                
                    $legal      = ($request->get('legal')=='Si') ? 1 : 0; 
                    $control    = ($request->get('control')=='Si') ? 1 : 0; 
                    $periodicidad =$request->get('periodicidad');
                    $afectacion =$request->get('afectacion');

                    if ( $periodicidad=='No Aplica') {
                        $periodicidad=0;
                    } else if ( $periodicidad=='Afectación Leve') {
                        $periodicidad=1;
                    }else if ( $periodicidad=='Afectación significativa') {
                        $periodicidad=2;
                    }

                    $intensidad =$request->get('intensidad');
                    if ( $intensidad=='No Aplica') {
                        $intensidad=0;
                    } else if ( $intensidad=='Afectación Leve') {
                        $intensidad=1;
                    }else if ( $intensidad=='Afectación significativa') {
                        $intensidad=2;                    }
                    $intensidad =$request->get('intensidad');
                    if ( $intensidad=='No Aplica') {
                        $intensidad=0;
                    } else if ( $intensidad=='Afectación Leve') {
                        $intensidad=1;
                    }else if ( $intensidad=='Afectación significativa') {
                        $intensidad=2;
                    }

                    $permanencia =$request->get('permanencia');
                    if ( $permanencia=='No Aplica') {
                        $permanencia=0;
                    } else if ( $permanencia=='Afectación Leve') {
                        $permanencia=1;
                    }else if ( $permanencia=='Afectación significativa') {
                        $permanencia=2;                    }
                    $permanencia =$request->get('permanencia');
                    if ( $permanencia=='No Aplica') {
                        $permanencia=0;
                    } else if ( $permanencia=='Afectación Leve') {
                        $permanencia=1;
                    }else if ( $permanencia=='Afectación significativa') {
                        $permanencia=2;
                    }
                    $numero=$legal+$control+(2*($periodicidad+$intensidad+$permanencia))+$afectacion;                    
                    $variable->num_sinificancia = $numero;
                    $sinificancia='';
                    if ($numero>=9) {
                        $sinificancia='AlTA';
                    }else if ($numero>=8) {
                        $sinificancia='MEDIA';
                    }else if ($numero>=7) {
                        $sinificancia='BAJA';
                    }else if ($numero<=6) {
                        $sinificancia='NINGUNA';
                    }
                  
                    $variable->sinificancia     = $sinificancia;
                   
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
    
            $consulta   = Diseno::findOrfail($id);    
            $empresa = DB::table('users as u')
            ->join('tbl_empresa as e','e.id_empresa','=','u.fk_empresa')
            ->where('u.id','=',Auth::User()->id)
            ->where('e.bool_estado','=','1')
            ->first();
                        //dd($cheSisGestiones);
            return view('pages.planeacion.diseno.edit',[
                'empresa'=>$empresa,
                'consulta'=>$consulta,
                ]);
        }
    
    
    
        public function update(Request $request, $id)
        {
            try {
                DB::beginTransaction();
    
         
                    $variable                     = Diseno::findOrfail($id);
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
        
                    $variable->programa         = ($request->get('programa')) ?          $request->get('programa') : '';
                    $legal      = ($request->get('legal')=='Si') ? 1 : 0; 
                    $control    = ($request->get('control')=='Si') ? 1 : 0; 
                    $periodicidad =$request->get('periodicidad');
                    $afectacion =$request->get('afectacion');

                    if ( $periodicidad=='No Aplica') {
                        $periodicidad=0;
                    } else if ( $periodicidad=='Afectación Leve') {
                        $periodicidad=1;
                    }else if ( $periodicidad=='Afectación significativa') {
                        $periodicidad=2;
                    }

                    $intensidad =$request->get('intensidad');
                    if ( $intensidad=='No Aplica') {
                        $intensidad=0;
                    } else if ( $intensidad=='Afectación Leve') {
                        $intensidad=1;
                    }else if ( $intensidad=='Afectación significativa') {
                        $intensidad=2;                    }
                    $intensidad =$request->get('intensidad');
                    if ( $intensidad=='No Aplica') {
                        $intensidad=0;
                    } else if ( $intensidad=='Afectación Leve') {
                        $intensidad=1;
                    }else if ( $intensidad=='Afectación significativa') {
                        $intensidad=2;
                    }

                    $permanencia =$request->get('permanencia');
                    if ( $permanencia=='No Aplica') {
                        $permanencia=0;
                    } else if ( $permanencia=='Afectación Leve') {
                        $permanencia=1;
                    }else if ( $permanencia=='Afectación significativa') {
                        $permanencia=2;                    }
                    $permanencia =$request->get('permanencia');
                    if ( $permanencia=='No Aplica') {
                        $permanencia=0;
                    } else if ( $permanencia=='Afectación Leve') {
                        $permanencia=1;
                    }else if ( $permanencia=='Afectación significativa') {
                        $permanencia=2;
                    }
                    $numero=$legal+$control+(2*($periodicidad+$intensidad+$permanencia))+$afectacion;                    
                    $variable->num_sinificancia = $numero;
                    $sinificancia='';
                    if ($numero>=9) {
                        $sinificancia='AlTA';
                    }else if ($numero>=8) {
                        $sinificancia='MEDIA';
                    }else if ($numero>=7) {
                        $sinificancia='BAJA';
                    }else if ($numero<=6) {
                        $sinificancia='NINGUNA';
                    }
                  
                    $variable->sinificancia     = $sinificancia;
                   
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
              
                $ocultar 					= Diseno::findOrfail($id);
                $ocultar->bool_estado		= 0;
                $ocultar->update();
    
    
               DB::commit();
               return Redirect::to('diseno_desarrollo')->with('status','Se eliminó correctamente');
            } catch (Exception $e) {
                DB::rollback();
            }
        }
    
    
}
