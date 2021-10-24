<?php

namespace App\Http\Livewire\Mejora;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class ActaAcciones extends Component
{

    public $updateMode = false;
    public $inputs = [1];
    public $i = 0;
    public $post;
      
    public function mount($post)
    {
        $this->post = $post;
        if ($post!=null) {
            $this->inputs = [];
        }
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

        $consulta =  DB::table('tbl_mejo_acta_acciones as ac')
                               // ->join('tbl_mejo_acta as ma','ma.id_acta','=','ac.fk_acta')
                                ->where('fk_acta', $this->post )
                              
                                ->get();
                                //dd($consulta);


        $usuarios = DB::table('users as u')
                                ->join('tbl_empresa as e','u.fk_empresa','=','e.id_empresa')
                                ->where('e.id_empresa',  $id_empresa)
                                ->where('e.bool_estado','=','1')
                                //->where('fk_rol',3)
                                ->get();

        return view('livewire.mejora.acta-acciones',[
            'post'=>$this->post,
            'usuarios'=>$usuarios,
            'consulta'=>$consulta,
        ]);
    }
}
