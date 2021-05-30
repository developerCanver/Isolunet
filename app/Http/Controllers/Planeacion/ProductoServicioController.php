<?php

namespace App\Http\Controllers\Planeacion;

use App\Http\Controllers\Controller;
use App\Models\Parametrizacion\Insumo;
use App\Models\Planeacion\ProductoServicio;
use App\Models\User;
use Illuminate\Http\Request;


use Illuminate\Support\Facades\DB;
use Redirect;
use Illuminate\Support\Facades\Auth;

class ProductoServicioController extends Controller
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
        
        $proveedores = DB::table('tbl_proveedor as p')
                    ->join('tbl_empresa as e','e.id_empresa','=','p.fk_empresa')
                    ->where('e.bool_estado','=','1')
                    ->where('e.id_empresa',  $id_empresa)
                    ->where('p.bool_estado','=','1')
                    ->get();
    
        $consultas = DB::table('tbl_empresa as e')
                    ->join('tbl_proveedor as a','a.fk_empresa','=','e.id_empresa')
                    ->join('tbl_insumos as i','i.fk_proveedor','=','a.id_proveedor')
                    ->join('tbl_plane_producto_servicio as ps','ps.fk_insumo','=','i.id_insumo')
                    ->where('e.id_empresa',  $id_empresa)
                    ->where('a.bool_estado','=','1')
                    ->where('i.bool_estado','=','1')
                    ->where('ps.bool_estado','=','1')
                    ->orderBy('razon_social')
                    ->orderBy('nom_proveedor')
                    ->orderBy('nom_insumo')
                    ->paginate(20);  
                    //dd($consultas);                 

        return view('pages.planeacion.productoservicio.index',[
                                'consultas'=>$consultas,
                                'proveedores'=>$proveedores,
                                    ]);    	
        
    }


    public function store(Request $request)
    {

    try {
        DB::beginTransaction();


        $variable 				   = new ProductoServicio();
        $variable->calidad_n1  = ($request->get('calidad_n1')) ?  $request->get('calidad_n1') : '';
        $variable->calidad_n2  = ($request->get('calidad_n2')) ?  $request->get('calidad_n2') : '';
        $variable->ambiental_n1  = ($request->get('ambiental_n1')) ?  $request->get('ambiental_n1') : '';
        $variable->ambiental_n2  = ($request->get('ambiental_n2')) ?  $request->get('ambiental_n2') : '';
        $variable->sst_n1  = ($request->get('sst_n1')) ?  $request->get('sst_n1') : '';
        $variable->sst_n2  = ($request->get('sst_n2')) ?  $request->get('sst_n2') : '';
        $variable->inocuidad_n1  = ($request->get('inocuidad_n1')) ?  $request->get('inocuidad_n1') : '';
        $variable->inocuidad_n2  = ($request->get('inocuidad_n2')) ?  $request->get('inocuidad_n2') : '';
        $variable->basic_n1  = ($request->get('basic_n1')) ?  $request->get('basic_n1') : '';
        $variable->basic_n2  = ($request->get('basic_n2')) ?  $request->get('basic_n2') : '';
        $variable->compra  = ($request->get('compra')) ?  $request->get('compra') : '';
        $variable->transporte  = ($request->get('transporte')) ?  $request->get('transporte') : '';
        $variable->recibo  = ($request->get('recibo')) ?  $request->get('recibo') : '';
        $variable->almacenamiento  = ($request->get('almacenamiento')) ?  $request->get('almacenamiento') : '';
        $variable->uso  = ($request->get('uso')) ?  $request->get('uso') : '';
        $variable->final  = ($request->get('final')) ?  $request->get('final') : '';
        $variable->bool_estado  ='1';
        $variable->fk_insumo  =  $request->get('fk_insumo');

        $variable->save();            

       DB::commit();
       return Redirect::to('producto_servicio')->with('status','Se guardó correctamente');
    } catch (Exception $e) {
        DB::rollback();
    }

    }


    public function edit($id)
    {
  

        $insumo = DB::table('tbl_empresa as e')
        ->join('tbl_proveedor as a','a.fk_empresa','=','e.id_empresa')
        ->join('tbl_insumos as i','i.fk_proveedor','=','a.id_proveedor')
        ->join('tbl_plane_producto_servicio as ps','ps.fk_insumo','=','i.id_insumo')
        ->where('id_pro_servicio', $id)->first();
        //dd($insumo);
                    
        return view('pages.planeacion.productoservicio.edit',['insumo'=>$insumo]);
    }

    public function update(Request $request, $id)
    {
        try {
            DB::beginTransaction();

     
            $variable                 = ProductoServicio::findOrfail($id);
            $variable->calidad_n1  = ($request->get('calidad_n1')) ?  $request->get('calidad_n1') : '';
            $variable->calidad_n2  = ($request->get('calidad_n2')) ?  $request->get('calidad_n2') : '';
            $variable->ambiental_n1  = ($request->get('ambiental_n1')) ?  $request->get('ambiental_n1') : '';
            $variable->ambiental_n2  = ($request->get('ambiental_n2')) ?  $request->get('ambiental_n2') : '';
            $variable->sst_n1  = ($request->get('sst_n1')) ?  $request->get('sst_n1') : '';
            $variable->sst_n2  = ($request->get('sst_n2')) ?  $request->get('sst_n2') : '';
            $variable->inocuidad_n1  = ($request->get('inocuidad_n1')) ?  $request->get('inocuidad_n1') : '';
            $variable->inocuidad_n2  = ($request->get('inocuidad_n2')) ?  $request->get('inocuidad_n2') : '';
            $variable->basic_n1  = ($request->get('basic_n1')) ?  $request->get('basic_n1') : '';
            $variable->basic_n2  = ($request->get('basic_n2')) ?  $request->get('basic_n2') : '';
            $variable->compra  = ($request->get('compra')) ?  $request->get('compra') : '';
            $variable->transporte  = ($request->get('transporte')) ?  $request->get('transporte') : '';
            $variable->recibo  = ($request->get('recibo')) ?  $request->get('recibo') : '';
            $variable->almacenamiento  = ($request->get('almacenamiento')) ?  $request->get('almacenamiento') : '';
            $variable->uso  = ($request->get('uso')) ?  $request->get('uso') : '';
            $variable->final  = ($request->get('final')) ?  $request->get('final') : '';
        
           
            $variable->update();


            DB::commit();
            alert()->success('Se ha Editado correctamente.', 'Editado!')->persistent('Cerrar');
        
        } catch (Exception $e) {
            DB::rollback();
            alert()->error('Se ha Presentador un error.', 'Error!')->persistent('Cerrar');
            
        }
        return Redirect::to('producto_servicio')->with('status','Se actualizó correctamente');
    }


    public function destroy($id)
    {
            try {
            DB::beginTransaction();
            
            $ocultar 					= ProductoServicio::findOrfail($id);
            $ocultar->bool_estado		= 0;
            $ocultar->update();


           DB::commit();
           return Redirect::to('producto_servicio')->with('status','Se eliminó correctamente');
        } catch (Exception $e) {
            DB::rollback();
        }
    }
    public function getInsumos(Request $request)
    {        
        if ($request->ajax()) {
            $insumos = Insumo::where('fk_proveedor', $request->id_proveedor)            
                        ->where('bool_estado','=','1')
                        ->get();
            foreach ($insumos as $insumo) {
                $insumosArray[$insumo->id_insumo] = $insumo->nom_insumo;
            }
            return response()->json($insumosArray);
        }
    }
}
