<?php

namespace App\Http\Controllers\Parametrizacion;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use DB;
use Redirect;
use Alert;
use View;
use Validator;

use Carbon\Carbon;
use Response;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

use App\Models\User;
use App\Models\Parametrizacion\Empresa;
use App\Models\Parametrizacion\Documentos;

use Entrust;
class DocumentosController extends Controller
{
     // Validacion de logueo
 	public function __construct()
    {
        $this->middleware('auth');
    }

    public function index_documento(Request $request)
    {
    	if ($request) {

            $empresa    = DB::table('tbl_empresa')
                        ->where('fk_usuario','=',''.Auth::User()->id.'')
                        ->where('bool_estado','=','1')
                        ->first();

            $documento = DB::table('tbl_documentos as d')
                        ->join('tbl_empresa as e','d.fk_empresa','=','e.id_empresa')
                        ->where('e.id_empresa','=',''.Auth::User()->fk_empresa.'')
                        ->where('d.bool_estado','=','1')
                        ->get();

            return view('pages.parametrizacion.documento',['documento'=>$documento, 'empresa'=>$empresa]);                       
    	}
    }

    public function store_documento(Request $request)
    {
        try
        {
            DB::beginTransaction();

            $variable                   = new Documentos();
            $variable->nombre_documento = $request->get('nom_documento');
            $variable->sigla_documento  = $request->get('sigla_documento');
            $variable->fk_empresa       = $request->get('cod_empresa');
            $variable->bool_estado      = '1';
            $variable->save();

            DB::commit();
            alert()->success('Se ha creado correctamente.', 'Creado!')->persistent('Cerrar');
            return Redirect::to('parm_documento_index')->with('status','Se guardó correctamente');
        } 
        catch (Exception $e) 
        {
            DB::rollback();
            alert()->error('Ha ocurrido un error al tratar de guardar', 'Error!')->persistent('Cerrar');

        }

        return Redirect::to('parm_documento_index');
    }

    public function edit_documento(Request $request, $id)
    {
        $documento = Documentos::findOrfail($id);

        $empresa = DB::table('tbl_empresa as e')
                    ->join('users as u','e.fk_usuario','=','u.id')
                    ->where('u.id','=',''.Auth::User()->id.'')
                    ->where('e.bool_estado','=','1')
                    ->first();
                    
        return view('pages.parametrizacion.Edit.edit_documento',['documento'=>$documento, 'empresa'=>$empresa]);
    }

    public function update_documento(Request $request,$id)
    {
       try {
            DB::beginTransaction();

            $variable                   = Documentos::findOrfail($id);
            $variable->nombre_documento = $request->get('nombre_documento');
            $variable->sigla_documento  = $request->get('sigla');
            $variable->bool_estado      = '1';
            $variable->update();


            DB::commit();
            alert()->success('Se ha editado correctamente.', 'Editado!')->persistent('Cerrar');
        
        } catch (Exception $e) {
            DB::rollback();
            alert()->error('Ha ocurrido un error tratando de Editar.', 'Error!')->persistent('Cerrar');
            
        }

        return Redirect::to('parm_documento_index')->with('status','Se actualizó correctamente');
    }

    public function destroy_documento(Request $request,$id)
    {
        try {
            DB::beginTransaction();

            $variable                   = Documentos::findOrfail($id);
            $variable->bool_estado      = '0';
            $variable->update();

            DB::commit();
            alert()->success('Se ha eliminado correctamente.', 'Eliminado!')->persistent('Cerrar');
        
        } catch (Exception $e) {
            DB::rollback();
            alert()->error('Se ha Presentador un error.', 'Error!')->persistent('Cerrar');            
        }

        return Redirect::to('parm_documento_index')->with('status','Se eliminó correctamente');
    }
}
