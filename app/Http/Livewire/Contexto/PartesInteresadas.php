<?php

namespace App\Http\Livewire\Contexto;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Livewire\Component;

use App\Models\Partes_interesadas\Calificaciones;
use App\Models\Partes_interesadas\master as ModelPartesInteresadas;

class PartesInteresadas extends Component
{
    public  $opcion='guardar',$nombreInteresada='',$impacto='',$influencia='',$necesidad,$expectativa,$estrategia,$medicion,$id_partei_master;
    public function render()
    {
        $table_partes_interesadas = DB::table('tbl_partei_master as tpm')
                            ->join('tbl_empresa as te','tpm.fk_empresa','=','te.id_empresa')
                            ->where('fk_empresa','=',''. Auth::User()->fk_empresa.'')
                            ->get();

        $cont = 1;

        return view('livewire.contexto.partes-interesadas',[            
            'table_partes_interesadas'  => $table_partes_interesadas,
            'cont'                      => $cont,
        ]);
    }

    public function store()
    {
        $this->validate([
            'nombreInteresada' => 'required',
            'impacto' => 'required',
            'influencia' => 'required',
            
         ]);

            $guardar  = new ModelPartesInteresadas();
            $guardar->nombreInteresada     = $this->nombreInteresada;
            $guardar->impacto               = $this->impacto;
            $guardar->influencia            = $this->influencia;
            $guardar->fk_empresa            = Auth::User()->fk_empresa;; 
            $guardar->save();
            $this->cancelar();
    }

    
    public function edit($id){
     
        $edit= ModelPartesInteresadas::where('id_partei_master',$id)->first();
        $this->id_partei_master = $id;
        $this->nombreInteresada = $edit->nombreInteresada;
        $this->impacto          = $edit->impacto;
        $this->influencia       = $edit->influencia;
        $this->opcion           = 'editar';
    }
    
    public  function delete($id){
        ModelPartesInteresadas::destroy($id);            
        $this->cancelar();
    }

    public function editPartes($id_partei_master,$opcion)
    {
        
        $actualizar= ModelPartesInteresadas::find($id_partei_master); 
     
        if ($opcion=='necesidad') {
            $this->necesidad    = $actualizar->necesidad;      
        } else if($opcion=='expectativa') {
            $this->expectativa  = $actualizar->expectativa;    
        }else if($opcion=='estrategia') {
            $this->estrategia   = $actualizar->estrategia;     
        } else if($opcion=='medicion') {
            $this->medicion     = $actualizar->medicion;       
        }
        
        
    }

    public function update($id_partei_master,$opcion)
    {
        
        $actualizar= ModelPartesInteresadas::find($id_partei_master); 
        
        if ($opcion=='necesidad') {
            $actualizar->necesidad      = $this->necesidad;
        } else if($opcion=='expectativa') {
            $actualizar->expectativa    = $this->expectativa;
        }else if($opcion=='estrategia') {
            $actualizar->estrategia     = $this->estrategia;
        } else if($opcion=='medicion') {
            $actualizar->medicion       = $this->medicion;
        }
        
        $actualizar->update();
        $this->cancelar();
        
    }

    public function updatePartes()
    {
        $this->validate([
            'nombreInteresada' => 'required',
            'impacto' => 'required',
            'influencia' => 'required',
            
         ]);

        $actualizar= ModelPartesInteresadas::find($this->id_partei_master); 
        //dd($actualizar);

        $actualizar->nombreInteresada   = $this->nombreInteresada;    
        $actualizar->impacto            = $this->impacto;     
        $actualizar->influencia         = $this->influencia;   

        $actualizar->update();
        $this->cancelar();
        
    }
    

    public function cancelar(){
        $this->nombreInteresada     = '';
        $this->impacto              = '';
        $this->influencia           = '';
        $this->necesidad            = '';
        $this->expectativa          = '';
        $this->estrategia           = '';
        $this->medicion             = '';
        $this->opcion               = 'guardar';
        return redirect('/partes_interesadas');
    }

}
