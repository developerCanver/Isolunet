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
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

use App\Models\Parametrizacion\Empresa;
use App\Models\Parametrizacion\Producto;

use App\Http\Requests\ProductoRequest;

class ProductoController extends Controller
{
 	// Validacion de logueo
 	public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
    	if($request){

            $empresa    = DB::table('tbl_empresa as e')
                        ->join('users as u','e.fk_usuario','=','u.id')
                        ->where('u.id','=',''.Auth::User()->id.'')
                        ->where('e.bool_estado','=','1')
                        ->first();

            $producto = DB::table('tbl_producto as p')
                        ->join('tbl_empresa as e','p.fk_empresa','=','e.id_empresa')
                        ->where('p.bool_estado','=','1')
                        ->where('e.bool_estado','=','1')
                        ->paginate(15);
                        
    		return view('pages.parametrizacion.producto',['empresa'=>$empresa,'producto'=>$producto]);
    	}
    }

    public function store(Request $request)
    {
    	try {
            DB::beginTransaction();
            
            $producto 				= new Producto();
            $producto->str_producto = $request->get('producto');          
            
            if ($request->hasFile('str_imagen'))
            {
                $file=  $request->file('str_imagen');
                $file->move(public_path().'/img/',$file->getClientOriginalName());
                $producto->str_imagen =$file->getClientOriginalName();
            }
            $producto->fk_empresa	= $request->get('fk_empresa');
            $producto->bool_estado	= 1;
            $producto->save();            

           DB::commit();
           return Redirect::to('parm_producto')->with('status','Se guardó correctamente');
        } catch (Exception $e) {
            DB::rollback();
        }
    }

    public function edit($id)
    {
        $producto    = Producto::findorFail($id);

    	return view('pages.parametrizacion.Edit.edit_producto',['producto'=>$producto]);
    }

    public function update(Request $request,$id)
    {
    	try {
            DB::beginTransaction();
            
            $producto 					= Producto::findOrfail($id);
            $producto->str_producto		= $request->get('producto');            
            
            if ($request->hasFile('image'))
            {
                $file= $request->file('str_imagen');
                $file->move(public_path().'/img/',$file->getClientOriginalName());
                $producto->str_imagen =$file->getClientOriginalName();
            }
            $producto->update();

           DB::commit();
           return Redirect::to('parm_producto')->with('status','Se actualizó correctamente');
        } catch (Exception $e) {
            DB::rollback();
        }
    }

    public function destroy($id)
    {
    	try {
            DB::beginTransaction();
            
            $producto 					= Producto::findOrfail($id);
            $producto->bool_estado		= 0;
            $producto->update();

           DB::commit();
           return Redirect::to('parm_producto')->with('status','Se eliminó correctamente');
        } catch (Exception $e) {
            DB::rollback();
        }
    }
}
