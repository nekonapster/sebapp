<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;
use phpDocumentor\Reflection\Types\This;

class TablaUsuarioComponent extends Component
{
    public $listaUsuarios;
    public $search='';


    public function render()
    {
    
        $this->listaUsuarios = User::where('name', 'like', '%'.$this->search.'%')->get(); 
        
        $users = User::where('name', 'like', '%'.$this->search.'%')->get(); 

        return view('livewire.tabla-usuario-component',[
            'listaUsuarios'=>$this->listaUsuarios,
        ]
    );
    }
}
