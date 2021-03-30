<?php

namespace App\Http\Controllers\Apoyo;

use App\Http\Controllers\Controller;
use App\Models\Apoyo\Informacion;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
use Redirect;
use Illuminate\Support\Facades\Auth;


class InformacionController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(Request $request, $tipo_informacion=null)
    {
    
        if ($request->get('tipo_informacion')) {

            $tipo_informacion =$request->get('tipo_informacion');

            $empresa = DB::table('tbl_empresa as e')
                            ->where('e.fk_usuario','=',''.Auth::User()->id.'')
                            ->where('e.bool_estado','=','1')
                            ->first();

            $cargos      = DB::table('tbl_empresa as e')
                            ->join('tbl_areas as a','a.fk_empresa','=','e.id_empresa')
                            ->join('tbl_cargos as c','c.fk_area','=','a.id_area')
                            ->join('users as u','u.id','=','e.fk_usuario')
                            ->where('e.fk_usuario',     '=',''.Auth::User()->id.'')
                            ->where('a.bool_estado',  '=','1')
                            ->where('e.bool_estado',  '=','1')
                            ->where('c.bool_estado',  '=','1')->get();

            $sistema_gestiones = DB::table('tbl_empresa as e')
                            ->join('tbl_sistemas_gestion as sg','sg.fk_empresa','=','e.id_empresa')
                            ->join('users as u','u.id','=','e.fk_usuario')
                            ->where('e.fk_usuario',     '=',''.Auth::User()->id.'')
                            ->where('e.bool_estado',  '=','1')
                            ->where('sg.bool_estado',  '=','1')->get();
                            
            $procesos      = DB::table('tbl_procesos as p')
                            ->join('tbl_empresa as e','p.fk_empresa','=','e.id_empresa')
                            ->join('users as u','u.id','=','e.fk_usuario')
                            ->where('e.fk_usuario',     '=',''.Auth::User()->id.'')
                            ->where('p.bool_estado',  '=','1')
                            ->where('e.bool_estado',  '=','1')
                            ->orderby('id_proceso', 'DESC')->get();

            if ($tipo_informacion=='Documentos') {
                $informaciones =  DB::table('tbl_empresa as e')
                ->join('tbl_apo_informacion as i','i.fk_empresa','=','e.id_empresa')
                ->where('e.fk_usuario','=',''.Auth::User()->id.'')
                ->where('e.bool_estado','=','1')
                ->where('i.bool_estado','=','1')
                ->where('tipo_informacion','=','Documentos')
                ->paginate(20);
                
            }
            if ($tipo_informacion=='Documentos_externos') {
                $informaciones =  DB::table('tbl_empresa as e')
                ->join('tbl_apo_informacion as i','i.fk_empresa','=','e.id_empresa')
                ->where('e.fk_usuario','=',''.Auth::User()->id.'')
                ->where('e.bool_estado','=','1')
                ->where('i.bool_estado','=','1')
                ->where('tipo_informacion','=','Documentos_externos')
                ->paginate(20);
            }
            if ($tipo_informacion=='Registros') {
                $informaciones =  DB::table('tbl_empresa as e')
                ->join('tbl_apo_informacion as i','i.fk_empresa','=','e.id_empresa')
                ->where('e.fk_usuario','=',''.Auth::User()->id.'')
                ->where('e.bool_estado','=','1')
                ->where('i.bool_estado','=','1')
                ->where('tipo_informacion','=','Registros')
                ->paginate(20);
            }

       // dd($informaciones);
              
                    return view('pages.apoyo.informacion.documentos.index',[
                        'tipo_informacion'=>$tipo_informacion,
                        'cargos'=>$cargos,
                        'empresa'=>$empresa,
                        'procesos'=>$procesos,
                        'sistema_gestiones'=>$sistema_gestiones,
                        'informaciones'=>$informaciones,
                        ]);       
            }

            return view('pages.apoyo.informacion.index');
         

    }


    

    public function store(Request $request)
    {
       $request->validate([
        'file' => 'max:2024',
       ]);


            //Doci¿umento
            $tipo_informacion            = $request->get('tipo_informacion');

            $name="Archivo no cargado";
            if ($request->file('archivo')) {
                $file =$request->file('archivo');   
            $name = time().$file->getClientOriginalName();
            $file->move(public_path().'/ifo/', $name);
            }
          

            Informacion::create([
                'codigo' => $request->get('codigo'),	
                'conservasion' => $request->get('conservasion'),	
                'tipo_informacion' => $request->get('tipo_informacion'),	
                'proceso' => $request->get('proceso'),	
                'tit_documento' => $request->get('tit_documento'),	
                'tit_registro' => $request->get('tit_registro'),	
                'version' => $request->get('version'),	
                'descripcion' => $request->get('descripcion'),	
                'responsable' => $request->get('responsable'),	
                'lugar_archivo' => $request->get('lugar_archivo'),	
                'digital' => $request->get('digital'),	
                'tie_retencion' => $request->get('tie_retencion'),	
                'dis_final' => $request->get('dis_final'),	
                'organiza' => $request->get('organiza'),	
                'archivo' => $name,	
                'fecha_info' => $request->get('fecha_info'),	
                'vigente' => $request->get('vigente'),	
                'contralado' => $request->get('contralado'),	
                'sis_gestion' => $request->get('sis_gestion'),	
                'no_copia' => $request->get('no_copia'),	
                'bool_estado' => '1',
                'fk_empresa' => $request->get('fk_empresa'),
            ]);
    
            return Redirect::to('informacion?tipo_informacion='.$tipo_informacion)->with('status','Se Guardo correctamente');
      

    }

    
    public function destroy_info($id, $tipo_informacion)
    {
        $variable                   = Informacion::findOrfail($id);
        $nombre=$variable->archivo;
       
            $mi_imagen = public_path().'/ifo/'.$variable -> archivo;
           
            if (file_exists($mi_imagen)) {
                unlink(public_path().'/ifo/'.$variable -> archivo);
            
            }


        $variable -> delete();

        return Redirect::to('informacion?tipo_informacion='.$tipo_informacion)->with('status','Se elimiinó correctamente');

 
    }

    public function info_editar($id, $tipo_informacion)
    {
 
        $informacion = Informacion::findOrfail($id);
        
        
        $cargos      = DB::table('tbl_empresa as e')
                    ->join('tbl_areas as a','a.fk_empresa','=','e.id_empresa')
                    ->join('tbl_cargos as c','c.fk_area','=','a.id_area')
                    ->join('users as u','u.id','=','e.fk_usuario')
                    ->where('e.fk_usuario',     '=',''.Auth::User()->id.'')
                    ->where('a.bool_estado',  '=','1')
                    ->where('e.bool_estado',  '=','1')
                    ->where('c.bool_estado',  '=','1')->get();

        $sistema_gestiones = DB::table('tbl_empresa as e')
                ->join('tbl_sistemas_gestion as sg','sg.fk_empresa','=','e.id_empresa')
                ->join('users as u','u.id','=','e.fk_usuario')
                ->where('e.fk_usuario',     '=',''.Auth::User()->id.'')
                ->where('e.bool_estado',  '=','1')
                ->where('sg.bool_estado',  '=','1')->get();
                
        $procesos      = DB::table('tbl_procesos as p')
                ->join('tbl_empresa as e','p.fk_empresa','=','e.id_empresa')
                ->join('users as u','u.id','=','e.fk_usuario')
                ->where('e.fk_usuario',     '=',''.Auth::User()->id.'')
                ->where('p.bool_estado',  '=','1')
                ->where('e.bool_estado',  '=','1')
                ->orderby('id_proceso', 'DESC')->get();

      
        return view('pages.apoyo.informacion.documentos.edit',[
            'informacion' => $informacion,
            'cargos' => $cargos,
            'sistema_gestiones' => $sistema_gestiones,
            'procesos' => $procesos,
            'tipo_informacion' => $tipo_informacion,
        ]);
      
    }//actualizar_info
    public function actualizar_info(Request $request, $id)
    {
        try {
            DB::beginTransaction();
            $variable                   = Informacion::findOrfail($id);
           
            $variable->codigo       =$request->get('codigo');
            $tipo_informacion     =$request->get('tipo_informacion');
            $variable->proceso      =$request->get('proceso');
            $variable->tit_documento    =$request->get('tit_documento');
            $variable->tit_registro     =$request->get('tit_registro');
            $variable->version      =$request->get('version');
            $variable->descripcion      =$request->get('descripcion');
            $variable->responsable      =$request->get('responsable');
            $variable->lugar_archivo    =$request->get('lugar_archivo');
            $variable->digital      =$request->get('digital');
            $variable->tie_retencion    =$request->get('tie_retencion');
            $variable->dis_final    =$request->get('dis_final');
            $variable->organiza     =$request->get('organiza');

            if ($request->file('archivo')) {
                $file =$request->file('archivo');   
            $name = time().$file->getClientOriginalName();
            $file->move(public_path().'/ifo/documentada/', $name);
            $variable->archivo      =$name;
            }

           
            $variable->fecha_info       =$request->get('fecha_info');
            $variable->vigente      =$request->get('vigente');
            $variable->contralado       =$request->get('contralado');
            $variable->sis_gestion      =$request->get('sis_gestion');
            $variable->no_copia     =$request->get('no_copia');

 

            $variable->update();


            DB::commit();
            alert()->success('Se ha Editado correctamente.', 'Editado!')->persistent('Cerrar');
        
        } catch (Exception $e) {
            DB::rollback();
            alert()->error('Se ha Presentador un error.', 'Error!')->persistent('Cerrar');
            
        }

        return Redirect::to('informacion?tipo_informacion='.$tipo_informacion)->with('status','Se actualizó correctamente');
    }


}
