<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;

class TablaUsuarioComponent extends Component
{
    public $listaUsuarios;

    public function render()
    {
    
        $this->listaUsuarios = User::all();

        return view('livewire.tabla-usuario-component',[
            'listaUsuarios'=>$this->listaUsuarios 
        ]
    );
    }
}
