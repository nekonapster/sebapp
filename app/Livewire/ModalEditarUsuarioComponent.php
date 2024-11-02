<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Attributes\On;
use Livewire\Component;

class ModalEditarUsuarioComponent extends Component
{
    public $listaUsuarios;
    public $name;
    public $email;
    public $password;
    public $role;
    
    #[On('editarUsuario')]
    public function loadUsers($_id)
    {
        $usuario = User::find($_id); //busco al usuario por el _id
        
        if ($usuario) {
            // Asigna los valores del usuario a las propiedades del componente
            $this->name = $usuario->name;
            $this->email = $usuario->email;
            $this->password = ''; // No se recomienda prellenar la contraseña
            $this->role = $usuario->role;
        }   
    }

    // public function editarUsuario($id) {
    //     $this->listaUsuarios = User::find($id);
    //     $this->update();
    // }

    // public function update()
    // {
    //     // $this->validate();

    //     $this->listaUsuarios->save();
    //     $this->listaUsuarios;

    //     // session()->flash('msg', 'Usuario actualizado correctamente.');
    // }

    public function render()
    {
        return view('livewire.modal-editar-usuario-component',
        [
        ]);
    }
}
