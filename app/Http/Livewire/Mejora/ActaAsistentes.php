<?php

namespace App\Http\Livewire\Mejora;

use App\Models\User;
use Livewire\Component;


use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class ActaAsistentes extends Component
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
        $usuario = User::findOrfail(Auth::User()->id);
        $id_empresa=$usuario->fk_empresa;


            //dd($this->post );
            $consulta =  DB::table('tbl_mejo_acta_asistente as aa')
            ->join('tbl_mejo_acta as a','a.id_acta','=','aa.fk_acta')
            ->where('fk_acta', $this->post )
            ->get();
            //dd($consulta);
      
        $usuarios = DB::table('users as u')
                    ->join('tbl_empresa as e','u.fk_empresa','=','e.id_empresa')
                    ->where('e.id_empresa',  $id_empresa)
                    ->where('e.bool_estado','=','1')
                    ->where('fk_rol',3)
                    ->get();
        $cargos = DB::table('tbl_areas as a')
                    ->join('tbl_empresa as em','a.fk_empresa','=','em.id_empresa')
                    ->join('tbl_cargos as e','a.id_area','=','e.fk_area')
                    ->where('em.id_empresa',  $id_empresa)
                    ->where('e.bool_estado','=','1')
                    ->where('em.bool_estado','=','1')
                    ->where('a.bool_estado','=','1')
                    ->orderby('em.razon_social','desc')
                    ->get();   

        return view('livewire.mejora.acta-asistentes',[
            'usuarios'=>$usuarios,
            'cargos'=>$cargos,
            'consulta'=>$consulta,
            'post'=>$this->post,
                ]);
    }
}
