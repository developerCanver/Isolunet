<?php

namespace App\Http\Controllers\Planeacion;

use App\Http\Controllers\Controller;
use App\Models\Apoyo\Recursos;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
use Redirect;
use Illuminate\Support\Facades\Auth;

class PrestamoController extends Controller
{

        public function __construct()
        {
            $this->middleware('auth');
        }
        public function index()
        {
        
                $empresa = DB::table('tbl_empresa as e')
                            ->join('users as u','e.fk_usuario','=','u.id')
                            ->where('u.id','=',''.Auth::User()->id.'')
                            ->where('e.bool_estado','=','1')
                            ->first();
                            
    
                return view('pages.planeacion.prestado.create',[
                            'empresa'=>$empresa,
                            ]);
    
        }
        public function ver_img()
        {
            $class='PrestamoController';
                $imagenes = DB::table('tbl_empresa as e')
                            ->join('users as u','e.fk_usuario','=','u.id')
                            ->join('tbl_apo_recursos as r','r.fk_empresa','=','e.id_empresa')
                            ->where('u.id','=',''.Auth::User()->id.'')
                            ->where('e.bool_estado','=','1')
                            ->where('class',$class)
                            ->paginate(20);
                            
          
                return view('pages.planeacion.prestado.index',[
                            'imagenes'=>$imagenes,
                            ]);
    
        }
    
        
    
        public function store(Request $request)
        {
           $request->validate([
            'file' => 'required|max:2024',
           ]);
    
           $class='PrestamoController';
    
           $empresa = DB::table('tbl_empresa as e')
                            ->join('users as u','e.fk_usuario','=','u.id')
                            ->where('u.id','=',''.Auth::User()->id.'')
                            ->where('e.bool_estado','=','1')
                            ->first();
    
                $file =$request->file('file');
                $name = time().$file->getClientOriginalName();
                $file->move(public_path().'/archivos/recursos/', $name);
    
           Recursos::create([
               'url' => $name,
               'fk_empresa' => $empresa->id_empresa,
               'class' => $class,
           ]);
    
        }
    
      
    
    
        public function destroy($id)
        {
            $variable                   = Recursos::findOrfail($id);
            $mi_imagen = public_path().'/archivos/recursos/'.$variable -> url;
               
            if (is_file($mi_imagen)) {
                unlink(public_path().'/archivos/recursos/'.$variable -> url);
            
            }
            $variable -> delete();
    
            return Redirect::to('servicio_prestado_img')->with('status','Se elimiinó correctamente');
    
        
        }
    }
    