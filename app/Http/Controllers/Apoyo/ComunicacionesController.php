<?php

namespace App\Http\Controllers\Apoyo;

use App\Http\Controllers\Controller;
use App\Models\Apoyo\Comunicaciones;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
use Redirect;
use Illuminate\Support\Facades\Auth;

class ComunicacionesController extends Controller
{

public function __construct()
{
    $this->middleware('auth');
}


public function index()
{
    $empresa      = DB::table('tbl_empresa as e')
                    ->where('e.fk_usuario',     '=',''.Auth::User()->id.'')
                    ->where('e.bool_estado',  '=','1')
                    ->first();

     $comunicaciones    = DB::table('tbl_empresa as e')
                        ->join('tbl_apo_comunicaciones as c','c.fk_empresa','=','e.id_empresa')
                        ->where('e.fk_usuario',     '=',''.Auth::User()->id.'')
                        ->where('c.bool_estado',  '=','1')
                        ->where('e.bool_estado',  '=','1')
                        ->paginate(20);
                        //dd($comunicaciones);

   
    return view('pages.apoyo.comunicaciones.index',[
                    'empresa'  => $empresa,
                    'comunicaciones'  => $comunicaciones,
                    ]);
    }

    public function index_rendiciones()
{
    $empresa      = DB::table('tbl_empresa as e')
                    ->where('e.fk_usuario',     '=',''.Auth::User()->id.'')
                    ->where('e.bool_estado',  '=','1')
                    ->first();

     $comunicaciones    = DB::table('tbl_empresa as e')
                        ->join('tbl_apo_com_rendiciones as c','c.fk_empresa','=','e.id_empresa')
                        ->where('e.fk_usuario',     '=',''.Auth::User()->id.'')
                        ->where('c.bool_estado',  '=','1')
                        ->where('e.bool_estado',  '=','1')
                        ->paginate(20);
                        dd($comunicaciones);

   
    return view('pages.apoyo.comunicaciones.index',[
                    'empresa'  => $empresa,
                    'comunicaciones'  => $comunicaciones,
                    ]);
    }


public function index_procesos()
{
    $procesos      = DB::table('tbl_procesos as p')
                    ->join('tbl_empresa as e','p.fk_empresa','=','e.id_empresa')
                    ->join('users as u','u.id','=','e.fk_usuario')
                    ->where('e.fk_usuario',     '=',''.Auth::User()->id.'')
                    ->where('p.bool_estado',  '=','1')
                    ->where('e.bool_estado',  '=','1')
                    ->orderby('id_proceso', 'DESC')->get();
                    //dd($procesos);

    return view('pages.planificacion.cambio.procesos.index',[
    'procesos'  => $procesos,
    ]);
}


public function store(Request $request)
{
    try {
        //dd($request);
        DB::beginTransaction();
       $fk_proceso = $request->get('fk_proceso');

        $variable                    = new Comunicaciones();
        $variable->parte            = $request->get('parte');
        if ($request->get('sgc')) {
            $variable->sgc           = $request->get('sgc');
        }else{
            $variable->sgc  ='0';
        }
        if ($request->get('sga')) {
            $variable->sga           = $request->get('sga');
        }else{
            $variable->sga  ='0';
        }

        if ($request->get('sgscs')) {
            $variable->sgscs           = $request->get('sgscs');
        }else{
            $variable->sgscs  ='0';
        }

        if ($request->get('sgsst')) {
            $variable->sgsst           = $request->get('sgsst');
        }else{
            $variable->sgsst  ='0';
        }

        $variable->asunto          = $request->get('asunto');
        $variable->mecanismo       = $request->get('mecanismo');
        $variable->detalle         = $request->get('detalle');
        $variable->frecuencia      = $request->get('frecuencia');
        $variable->interesada     = $request->get('interesada');
        $variable->apoyo          = $request->get('apoyo');
        $variable->registros      = $request->get('registros');
        $variable->fk_empresa     = $request->get('fk_empresa');

        $variable->bool_estado           = '1';
  
        $variable->save();

     

        DB::commit();
        alert()->success('Se ha creado correctamente.', 'Creado!')->persistent('Cerrar');
    
    } catch (Exception $e) {
        DB::rollback();
        alert()->error('Se ha Presentador un error.', 'Error!')->persistent('Cerrar');
        
    }

    return Redirect::to('comunicaciones/')->with('status','Se guardó correctamente');
}



public function edit($id)
{
    $comunicacion = Comunicaciones::findOrfail($id);

    return view('pages.apoyo.comunicaciones.edit',[
        'comunicacion'=>$comunicacion,
     
        ]);
}


public function update(Request $request, $id)
{
    try {
        DB::beginTransaction();

        $variable                   = Comunicaciones::findOrfail($id);
        $variable->parte            = $request->get('parte');
        if ($request->get('sgc')) {
            $variable->sgc           = $request->get('sgc');
        }else{
            $variable->sgc  ='0';
        }
        if ($request->get('sga')) {
            $variable->sga           = $request->get('sga');
        }else{
            $variable->sga  ='0';
        }

        if ($request->get('sgscs')) {
            $variable->sgscs           = $request->get('sgscs');
        }else{
            $variable->sgscs  ='0';
        }

        if ($request->get('sgsst')) {
            $variable->sgsst           = $request->get('sgsst');
        }else{
            $variable->sgsst  ='0';
        }

        $variable->asunto          = $request->get('asunto');
        $variable->mecanismo       = $request->get('mecanismo');
        $variable->detalle         = $request->get('detalle');
        $variable->frecuencia      = $request->get('frecuencia');
        $variable->interesada     = $request->get('interesada');
        $variable->apoyo          = $request->get('apoyo');
        $variable->registros      = $request->get('registros');

    
        $variable->update();

        
     
        DB::commit();
        alert()->success('Se ha Editado correctamente.', 'Editado!')->persistent('Cerrar');
    
    } catch (Exception $e) {
        DB::rollback();
        alert()->error('Se ha Presentador un error.', 'Error!')->persistent('Cerrar');
        
    }

    return Redirect::to('comunicaciones/')->with('status','Se actualizó correctamente');
}


public function destroy($id)
{
    try {
        DB::beginTransaction();

        $variable                   = Comunicaciones::findOrfail($id);
        $variable->bool_estado      = '0';
        $variable->update();
      
        DB::commit();
        alert()->success('Se ha eliminado correctamente.', 'Eliminado!')->persistent('Cerrar');
    
    } catch (Exception $e) {
        DB::rollback();
        alert()->error('Se ha Presentador un error.', 'Error!')->persistent('Cerrar');
        
    }
    return Redirect::to('comunicaciones/')->with('status','Se elimiinó correctamente');
 

}

}
