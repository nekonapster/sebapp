<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;

class TablaUsuarioComponent extends Component
{
    public $listaUsuarios;
    public $search='';


    public function borrarUsuario($id){
        $this->listaUsuarios = User::findOrFail($id)->delete();
    }



    public function render()
    {
    
        $this->listaUsuarios = User::where('name', 'like', '%'.$this->search.'%')->get(); 
        
        return view('livewire.tabla-usuario-component',[
            'listaUsuarios'=>$this->listaUsuarios,
        ]
    );
    }
}
