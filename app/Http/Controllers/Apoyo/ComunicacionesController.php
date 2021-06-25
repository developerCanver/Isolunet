<?php

namespace App\Http\Controllers\Apoyo;

use App\Http\Controllers\Controller;
use App\Models\Apoyo\Comunicaciones;
use App\Models\Apoyo\ComunicacionesRendiciones;
use App\Models\User;
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
    $usuario 					= User::findOrfail(Auth::User()->id);
    $rolUsuario=$usuario->fk_rol;
    $id_empresa=$usuario->fk_empresa;

    $empresa = DB::table('users as u')
                    ->join('tbl_empresa as e','e.id_empresa','=','u.fk_empresa')
                    ->where('u.id','=',Auth::User()->id)
                    ->where('e.bool_estado','=','1')
                    ->first();

     $comunicaciones    = DB::table('tbl_empresa as e')
                        ->join('tbl_apo_comunicaciones as c','c.fk_empresa','=','e.id_empresa')
                       ->where('e.id_empresa',  $id_empresa)
                        ->where('c.bool_estado',  '=','1')
                        ->where('e.bool_estado',  '=','1')
                        ->paginate(20);
                        //dd($comunicaciones);
                        
    if ($empresa==null) {
        Auth::logout();
        return Redirect::to('login')->with('status','Se guardó correctamente');
    }
   
    return view('pages.apoyo.comunicaciones.index',[
                    'empresa'  => $empresa,
                    'comunicaciones'  => $comunicaciones,
                    ]);
    }

    public function index_rendicion()
{
    $usuario 					= User::findOrfail(Auth::User()->id);
    $rolUsuario=$usuario->fk_rol;
    $id_empresa=$usuario->fk_empresa;

    $empresa = DB::table('users as u')
                    ->join('tbl_empresa as e','e.id_empresa','=','u.fk_empresa')
                    ->where('u.id','=',Auth::User()->id)
                    ->where('e.bool_estado','=','1')
                    ->first();

     $rendiciones    = DB::table('tbl_empresa as e')
                        ->join('tbl_apo_com_rendiciones as c','c.fk_empresa','=','e.id_empresa')
                         ->where('e.id_empresa',  $id_empresa)
                        ->where('c.bool_estado',  '=','1')
                        ->where('e.bool_estado',  '=','1')
                        ->paginate(20);
                        //dd($comunicaciones);
    $cargos      = DB::table('tbl_empresa as e')
                        ->join('tbl_areas as a','a.fk_empresa','=','e.id_empresa')
                        ->join('tbl_cargos as c','c.fk_area','=','a.id_area')
                        ->where('e.id_empresa',  $id_empresa)
                        ->where('a.bool_estado',  '=','1')
                        ->where('c.bool_estado',  '=','1')->get();

   
    return view('pages.apoyo.comunicaciones.rendiciones.index',[
                    'empresa'  => $empresa,
                    'rendiciones'  => $rendiciones,
                    'cargos'  => $cargos,
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

public function store_rendicion(Request $request)
{
    try {
        DB::beginTransaction();
        $variable                    = new ComunicacionesRendiciones();
       
        $variable->Quien          = $request->get('Quien');
        $variable->mecanismo      = $request->get('mecanismo');
        $variable->frecuencia     = $request->get('frecuencia');
        $variable->a_quien        = $request->get('a_quien');
        $variable->registro       = $request->get('registro');
        $variable->sistema        = $request->get('sistema');
        $variable->fk_empresa     = $request->get('fk_empresa');
        $variable->bool_estado    = '1';
  
        $variable->save();
     

        DB::commit();
        alert()->success('Se ha creado correctamente.', 'Creado!')->persistent('Cerrar');
    
    } catch (Exception $e) {
        DB::rollback();
        alert()->error('Se ha Presentador un error.', 'Error!')->persistent('Cerrar');
        
    }

    return Redirect::to('competencia_rendicion/')->with('status','Se guardó correctamente');
}

// Quien	mecanismo	frecuencia	a_quien	registro	sistema	bool_estado	fk_empresa	

public function edit($id)
{
    $comunicacion = Comunicaciones::findOrfail($id);

    return view('pages.apoyo.comunicaciones.edit',[
        'comunicacion'=>$comunicacion,
     
        ]);
}
public function edit_rendicion($id)
{
    $usuario 					= User::findOrfail(Auth::User()->id);
    $rolUsuario=$usuario->fk_rol;
    $id_empresa=$usuario->fk_empresa;
    
    $cargos      = DB::table('tbl_empresa as e')
    ->join('tbl_areas as a','a.fk_empresa','=','e.id_empresa')
    ->join('tbl_cargos as c','c.fk_area','=','a.id_area')
    ->where('e.id_empresa',  $id_empresa)
    ->where('a.bool_estado',  '=','1')
    ->where('c.bool_estado',  '=','1')->get();

    $comunicacion = ComunicacionesRendiciones::findOrfail($id);

    return view('pages.apoyo.comunicaciones.rendiciones.edit',[
        'comunicacion'=>$comunicacion,
        'cargos'=>$cargos,
     
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
// Quien	mecanismo	frecuencia	a_quien	registro	sistema	bool_estado	fk_empresa
public function update_rendicion(Request $request, $id)
{
    try {
        DB::beginTransaction();
      
        $variable                   = ComunicacionesRendiciones::findOrfail($id);
     
        $variable->Quien          = $request->get('Quien');
        $variable->mecanismo       = $request->get('mecanismo');
        $variable->frecuencia         = $request->get('frecuencia');
        $variable->a_quien      = $request->get('a_quien');
        $variable->registro     = $request->get('registro');
        $variable->sistema          = $request->get('sistema');
        $variable->update();


     
        DB::commit();
        alert()->success('Se ha Editado correctamente.', 'Editado!')->persistent('Cerrar');
    
    } catch (Exception $e) {
        DB::rollback();
        alert()->error('Se ha Presentador un error.', 'Error!')->persistent('Cerrar');
        
    }

    return Redirect::to('competencia_rendicion/')->with('status','Se actualizó correctamente');
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

public function destroy_rendicion($id)
{
    try {
        DB::beginTransaction();

        $variable                   = ComunicacionesRendiciones::findOrfail($id);
        $variable->bool_estado      = '0';
        $variable->update();
      
        DB::commit();
        alert()->success('Se ha eliminado correctamente.', 'Eliminado!')->persistent('Cerrar');
    
    } catch (Exception $e) {
        DB::rollback();
        alert()->error('Se ha Presentador un error.', 'Error!')->persistent('Cerrar');
        
    }
    return Redirect::to('competencia_rendicion/')->with('status','Se elimiinó correctamente');
 

}

}
