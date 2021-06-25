<?php

namespace App\Http\Livewire\Contexto;

use App\Models\Contexto\AlcanceModel;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Redirect;

class Alcance extends Component
{
    
    public  $id_isGesion=0,$opcion='guardar',$nombre1,$nombre2,$alert=0,$msjAlert='';

    public function render()
    {
        $procesos      = DB::table('tbl_procesos as p')
                            ->where('fk_empresa',   Auth::User()->fk_empresa)
                            ->where('p.bool_estado',  '=','1')
                            ->orderby('id_proceso', 'DESC')->paginate();

        $productos      = DB::table('tbl_producto')
                            ->where('fk_empresa',   Auth::User()->fk_empresa)
                            ->where('bool_estado',  1)
                            ->orderby('id_producto', 'DESC')->paginate();

      $partesInteresadas    = DB::table('tbl_partei_master')
                            ->where('fk_empresa',   Auth::User()->fk_empresa)
                            //->where('bool_estado',  1)
                            ->orderby('id_partei_master', 'DESC')->paginate();
                            //dd($procesos);
        $sisGesiones      = DB::table('tbl_sistemas_gestion')
                            ->where('fk_empresa',   Auth::User()->fk_empresa)
                            //->where('bool_estado',  1)
                            ->orderby('id_sisgestion', 'DESC')->paginate();

        
        return view('livewire.contexto.alcance',
                [
                    'procesos' => $procesos,
                    'productos' => $productos,
                    'partesInteresadas' => $partesInteresadas,
                    'sisGesiones' => $sisGesiones,
                ]);
    }
    public function change(){
        
        if ($this->id_isGesion) {
    
            $alcances      = DB::table('tbl_contexto_alcances')
                        ->where('fk_empresa',   Auth::User()->fk_empresa)
                        ->where('fk_sisgestion',   $this->id_isGesion)
                        ->first();
                        if ($alcances) {
                            
                            $this->nombre1=$alcances->nombre1;
                            $this->nombre2=$alcances->nombre2;
                            $this->opcion='actualizar';
                        } else {
                            $this->nombre1              = '';
                            $this->nombre2              = '';
                           $this->opcion='guardar';
                        }
                        
        }
    }
    public function store()
    {
        $this->validate([
            'nombre1' => 'required|max:200|min:3',
            'nombre2' => 'required|max:200|min:3',
            
         ]);

            $guardar  = new AlcanceModel();
            $guardar->nombre1               = $this->nombre1;
            $guardar->nombre2               = $this->nombre2;
            $guardar->fk_empresa            = Auth::User()->fk_empresa;
            $guardar->fk_sisgestion         = $this->id_isGesion; 
            $guardar->save();
            $this->msjAlert='Se Guardo Correctamente! ';
            $this->cancelar();
           
    }

    public function cancelar(){
        $this->alert=1;
        $this->id_isGesion          = '';
        $this->nombre1              = '';
        $this->nombre2              = '';
        $this->opcion               = 'guardar';
        //return redirect('/alcance');
    }

    public function update()
    {
        $this->validate([
            'nombre1' => 'required|max:200',
            'nombre2' => 'required|max:200',
            
         ]);

        $actualizar= AlcanceModel::where('fk_sisgestion',$this->id_isGesion)->first(); 
       // dd($actualizar);
        $actualizar->nombre1            = $this->nombre1;    
        $actualizar->nombre2            = $this->nombre2;     

        $actualizar->update();       
        $this->msjAlert='Se Actualizó Correctamente! ';
        $this->cancelar();
    }

}
