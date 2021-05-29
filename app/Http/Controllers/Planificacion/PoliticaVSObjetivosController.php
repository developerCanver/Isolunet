<?php

namespace App\Http\Controllers\Planificacion;

use App\Http\Controllers\Controller;
use App\Models\Planificacion\PoliticaVSObjetivos;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
use Redirect;
use Illuminate\Support\Facades\Auth;



class PoliticaVSObjetivosController extends Controller
{
  
    public function __construct()
        {
            $this->middleware('auth');
        }
        public function index($fk_politica)
        {

            $procesos      = DB::table('tbl_procesos as p')
                            ->join('tbl_empresa as e','p.fk_empresa','=','e.id_empresa')
                            ->join('users as u','u.fk_empresa','=','e.id_empresa')
                            ->where('u.id',Auth::User()->id)
                            ->where('p.bool_estado',  '=','1')
                            ->where('e.bool_estado',  '=','1')
                            ->orderby('id_proceso', 'DESC')->get();
                            //dd($procesos);

             $cargos      = DB::table('tbl_empresa as e')
                            ->join('tbl_areas as a','a.fk_empresa','=','e.id_empresa')
                            ->join('tbl_cargos as c','c.fk_area','=','a.id_area')
                            ->join('users as u','u.fk_empresa','=','e.id_empresa')
                            ->where('u.id',Auth::User()->id)
                            ->where('a.bool_estado',  '=','1')
                            ->where('c.bool_estado',  '=','1')->get();

            $politicas      = DB::table('tbl_empresa as e')
                            ->join('tbl_politica as p','p.fk_empresa','=','e.id_empresa')
                            ->join('tbl_pla_politica_objetivo as po','po.fk_politica','=','p.id_politica')
                            ->join('tbl_cargos as c','c.id_cargo','=','po.fk_cargo')
                            ->join('tbl_procesos as pr','pr.id_proceso','=','po.fk_proceso')
                            ->join('users as u','u.fk_empresa','=','e.id_empresa')
                            ->where('u.id',Auth::User()->id)
                            ->where('po.bool_estado',  '=','1') ->paginate(10);
                            //dd($politicas);


            return view('pages.planificacion.politicavsobjetivo.politica_index',[
                        'procesos' => $procesos,
                        'cargos' => $cargos,
                        'fk_politica' => $fk_politica,
                        'politicas' => $politicas,
                    ]);
        }

        
        public function index_politicas()
        {
            $politicas      = DB::table('tbl_empresa as e')                       
                        ->join('tbl_politica as p','p.fk_empresa','=','e.id_empresa')
                        ->join('users as u','u.fk_empresa','=','e.id_empresa')
                        ->where('u.id',Auth::User()->id)
                        ->where('e.bool_estado',  '=','1')
                        ->orderby('id_politica', 'DESC')->get();
           

            $texto='<p>POL&Iacute;TICA INTEGRIDA SISTEMAS DE GESTI&Oacute;N</p>';
            $a = html_entity_decode($texto);
            

               return view('pages.planificacion.politicavsobjetivo.index',[
                'politicas' => $politicas,
                    ]);
        }
    
  
       
        public function store(Request $request)
        {

            try {
                DB::beginTransaction();
                $fk_politica = $request->get('fk_politica');

                $variable               = new PoliticaVSObjetivos();
                $variable->integrada            = $request->get('integrada');
                $variable->nom_objetivos        = $request->get('nom_objetivos');
                $variable->indicador            = $request->get('indicador');
                $variable->meta                 = $request->get('meta');
                $variable->unidad               = $request->get('unidad');
                $variable->frecuencia           = $request->get('frecuencia');
                $variable->directrices          = $request->get('directrices');
                $variable->mejor                = $request->get('mejor');
                $variable->actividad            = $request->get('actividad');
                $variable->recurso              = $request->get('recurso');
                $variable->fecha_finilizacion   = $request->get('fecha_finilizacion');
                $variable->evaluacion           = $request->get('evaluacion');
                $variable->fk_politica          = $request->get('fk_politica');
                $variable->fk_proceso           = $request->get('fk_proceso');
                $variable->fk_cargo             = $request->get('fk_cargo');
                $variable->bool_estado          = '1';
                $variable->save();


                DB::commit();
                alert()->success('Se ha creado correctamente.', 'Creado!')->persistent('Cerrar');

            } catch (Exception $e) {
                DB::rollback();
                alert()->error('Se ha Presentador un error.', 'Error!')->persistent('Cerrar');
                
            }

            return Redirect::to('politica_vs_objetivo/'.$fk_politica)->with('status','Se guardó correctamente');
        }
    
      
    
        public function edit($id)
        {
            $politica = PoliticaVSObjetivos::findOrfail($id);
            $fk_politica=$politica->fk_politica;

            $procesos      = DB::table('tbl_procesos as p')
                        ->join('tbl_empresa as e','p.fk_empresa','=','e.id_empresa')
                        ->join('users as u','u.fk_empresa','=','e.id_empresa')
                        ->where('u.id',Auth::User()->id)
                        ->where('p.bool_estado',  '=','1')
                        ->where('e.bool_estado',  '=','1')
                        ->orderby('id_proceso', 'DESC')->get();
                        //dd($procesos);

            $cargos      = DB::table('tbl_empresa as e')
                        ->join('tbl_areas as a','a.fk_empresa','=','e.id_empresa')
                        ->join('tbl_cargos as c','c.fk_area','=','a.id_area')
                        ->join('users as u','u.fk_empresa','=','e.id_empresa')
                        ->where('u.id',Auth::User()->id)
                        ->where('a.bool_estado',  '=','1')
                        ->where('c.bool_estado',  '=','1')->get();

        return view('pages.planificacion.politicavsobjetivo.edit',[
                            'procesos' => $procesos,
                            'cargos' => $cargos,
                            'fk_politica' => $fk_politica,
                            'politica' => $politica,
                        ]);
        }
    
       
        public function update_politica(Request $request)
        {
        
            try {
                DB::beginTransaction();
                
                $id    = $request->get('id_politica_objetivo');
                $fk_politica    = $request->get('fk_politica');

                $variable                   = PoliticaVSObjetivos::findOrfail($id);
                $variable->integrada            = $request->get('integrada');
                $variable->nom_objetivos        = $request->get('nom_objetivos');
                $variable->indicador            = $request->get('indicador');
                $variable->meta                 = $request->get('meta');
                $variable->unidad               = $request->get('unidad');
                $variable->frecuencia           = $request->get('frecuencia');
                $variable->directrices          = $request->get('directrices');
                $variable->mejor                = $request->get('mejor');
                $variable->actividad            = $request->get('actividad');
                $variable->recurso              = $request->get('recurso');
                $variable->fecha_finilizacion   = $request->get('fecha_finilizacion');
                $variable->evaluacion           = $request->get('evaluacion');
                $variable->fk_politica          = $request->get('fk_politica');
                $variable->fk_proceso           = $request->get('fk_proceso');
                $variable->fk_cargo             = $request->get('fk_cargo');
             
                $variable->update();
    
    
    
                DB::commit();
                alert()->success('Se ha Editado correctamente.', 'Editado!')->persistent('Cerrar');
            
            } catch (Exception $e) {
                DB::rollback();
                alert()->error('Se ha Presentador un error.', 'Error!')->persistent('Cerrar');
                
            }
    
            return Redirect::to('politica_vs_objetivo/'.$fk_politica)->with('status','Se actualizó correctamente');
        }
    
      
        public function destroy($id)
        {
            try {
                DB::beginTransaction();
    
                $variable                   = PoliticaVSObjetivos::findOrfail($id);
                $variable->bool_estado      = '0';
                $variable->update();
                $fk_politica=$variable->fk_politica;
    
    
                DB::commit();
                alert()->success('Se ha eliminado correctamente.', 'Eliminado!')->persistent('Cerrar');
            
            } catch (Exception $e) {
                DB::rollback();
                alert()->error('Se ha Presentador un error.', 'Error!')->persistent('Cerrar');
                
            }
            return Redirect::to('politica_vs_objetivo/'.$fk_politica)->with('status','Se elimiinó correctamente');
        }
    
}
