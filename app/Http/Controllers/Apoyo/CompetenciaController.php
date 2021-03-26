<?php

namespace App\Http\Controllers\Apoyo;

use App\Http\Controllers\Controller;
use App\Models\Apoyo\Competencia;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
use Redirect;
use Illuminate\Support\Facades\Auth;



class CompetenciaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {

        // $procesos      = DB::table('tbl_procesos as p')
        //                 ->join('tbl_empresa as e','p.fk_empresa','=','e.id_empresa')
        //                 ->join('users as u','u.id','=','e.fk_usuario')
        //                 ->where('e.fk_usuario',     '=',''.Auth::User()->id.'')
        //                 ->where('p.bool_estado',  '=','1')
        //                 ->where('e.bool_estado',  '=','1')
        //                 ->orderby('id_proceso', 'DESC')->get();
        //                 //dd($procesos);

         $cargos      = DB::table('tbl_empresa as e')
                        ->join('tbl_areas as a','a.fk_empresa','=','e.id_empresa')
                        ->join('tbl_cargos as c','c.fk_area','=','a.id_area')
                        ->join('users as u','u.id','=','e.fk_usuario')
                        ->where('e.fk_usuario',     '=',''.Auth::User()->id.'')
                        ->where('a.bool_estado',  '=','1')
                        ->where('c.bool_estado',  '=','1')->get();

        $areas      = DB::table('tbl_empresa as e')
                        ->join('tbl_areas as a','a.fk_empresa','=','e.id_empresa')
                        ->join('users as u','u.id','=','e.fk_usuario')
                        ->where('e.fk_usuario',     '=',''.Auth::User()->id.'')
                        ->where('a.bool_estado',  '=','1')->get();
                        //dd($areas);

        $competencias      = DB::table('tbl_empresa as e')
                        ->join('tbl_apo_competencia as ap','ap.fk_empresa','=','e.id_empresa')
                        ->where('e.fk_usuario',     '=',''.Auth::User()->id.'')
                        ->where('e.bool_estado',  '=','1')
                        ->where('ap.bool_estado',  '=','1')
                         ->paginate(10);

       $empresa      = DB::table('tbl_empresa as e')
                         ->where('e.fk_usuario',     '=',''.Auth::User()->id.'')
                         ->where('e.bool_estado',  '=','1')
                          ->first();
                        //dd($politicas);


        return view('pages.apoyo.competencia.index',[
                    'areas' => $areas,
                    'cargos' => $cargos,
                    'competencias' => $competencias,
                    'empresa' => $empresa,
                ]);
    }
    public function store(Request $request)
    {
        try {
            //dd($request);
            DB::beginTransaction();
        

            $variable                    = new Competencia();
            $variable->fecha_competencia =$request->get('fecha_competencia');
            $variable->cargo_com       =$request->get('cargo_com');
            $variable->area_com        =$request->get('area_com');
            $variable->genero          =$request->get('genero');
            $variable->reporta_a       =$request->get('reporta_a');
            $variable->mision_cargo    =$request->get('mision_cargo');
            $variable->directas        =$request->get('directas');
            $variable->indirectas      =$request->get('indirectas');
            $variable->nivel1          =$request->get('nivel1');
            $variable->especialidad1   =$request->get('especialidad1');
            $variable->edu_area1       =$request->get('edu_area1');
            $variable->idioma1         =$request->get('idioma1');
            $variable->sistema1        =$request->get('sistema1');
            if ($request->get('nivel2')) {
                $variable->nivel2          =$request->get('nivel2');
            }else {
                $variable->nivel2          ='';
            }
            if ($request->get('especialidad2')) {
                $variable->especialidad2          =$request->get('especialidad2');
            }else {
                $variable->especialidad2          ='';
            }
            if ($request->get('edu_area2')) {
                $variable->edu_area2          =$request->get('edu_area2');
            }else {
                $variable->edu_area2          ='';
            }
            if ($request->get('idioma2')) {
                $variable->idioma2          =$request->get('idioma2');
            }else {
                $variable->idioma2          ='';
            }
            if ($request->get('sistema2')) {
                $variable->sistema2          =$request->get('sistema2');
            }else {
                $variable->sistema2          ='';
            }
           
            
            $variable->exp_area1       =$request->get('exp_area1');
            $variable->tiempo1         =$request->get('tiempo1');
            if ($request->get('exp_area2')) {
                $variable->exp_area2          =$request->get('exp_area2');
            }else {
                $variable->exp_area2          ='';
            }
            if ($request->get('tiempo2')) {
                $variable->tiempo2          =$request->get('tiempo2');
            }else {
                $variable->tiempo2          ='';
            }
            if ($request->get('exp_area3')) {
                $variable->exp_area3          =$request->get('exp_area3');
            }else {
                $variable->exp_area3          ='';
            }
            if ($request->get('tiempo3')) {
                $variable->tiempo3          =$request->get('tiempo3');
            }else {
                $variable->tiempo3          ='';
            }
            $variable->descripcion     =$request->get('descripcion');
            $variable->compartida1     =$request->get('compartida1');
            $variable->dec_area1       =$request->get('dec_area1');
            $variable->autonoma1       =$request->get('autonoma1');
            if ($request->get('compartida2')) {
                $variable->compartida2          =$request->get('compartida2');
            }else {
                $variable->compartida2          ='';
            }if ($request->get('dec_area2')) {
                $variable->dec_area2          =$request->get('dec_area2');
            }else {
                $variable->dec_area2          ='';
            }
            if ($request->get('autonoma2')) {
                $variable->autonoma2          =$request->get('autonoma2');
            }else {
                $variable->autonoma2          ='';
            }
            if ($request->get('compartida3')) {
                $variable->compartida3          =$request->get('compartida3');
            }else {
                $variable->compartida3          ='';
            }
            if ($request->get('dec_area3')) {
                $variable->dec_area3          =$request->get('dec_area3');
            }else {
                $variable->dec_area3          ='';
            }if ($request->get('dec_area3')) {
                $variable->dec_area3          =$request->get('dec_area3');
            }else {
                $variable->dec_area3          ='';
            }if ($request->get('autonoma3')) {
                $variable->autonoma3          =$request->get('autonoma3');
            }else {
                $variable->autonoma3          ='';
            }if ($request->get('compartida4')) {
                $variable->compartida4          =$request->get('compartida4');
            }else {
                $variable->compartida4          ='';
            }if ($request->get('dec_area4')) {
                $variable->dec_area4          =$request->get('dec_area4');
            }else {
                $variable->dec_area4          ='';
            }if ($request->get('autonoma4')) {
                $variable->autonoma4          =$request->get('autonoma4');
            }else {
                $variable->autonoma4          ='';
            }
            $variable->tecnica         =$request->get('tecnica');
            $variable->especial        =$request->get('especial');
            $variable->int_area1       =$request->get('int_area1');
            $variable->int_objetivo1   =$request->get('int_objetivo1');
            if ($request->get('int_area2')) {
                $variable->int_area2          =$request->get('int_area2');
            }else {
                $variable->int_area2          ='';
            }if ($request->get('int_objetivo2')) {
                $variable->int_objetivo2          =$request->get('int_objetivo2');
            }else {
                $variable->int_objetivo2          ='';
            }if ($request->get('int_area3')) {
                $variable->int_area3          =$request->get('int_area3');
            }else {
                $variable->int_area3          ='';
            }if ($request->get('int_objetivo3')) {
                $variable->int_objetivo3          =$request->get('int_objetivo3');
            }else {
                $variable->int_objetivo3          ='';
            }
            $variable->ext_area1       =$request->get('ext_area1');
            $variable->ext_objetivo1   =$request->get('ext_objetivo1');
            if ($request->get('ext_area2')) {
                $variable->ext_area2          =$request->get('ext_area2');
            }else {
                $variable->ext_area2          ='';
            }
            if ($request->get('ext_objetivo2')) {
                $variable->ext_objetivo2          =$request->get('ext_objetivo2');
            }else {
                $variable->ext_objetivo2          ='';
            }
            if ($request->get('ext_area3')) {
                $variable->ext_area3          =$request->get('ext_area3');
            }else {
                $variable->ext_area3          ='';
            }
            if ($request->get('ext_objetivo3')) {
                $variable->ext_objetivo3          =$request->get('ext_objetivo3');
            }else {
                $variable->ext_objetivo3          ='';
            }
            $variable->actividades     =$request->get('actividades');
            $variable->bool_estado     ='1';
            $variable->fk_empresa     =$request->get('fk_empresa');
         
  
            $variable->save();

            DB::commit();
            alert()->success('Se ha creado correctamente.', 'Creado!')->persistent('Cerrar');
        
        } catch (Exception $e) {
            DB::rollback();
            alert()->error('Se ha Presentador un error.', 'Error!')->persistent('Cerrar');
            
        }

        return Redirect::to('competencia/')->with('status','Se guardó correctamente');
    }
    public function edit($id)
    {
        $competencia = Competencia::findOrfail($id);
      

        $cargos      = DB::table('tbl_empresa as e')
                ->join('tbl_areas as a','a.fk_empresa','=','e.id_empresa')
                ->join('tbl_cargos as c','c.fk_area','=','a.id_area')
                ->join('users as u','u.id','=','e.fk_usuario')
                ->where('e.fk_usuario',     '=',''.Auth::User()->id.'')
                ->where('a.bool_estado',  '=','1')
                ->where('c.bool_estado',  '=','1')->get();

        $areas      = DB::table('tbl_empresa as e')
                ->join('tbl_areas as a','a.fk_empresa','=','e.id_empresa')
                ->join('users as u','u.id','=','e.fk_usuario')
                ->where('e.fk_usuario',     '=',''.Auth::User()->id.'')
                ->where('a.bool_estado',  '=','1')->get();
                //dd($areas);

 


                //dd($politicas);


        return view('pages.apoyo.competencia.edit',[
            'areas' => $areas,
            'cargos' => $cargos,
            'competencia' => $competencia,
            
        ]);

      
    }

  
    public function update(Request $request, $id)
    {
        try {
            DB::beginTransaction();
            $variable                   = Competencia::findOrfail($id);
            $variable->fecha_competencia =$request->get('fecha_competencia');
            $variable->cargo_com       =$request->get('cargo_com');
            $variable->area_com        =$request->get('area_com');
            $variable->genero          =$request->get('genero');
            $variable->reporta_a       =$request->get('reporta_a');
            $variable->mision_cargo    =$request->get('mision_cargo');
            $variable->directas        =$request->get('directas');
            $variable->indirectas      =$request->get('indirectas');
            $variable->nivel1          =$request->get('nivel1');
            $variable->especialidad1   =$request->get('especialidad1');
            $variable->edu_area1       =$request->get('edu_area1');
            $variable->idioma1         =$request->get('idioma1');
            $variable->sistema1        =$request->get('sistema1');
            if ($request->get('nivel2')) {
                $variable->nivel2          =$request->get('nivel2');
            }else {
                $variable->nivel2          ='';
            }
            if ($request->get('especialidad2')) {
                $variable->especialidad2          =$request->get('especialidad2');
            }else {
                $variable->especialidad2          ='';
            }
            if ($request->get('edu_area2')) {
                $variable->edu_area2          =$request->get('edu_area2');
            }else {
                $variable->edu_area2          ='';
            }
            if ($request->get('idioma2')) {
                $variable->idioma2          =$request->get('idioma2');
            }else {
                $variable->idioma2          ='';
            }
            if ($request->get('sistema2')) {
                $variable->sistema2          =$request->get('sistema2');
            }else {
                $variable->sistema2          ='';
            }
           
            
            $variable->exp_area1       =$request->get('exp_area1');
            $variable->tiempo1         =$request->get('tiempo1');
            if ($request->get('exp_area2')) {
                $variable->exp_area2          =$request->get('exp_area2');
            }else {
                $variable->exp_area2          ='';
            }
            if ($request->get('tiempo2')) {
                $variable->tiempo2          =$request->get('tiempo2');
            }else {
                $variable->tiempo2          ='';
            }
            if ($request->get('exp_area3')) {
                $variable->exp_area3          =$request->get('exp_area3');
            }else {
                $variable->exp_area3          ='';
            }
            if ($request->get('tiempo3')) {
                $variable->tiempo3          =$request->get('tiempo3');
            }else {
                $variable->tiempo3          ='';
            }
            $variable->descripcion     =$request->get('descripcion');
            $variable->compartida1     =$request->get('compartida1');
            $variable->dec_area1       =$request->get('dec_area1');
            $variable->autonoma1       =$request->get('autonoma1');
            if ($request->get('compartida2')) {
                $variable->compartida2          =$request->get('compartida2');
            }else {
                $variable->compartida2          ='';
            }if ($request->get('dec_area2')) {
                $variable->dec_area2          =$request->get('dec_area2');
            }else {
                $variable->dec_area2          ='';
            }
            if ($request->get('autonoma2')) {
                $variable->autonoma2          =$request->get('autonoma2');
            }else {
                $variable->autonoma2          ='';
            }
            if ($request->get('compartida3')) {
                $variable->compartida3          =$request->get('compartida3');
            }else {
                $variable->compartida3          ='';
            }
            if ($request->get('dec_area3')) {
                $variable->dec_area3          =$request->get('dec_area3');
            }else {
                $variable->dec_area3          ='';
            }if ($request->get('dec_area3')) {
                $variable->dec_area3          =$request->get('dec_area3');
            }else {
                $variable->dec_area3          ='';
            }if ($request->get('autonoma3')) {
                $variable->autonoma3          =$request->get('autonoma3');
            }else {
                $variable->autonoma3          ='';
            }if ($request->get('compartida4')) {
                $variable->compartida4          =$request->get('compartida4');
            }else {
                $variable->compartida4          ='';
            }if ($request->get('dec_area4')) {
                $variable->dec_area4          =$request->get('dec_area4');
            }else {
                $variable->dec_area4          ='';
            }if ($request->get('autonoma4')) {
                $variable->autonoma4          =$request->get('autonoma4');
            }else {
                $variable->autonoma4          ='';
            }
            $variable->tecnica         =$request->get('tecnica');
            $variable->especial        =$request->get('especial');
            $variable->int_area1       =$request->get('int_area1');
            $variable->int_objetivo1   =$request->get('int_objetivo1');
            if ($request->get('int_area2')) {
                $variable->int_area2          =$request->get('int_area2');
            }else {
                $variable->int_area2          ='';
            }if ($request->get('int_objetivo2')) {
                $variable->int_objetivo2          =$request->get('int_objetivo2');
            }else {
                $variable->int_objetivo2          ='';
            }if ($request->get('int_area3')) {
                $variable->int_area3          =$request->get('int_area3');
            }else {
                $variable->int_area3          ='';
            }if ($request->get('int_objetivo3')) {
                $variable->int_objetivo3          =$request->get('int_objetivo3');
            }else {
                $variable->int_objetivo3          ='';
            }
            $variable->ext_area1       =$request->get('ext_area1');
            $variable->ext_objetivo1   =$request->get('ext_objetivo1');
            if ($request->get('ext_area2')) {
                $variable->ext_area2          =$request->get('ext_area2');
            }else {
                $variable->ext_area2          ='';
            }
            if ($request->get('ext_objetivo2')) {
                $variable->ext_objetivo2          =$request->get('ext_objetivo2');
            }else {
                $variable->ext_objetivo2          ='';
            }
            if ($request->get('ext_area3')) {
                $variable->ext_area3          =$request->get('ext_area3');
            }else {
                $variable->ext_area3          ='';
            }
            if ($request->get('ext_objetivo3')) {
                $variable->ext_objetivo3          =$request->get('ext_objetivo3');
            }else {
                $variable->ext_objetivo3          ='';
            }
            $variable->actividades     =$request->get('actividades');
         
            $variable->update();


            DB::commit();
            alert()->success('Se ha Editado correctamente.', 'Editado!')->persistent('Cerrar');
        
        } catch (Exception $e) {
            DB::rollback();
            alert()->error('Se ha Presentador un error.', 'Error!')->persistent('Cerrar');
            
        }

        return Redirect::to('competencia')->with('status','Se actualizó correctamente');
    }


    public function destroy($id)
    {
        try {
            DB::beginTransaction();

            $variable                   = Competencia::findOrfail($id);
            $variable->bool_estado      = '0';
            $variable->update();
          


            DB::commit();
            alert()->success('Se ha eliminado correctamente.', 'Eliminado!')->persistent('Cerrar');
        
        } catch (Exception $e) {
            DB::rollback();
            alert()->error('Se ha Presentador un error.', 'Error!')->persistent('Cerrar');
            
        }
        return Redirect::to('competencia/')->with('status','Se elimiinó correctamente');
     
    
    }



}
