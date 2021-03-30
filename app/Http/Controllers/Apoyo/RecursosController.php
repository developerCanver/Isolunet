<?php

namespace App\Http\Controllers\Apoyo;

use App\Http\Controllers\Controller;
use App\Models\Apoyo\Recursos;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
use Redirect;
use Illuminate\Support\Facades\Auth;


class RecursosController extends Controller
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
                        

            return view('pages.apoyo.recursos.create',[
                        'empresa'=>$empresa,
                        ]);

    }
    public function ver_img()
    {
        $class='RecursosController';
    		$imagenes = DB::table('tbl_empresa as e')
                        ->join('users as u','e.fk_usuario','=','u.id')
                        ->join('tbl_apo_recursos as r','r.fk_empresa','=','e.id_empresa')
                        ->where('u.id','=',''.Auth::User()->id.'')
                        ->where('e.bool_estado','=','1')
                        ->where('class',$class)
                        ->paginate(20);
                        
      
            return view('pages.apoyo.recursos.index',[
                        'imagenes'=>$imagenes,
                        ]);

    }

    

    public function store(Request $request)
    {
       $request->validate([
        'file' => 'required|max:2024',
       ]);

       $class='RecursosController';

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
           
        if (file_exists($mi_imagen)) {
            unlink(public_path().'/archivos/recursos/'.$variable -> url);
        
        }
        $variable -> delete();

        return Redirect::to('recursosverimg')->with('status','Se elimiinó correctamente');

    
    }
}
