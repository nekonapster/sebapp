<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;
use Illuminate\Validation\Rules;
use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\Events\Registered;

class ModalCrearUsuariosComponent extends Component
{

    public $name;
    public $email;
    public $password;
    public $role;
    
    

function crearUsuario(){
    User::create([
        'name'=> $this->name,
        'email'=> $this->email,
        'password'=> $this->password,
        'role'=> ($this->role == 1) ? "admin" : "guest"
    ]);
}

    public function render()
    {
        return view('livewire.modal-crear-usuarios-component');
    }
}
