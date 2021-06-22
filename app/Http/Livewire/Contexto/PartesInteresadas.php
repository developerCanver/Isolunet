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
    public $nombreInteresada='',$impacto='',$influencia='',$necesidad,$expectativa,$estrategia,$medicion,$id_partei_master;
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

        //  try {
        //     DB::beginTransaction();
           //dd($this->part_interesada);
            $guardar  = new ModelPartesInteresadas();
            $guardar->nombreInteresada     = $this->nombreInteresada;
            $guardar->impacto               = $this->impacto;
            $guardar->influencia            = $this->influencia;
            $guardar->fk_empresa            = Auth::User()->fk_empresa;; 
            $guardar->save();

        //     DB::commit();
        //     alert()->success('Se ha creado correctamente.', 'Creado!')->persistent('Cerrar');
        // } catch (Exception $e) {
        //     DB::rollback();
        //      alert()->error('Se ha Presentador un error.', 'Error!')->persistent('Cerrar');
        // }
       // return redirect('/partes_interesadas');
        //return redirect::to('partes_interesadas')->with('status','Se Creo Correctamente');
        
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

    public function cancelar(){
        $this->nombreInteresada     = '';
        $this->impacto              = '';
        $this->influencia           = '';
        $this->necesidad            = '';
        $this->expectativa          = '';
        $this->estrategia           = '';
        $this->medicion             = '';
        return redirect('/partes_interesadas');
    }

}
