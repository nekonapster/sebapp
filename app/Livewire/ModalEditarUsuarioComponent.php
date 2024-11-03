<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Attributes\On;
use Livewire\Component;

class ModalEditarUsuarioComponent extends Component
{
    public $name;
    public $email;
    public $isAdmin;
    public $_id;

    #[On('editarUsuario')]
    public function loadUsers($_id)
    {
        $usuario = User::find($_id);

        if ($usuario) {
            $this->fill([
                'name' => $usuario->name,
                'email' => $usuario->email,
                'isAdmin' => $usuario->role === 'admin',
                '_id' => $_id,
            ]);
        }   
    }
    
    public function editarUsuario()
    {
        $usuario = User::find($this->_id);

        if ($usuario) {
            $usuario->update([
                'name' => strtolower($this->name),
                'email' => strtolower($this->email),
                'role' => $this->isAdmin ? 'admin' : 'guest',
            ]);

      
            return redirect(request()->header('Referer'));
        }
    }

    public function render()
    {
        return view('livewire.modal-editar-usuario-component');
    }
}

