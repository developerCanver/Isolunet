<?php

namespace App\Http\Controllers\Evaluacion;

use App\Http\Controllers\Controller;
use App\Models\Evaluacion\Revision;
use App\Models\Evaluacion\RevisionUser;
use App\Models\User;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
use Redirect;
use Illuminate\Support\Facades\Auth;

class RevisionController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {

     
        $usuario = User::findOrfail(Auth::User()->id);
        $id_empresa=$usuario->fk_empresa;
        

        $empresa = DB::table('users as u')
                        ->join('tbl_empresa as e','e.id_empresa','=','u.fk_empresa')
                        ->where('u.id','=',Auth::User()->id)
                        ->where('e.bool_estado','=','1')
                        ->first();
     

        $consultas =  DB::table('tbl_empresa as e')
                        ->join('tbl_eva_revision as r','r.fk_empresa','=','e.id_empresa')
                        ->where('e.id_empresa',  $id_empresa)
                        ->where('r.bool_estado','=','1')
                        ->where('e.bool_estado','=','1')
                        ->paginate(20);

                     

        return view('pages.evaluacion.revision.index',[
                                'empresa'=>$empresa,
                                'consultas'=>$consultas,                              
                                    ]);
    	    
    }


    public function store(Request $request)
    {
    try {
                DB::beginTransaction();

                $variable 				  = new Revision();
  
                $variable->fecha_revision   = ($request->get('fecha_revision')) ?    $request->get('fecha_revision') : '';
                $variable->periodo          = ($request->get('periodo')) ?           $request->get('periodo') : '';
                $variable->entrada_salida   = ($request->get('entrada_salida')) ?    $request->get('entrada_salida') : '';
       
                $variable->fk_empresa       =  $request->get('fk_empresa');
                $variable->bool_estado        = '1';
                $variable->save();    
		
                $represeta  = $request->get('represeta');
                $fk_user     = $request->get('fk_user');
                $fk_cargor     = $request->get('fk_cargor');
               

                for ($i=0; $i <  count($fk_user) ; $i++) {

                    $tiporequisito = new RevisionUser();
                    $tiporequisito->fk_user    =    $fk_user[$i];
                    $tiporequisito->represeta  =    $represeta[$i];
                    $tiporequisito->fk_cargor  =    $fk_cargor[$i];

                    $tiporequisito->fk_revision      = $variable->id_revision;
                    $tiporequisito->bool_estado    = '1';
                    $tiporequisito->save();
                }

                DB::commit();
                return Redirect::to('revision')->with('status','Se guardó correctamente');
            } catch (Exception $e) {
                DB::rollback();
        }

    }

    public function edit($id)
    {

        $consulta   = Revision::findOrfail($id);

        $empresa = DB::table('users as u')
                    ->join('tbl_empresa as e','e.id_empresa','=','u.fk_empresa')
                    ->where('u.id','=',Auth::User()->id)
                    ->where('e.bool_estado','=','1')
                    ->first();
                    //dd($cheSisGestiones);

        return view('pages.evaluacion.revision.edit',[
            'empresa'=>$empresa,
            'consulta'=>$consulta,
            ]);
    }

    public function update(Request $request, $id)
    {
        try {
            DB::beginTransaction();

                $variable                     = Revision::findOrfail($id);
                $variable->fecha_revision   = ($request->get('fecha_revision')) ?    $request->get('fecha_revision') : '';
                $variable->periodo          = ($request->get('periodo')) ?           $request->get('periodo') : '';
                $variable->entrada_salida   = ($request->get('entrada_salida')) ?    $request->get('entrada_salida') : '';

                 $variable->update();

                 RevisionUser::where('fk_revision', $id)->delete();

                 $represeta  = $request->get('represeta');
                 $fk_user     = $request->get('fk_user');
                 $fk_cargor     = $request->get('fk_cargor');

                 for ($i=0; $i <  count($fk_user) ; $i++) {
 
                     $tiporequisito = new RevisionUser();
                     $tiporequisito->fk_user    =    $fk_user[$i];
                     $tiporequisito->represeta  =    $represeta[$i];
                     $tiporequisito->fk_cargor  =    $fk_cargor[$i];
 
                     $tiporequisito->fk_revision      = $variable->id_revision;
                     $tiporequisito->bool_estado    = '1';
                     $tiporequisito->save();
                 }


            DB::commit();
            alert()->success('Se ha Editado correctamente.', 'Editado!')->persistent('Cerrar');
        
        } catch (Exception $e) {
            DB::rollback();
            alert()->error('Se ha Presentador un error.', 'Error!')->persistent('Cerrar');
            
        }
        return Redirect::to('revision')->with('status','Se actualizó correctamente');
    }


    public function destroy($id)
    {
            try {
            DB::beginTransaction();
          
            $ocultar 					= Revision::findOrfail($id);
            $ocultar->bool_estado		= 0;
            $ocultar->update();

           DB::commit();
           return Redirect::to('revision')->with('status','Se eliminó correctamente');
        } catch (Exception $e) {
            DB::rollback();
        }
    }
    public function destroy_user($id,$consulta)
    {
            try {
            DB::beginTransaction();
          
    
            $variable = RevisionUser::findOrfail($id);
            $variable -> delete();

           DB::commit();
           return Redirect::to('revision/'.$consulta.'/edit')->with('status','Se eliminó correctamente');
        } catch (Exception $e) {
            DB::rollback();
        }
    }
    
}
