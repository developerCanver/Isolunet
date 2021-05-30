<?php

namespace App\Http\Controllers\Planeacion;

use App\Http\Controllers\Controller;
use App\Models\Planeacion\Liberacion;
use App\Models\User;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
use Redirect;
use Illuminate\Support\Facades\Auth;


class LiberacionController extends Controller
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
                        ->join('tbl_plane_liberacion as r','r.fk_empresa','=','e.id_empresa')
                        ->join('users as u','u.id','=','r.fk_cliente')
                        ->join('tbl_producto as p','p.id_producto','=','r.fk_producto')
                        ->where('e.id_empresa',  $id_empresa)
                        ->where('r.bool_estado','=','1')
                        ->where('e.bool_estado','=','1')
                        ->paginate(20);
                        //dd($consultas);

        $Productos = DB::table('tbl_empresa as e')
                        ->join('tbl_producto as p','p.fk_empresa','=','e.id_empresa')
                        ->where('e.id_empresa',  $id_empresa)
                        ->where('e.bool_estado','=','1')
                        ->where('p.bool_estado','=','1')
                        ->get();

        $usuarios = DB::table('users as u')
                        ->join('tbl_empresa as e','u.fk_empresa','=','e.id_empresa')
                        ->where('e.id_empresa',  $id_empresa)
                        ->where('e.bool_estado','=','1')
                        ->where('fk_rol',3)
                        ->get();
    
                    
        return view('pages.planeacion.liberacion.index',[
                                'empresa'=>$empresa,
                                'consultas'=>$consultas,
                                'Productos'=>$Productos,
                                'usuarios'=>$usuarios,
                              
                                    ]);
    	    
    }


    public function store(Request $request)
    {
    try {
                DB::beginTransaction();

                $variable 				  = new Liberacion();
                $variable->lote               = ($request->get('lote')) ?           $request->get('lote') : '';	
                $variable->fecha_realizacion  = ($request->get('fecha_realizacion')) ? $request->get('fecha_realizacion') : '';	
                $variable->verificacion       = ($request->get('verificacion')) ?    $request->get('verificacion') : '';	
                $variable->libero             = ($request->get('libero')) ?        $request->get('libero') : '';	
                $variable->exigido            = ($request->get('exigido')) ?       $request->get('exigido') : '';	
                $variable->obtenido           = ($request->get('obtenido')) ?      $request->get('obtenido') : '';	
                $variable->indicacion         = ($request->get('indicacion')) ?    $request->get('indicacion') : '';	
                $variable->equipo             = ($request->get('equipo')) ?       $request->get('equipo') : '';	
                $variable->condicion          = ($request->get('condicion')) ?    $request->get('condicion') : '';			
                $variable->fk_producto        =  $request->get('fk_producto');	
                $variable->fk_cliente         =  $request->get('fk_cliente');
       
                $variable->fk_empresa       =  $request->get('fk_empresa');
                $variable->bool_estado        = '1';
            
                if ($request->file('evidencia')) {
                    $file =$request->file('evidencia');
                    $name = time().$file->getClientOriginalName();
                    $file->move(public_path().'/archivos/liberacion/', $name);
                } else {
                    $name='';
                }
                $variable->evidencia =  $name;
                
            

                $variable->save();    

                DB::commit();
                return Redirect::to('liberacion')->with('status','Se guardó correctamente');
            } catch (Exception $e) {
                DB::rollback();
        }

    }


    public function edit($id)
    {

        $consulta                    = Liberacion::findOrfail($id);

        $usuario 					= User::findOrfail(Auth::User()->id);
        $rolUsuario=$usuario->fk_rol;
        $id_empresa=$usuario->fk_empresa;
        $empresa = DB::table('users as u')
                                ->join('tbl_empresa as e','e.id_empresa','=','u.fk_empresa')
                                ->where('u.id','=',Auth::User()->id)
                                ->where('e.bool_estado','=','1')
                                ->first();

        $Productos = DB::table('tbl_empresa as e')
                        ->join('tbl_producto as p','p.fk_empresa','=','e.id_empresa')
                        ->where('e.id_empresa',  $id_empresa)
                        ->where('e.bool_estado','=','1')
                        ->where('p.bool_estado','=','1')
                        ->get();

        $usuarios = DB::table('users as u')
                        ->join('tbl_empresa as e','u.fk_empresa','=','e.id_empresa')
                        ->where('e.id_empresa',  $id_empresa)
                        ->where('e.bool_estado','=','1')
                        ->where('fk_rol',3)
                        ->get();
                 
        return view('pages.planeacion.liberacion.edit',[
            'empresa'=>$empresa,
            'consulta'=>$consulta,
            'usuarios'=>$usuarios,
            'Productos'=>$Productos,
            ]);
    }



    public function update(Request $request, $id)
    {
        try {
            DB::beginTransaction();

     
                $variable                     = Liberacion::findOrfail($id);
                $variable->lote               = ($request->get('lote')) ?           $request->get('lote') : '';	
                $variable->fecha_realizacion  = ($request->get('fecha_realizacion')) ? $request->get('fecha_realizacion') : '';	
                $variable->verificacion       = ($request->get('verificacion')) ?    $request->get('verificacion') : '';	
                $variable->libero             = ($request->get('libero')) ?        $request->get('libero') : '';	
                $variable->exigido            = ($request->get('exigido')) ?       $request->get('exigido') : '';	
                $variable->obtenido           = ($request->get('obtenido')) ?      $request->get('obtenido') : '';	
                $variable->indicacion         = ($request->get('indicacion')) ?    $request->get('indicacion') : '';	
                $variable->equipo             = ($request->get('equipo')) ?       $request->get('equipo') : '';	
                $variable->condicion          = ($request->get('condicion')) ?    $request->get('condicion') : '';			
                $variable->fk_producto        =  $request->get('fk_producto');	
                $variable->fk_cliente         =  $request->get('fk_cliente');

        
                if ($request->file('evidencia')) {
                    $archivo=$request->get('evidencia_anterior');
                    //nombre para eliinar el anterior archivo
               
                        $mi_archivo= public_path().'/archivos/liberacion/'.$archivo;
            
                        if (is_file($mi_archivo)) {
                            //consulto si esta ena carpeta y borro
                            unlink(public_path().'/archivos/liberacion/'.$archivo);
                        }
                    

                    $file =$request->file('evidencia');
                    $name = time().$file->getClientOriginalName();
                    $file->move(public_path().'/archivos/liberacion/', $name);
                    $variable->evidencia =  $name;
               
                }
              
         
               
                 $variable->update();


            DB::commit();
            alert()->success('Se ha Editado correctamente.', 'Editado!')->persistent('Cerrar');
        
        } catch (Exception $e) {
            DB::rollback();
            alert()->error('Se ha Presentador un error.', 'Error!')->persistent('Cerrar');
            
        }
        return Redirect::to('liberacion')->with('status','Se actualizó correctamente');
    }


    public function destroy($id)
    {
            try {
            DB::beginTransaction();
          
            $variable 					= Liberacion::findOrfail($id);
            $mi_imagen = public_path().'/archivos/liberacion/'.$variable -> evidencia;
               
            if (is_file($mi_imagen)) {
                unlink(public_path().'/archivos/liberacion/'.$variable -> evidencia);
            
            }
            $variable -> delete();


           DB::commit();
           return Redirect::to('liberacion')->with('status','Se eliminó correctamente');
        } catch (Exception $e) {
            DB::rollback();
        }
    }

    
}
