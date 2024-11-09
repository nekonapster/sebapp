<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;

class TablaUsuarioComponent extends Component
{
    public $listaUsuarios;
    public $search = '';
    public $alertaAdmin;

    public function borrarUsuario($id)
    {
        $usuario = User::findOrFail($id);
        $usuario->delete();
        $this->listaUsuarios = User::all();
    }

    public function editar($_id)
    {
        $this->dispatch('editarUsuario', $_id);
    }


    public function render()
    {
        $this->listaUsuarios = User::where('name', 'like', '%' . $this->search . '%')->get();

        return view(
            'livewire.tabla-usuario-component',
            [
                'listaUsuarios' => $this->listaUsuarios,
                'alertaAdmin' => $this->alertaAdmin,
            ]
        );
    }
}
