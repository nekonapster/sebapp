<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Attributes\Validate;
use Livewire\Component;

class ModalCrearUsuariosComponent extends Component
{
    #[Validate('required|min:4|max:255')]
    public $name = '';

    #[Validate('required|email|unique:users,email')]
    public $email = '';

    #[Validate('required|min:8',  message: 'la pass es obligatoria')]
    public $password;
    public $role;
    public $emit;

    function crearUsuario(){

        $this->validate();

        User::create([
            'name' => strtolower($this->name),
            'email' => strtolower($this->email),
            'password' => strtolower($this->password),
            'role' => ($this->role == 1) ? "admin" : "guest"
        ]);


        $this->reset(['name', 'email', 'password']);
        
        session()->flash('msg', 'El usuario se ha creado correctamente');
        $this->dispatch('alerta');
    }
    
    public function cerrarModal()
    {
        // actualizo tabla cuando cierro el modal
        return $this->redirect('/users', navigate:true);
        // $this->dispatch('modalClosed');
    }

    public function render()
    {
               
        return view('livewire.modal-crear-usuarios-component');
    }
}
