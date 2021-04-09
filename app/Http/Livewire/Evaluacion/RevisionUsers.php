<?php

namespace App\Http\Livewire\Evaluacion;

use Livewire\Component;
use Illuminate\Support\Facades\DB;
use Redirect;
use Illuminate\Support\Facades\Auth;

class RevisionUsers extends Component
{
    public $updateMode = false;
    public $inputs = [];
    public $i = 1;
    public $post;
      
    public function mount($post)
    {
        $this->post = $post;
        //dd($this->post );
    }

    public function add($i)
    {
        $i = $i + 1;
        $this->i = $i;
        array_push($this->inputs ,$i);
    }

    public function remove($i)
    {
        unset($this->inputs[$i]);
    }
    public function render()
    {
    
            //dd($this->post );
            $consulta =  DB::table('tbl_eva_revision_users as ru')
            ->join('users as u','u.id','=','ru.fk_user')
            ->join('tbl_cargos as c','c.id_cargo','=','ru.fk_cargor')
            ->where('fk_revision', $this->post )
            ->get();
            //dd($consulta);
      
        $usuarios = DB::table('users as u')
                    ->join('tbl_empresa as e','u.fk_empresa','=','e.id_empresa')
                    ->where('e.id_empresa','=',''.Auth::User()->fk_empresa.'')
                    ->where('e.bool_estado','=','1')
                    ->get();
        $cargos = DB::table('tbl_areas as a')
                    ->join('tbl_empresa as em','a.fk_empresa','=','em.id_empresa')
                    ->join('tbl_cargos as e','a.id_area','=','e.fk_area')
                    ->where('em.fk_usuario','=',''.Auth::User()->id.'')
                    ->where('e.bool_estado','=','1')
                    ->where('em.bool_estado','=','1')
                    ->where('a.bool_estado','=','1')
                    ->orderby('em.razon_social','desc')
                    ->get();   

        return view('livewire.evaluacion.revision-users',[
            'usuarios'=>$usuarios,
            'cargos'=>$cargos,
            'consulta'=>$consulta,
            'post'=>$this->post,
                ]);
    }


}
