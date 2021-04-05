<?php

namespace App\Http\Controllers\Planeacion;

use App\Http\Controllers\Controller;
use App\Models\Planeacion\Requisitos;
use App\Models\Planeacion\TipoRequisitos;
use Illuminate\Http\Request;


use Illuminate\Support\Facades\DB;
use Redirect;
use Illuminate\Support\Facades\Auth;

class RequisitosController extends Controller
{
  
      public function __construct()
        {
            $this->middleware('auth');
        }
        public function index()
        {
    
                    $empresa = DB::table('tbl_empresa as e')
                            ->where('e.fk_usuario','=',''.Auth::User()->id.'')
                            ->where('e.bool_estado','=','1')
                            ->first();

                    $Productos = DB::table('tbl_empresa as e')
                            ->join('tbl_producto as p','p.fk_empresa','=','e.id_empresa')
                            ->where('e.fk_usuario','=',''.Auth::User()->id.'')
                            ->where('e.bool_estado','=','1')
                            ->where('p.bool_estado','=','1')
                            ->get();
    
                            
            
    
                    $requisitos =  DB::table('tbl_empresa as e')
                            ->join('tbl_producto as p','p.fk_empresa','=','e.id_empresa')
                            ->join('tbl_plane_planeaciocontrol as pla','pla.fk_producto','=','p.id_producto')
                            ->where('e.fk_usuario','=',''.Auth::User()->id.'')
                            ->where('e.bool_estado','=','1')
                            ->where('p.bool_estado','=','1')
                            ->where('pla.bool_estado','=','1')
                            ->paginate(20);
                            //dd($requisitos);
    
            return view('pages.planeacion.requisitos.index',[
                'Productos' => $Productos,
                'requisitos' => $requisitos,
                'empresa' => $empresa,
               ]);
        }
    
        public function store(Request $request)
        {
            try {
              
                DB::beginTransaction();
    
                $variable                    = new Requisitos();
              
                $variable->tecnica      =$request->get('tecnica');
                $variable->fk_producto      =$request->get('fk_producto');
              


                $variable->des_producto  = ($request->get('des_producto')) ?  $request->get('des_producto') : '';
                $variable->composicion  = ($request->get('composicion')) ?  $request->get('composicion') : '';
                $variable->vida         = ($request->get('vida')) ?  $request->get('vida') : '';
                $variable->condicion    = ($request->get('condicion')) ?  $request->get('condicion') : '';
                $variable->envase       = ($request->get('envase')) ?  $request->get('envase') : '';
                $variable->etiquetado   = ($request->get('etiquetado')) ?  $request->get('etiquetado') : '';
                $variable->metodo       = ($request->get('metodo')) ?  $request->get('metodo') : '';
                $variable->requisito    = ($request->get('requisito')) ?  $request->get('requisito') : '';
                $variable->uso          = ($request->get('uso')) ?  $request->get('uso') : '';
                $variable->fisico       = ($request->get('fisico')) ?  $request->get('fisico') : '';
                $variable->biologico    = ($request->get('biologico')) ?  $request->get('biologico') : '';
                $variable->quimico      = ($request->get('quimico')) ?  $request->get('quimico') : '';
                $variable->presentacion = ($request->get('presentacion')) ?  $request->get('presentacion') : '';
                
                $variable->bool_estado           = '1';
                $variable->save();

                //agregr array quimica
                $nombre_qui = $request->get('nombre_qui');
                $unidad_qui = $request->get('unidad_qui');
                $minimo_qui = $request->get('minimo_qui');
                $maximo_qui = $request->get('maximo_qui');
                $metodo_qui = $request->get('metodo_qui');
                
                //dd( $variable->id_rol_res);
                for ($i=0; $i <  count($nombre_qui) ; $i++) {
     
                   $tiporequisito = new TipoRequisitos();
                   $tiporequisito->nombre = $nombre_qui[$i];
                   $tiporequisito->unidad      = ($unidad_qui[$i]) ?  $unidad_qui[$i] : '';
                   $tiporequisito->minimo      = ($minimo_qui[$i]) ?  $minimo_qui[$i] : '';
                   $tiporequisito->maximo      = ($maximo_qui[$i]) ?  $maximo_qui[$i] : '';
                   $tiporequisito->metodo      = ($metodo_qui[$i]) ?  $metodo_qui[$i] : '';
                   $tiporequisito->tipo_cataa      = "quimica";
                   $tiporequisito->fk_pla_control      = $variable->id_pla_control;

                   $tiporequisito->save();
                }
                //agregr array fisica
                $nombre_fis = $request->get('nombre_fis');
                $unidad_fis = $request->get('unidad_fis');
                $minimo_fis = $request->get('minimo_fis');
                $maximo_fis = $request->get('maximo_fis');
                $metodo_fis = $request->get('metodo_fis');

                for ($i=0; $i <  count($nombre_fis) ; $i++) {
     
                    $tiporequisito = new TipoRequisitos();
                    $tiporequisito->nombre = $nombre_fis[$i];
                    $tiporequisito->unidad      = ($unidad_fis[$i]) ?  $unidad_fis[$i] : '';
                    $tiporequisito->minimo      = ($minimo_fis[$i]) ?  $minimo_fis[$i] : '';
                    $tiporequisito->maximo      = ($maximo_fis[$i]) ?  $maximo_fis[$i] : '';
                    $tiporequisito->metodo      = ($metodo_fis[$i]) ?  $metodo_fis[$i] : '';
                    $tiporequisito->tipo_cataa      = "fisica";
                    $tiporequisito->fk_pla_control      = $variable->id_pla_control;
 
                    $tiporequisito->save();
                 }
                //agregr array biologica
                $nombre_bio = $request->get('nombre_bio');
                $unidad_bio = $request->get('unidad_bio');
                $minimo_bio = $request->get('minimo_bio');
                $maximo_bio = $request->get('maximo_bio');
                $metodo_bio = $request->get('metodo_bio');

                for ($i=0; $i <  count($nombre_bio) ; $i++) {

                    $tiporequisito = new TipoRequisitos();
                    $tiporequisito->nombre = $nombre_bio[$i];
                    $tiporequisito->unidad      = ($unidad_bio[$i]) ?  $unidad_bio[$i] : '';
                    $tiporequisito->minimo      = ($minimo_bio[$i]) ?  $minimo_bio[$i] : '';
                    $tiporequisito->maximo      = ($maximo_bio[$i]) ?  $maximo_bio[$i] : '';
                    $tiporequisito->metodo      = ($metodo_bio[$i]) ?  $metodo_bio[$i] : '';
                    $tiporequisito->tipo_cataa      = "biologia";
                    $tiporequisito->fk_pla_control      = $variable->id_pla_control;

                    $tiporequisito->save();
                }


                //agregr array sensorial
                $nombre_sen = $request->get('nombre_sen');
                $unidad_sen = $request->get('unidad_sen');
                $metodo_sen = $request->get('metodo_sen');

                for ($i=0; $i <  count($nombre_sen) ; $i++) {

                    $tiporequisito = new TipoRequisitos();
                    $tiporequisito->nombre = $nombre_sen[$i];
                    $tiporequisito->unidad      = ($unidad_sen[$i]) ?  $unidad_sen[$i] : '';
                    $tiporequisito->minimo      = '';
                    $tiporequisito->maximo      = '';
                    $tiporequisito->metodo      = ($metodo_sen[$i]) ?  $metodo_sen[$i] : '';
                    $tiporequisito->tipo_cataa      = "sensorial";
                    $tiporequisito->fk_pla_control      = $variable->id_pla_control;

                    $tiporequisito->save();
                }

               
              
    
    
                DB::commit();
                alert()->success('Se ha creado correctamente.', 'Creado!')->persistent('Cerrar');
            
            } catch (Exception $e) {
                DB::rollback();
                alert()->error('Se ha Presentador un error.', 'Error!')->persistent('Cerrar');
                
            }
    
            return Redirect::to('productos_servicios/')->with('status','Se guardó correctamente');
        }
    
     
       
        public function edit($id)
        {
            $requisito = Requisitos::findOrfail($id);
       
            $empresa = DB::table('tbl_empresa as e')
                    ->where('e.fk_usuario','=',''.Auth::User()->id.'')
                    ->where('e.bool_estado','=','1')
                    ->first();

            $Productos = DB::table('tbl_empresa as e')
                    ->join('tbl_producto as p','p.fk_empresa','=','e.id_empresa')
                    ->where('e.fk_usuario','=',''.Auth::User()->id.'')
                    ->where('e.bool_estado','=','1')
                    ->where('p.bool_estado','=','1')
                    ->get();

                    


            $tipos =  DB::table('tbl_empresa as e')
                    ->join('tbl_producto as p','p.fk_empresa','=','e.id_empresa')
                    ->join('tbl_plane_planeaciocontrol as pla','pla.fk_producto','=','p.id_producto')
                    ->join('tbl_plane_planeacion_tipo_car as tipo','tipo.fk_pla_control','=','pla.id_pla_control')
                    ->where('e.fk_usuario','=',''.Auth::User()->id.'')
                    ->where('e.bool_estado','=','1')
                    ->where('pla.id_pla_control','=',''.$id)
                    ->where('p.bool_estado','=','1')
                    ->where('pla.bool_estado','=','1')
                    ->get();

                    //dd($tipo_caracteristica);
            
            return view('pages.planeacion.requisitos.edit',[
                'empresa'=>$empresa,
                'Productos'=>$Productos,
                'tipos'=>$tipos,
                'requisito'=>$requisito,
                ]);
        }
    
      
        public function update(Request $request, $id)
        {
            try {
                DB::beginTransaction();
    
                    $variable               = Requisitos::findOrfail($id);
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
    
                $variable                   = Requisitos::findOrfail($id);
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
