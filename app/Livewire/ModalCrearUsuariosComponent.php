<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;
use Illuminate\Validation\Rules;
use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\Events\Registered;

class ModalCrearUsuariosComponent extends Component
{

public $validate;

function register()
{
    $validated = $this->validate([
        'name' => ['required', 'string', 'max:255'],
        'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:' . User::class],
        'password' => ['required', 'string', 'confirmed', Rules\Password::defaults()],
        'role' => 'string',
    ]);

    // si el email aparecen en el array entonces se asigna el role a $validated['role']
    $validated['role'] = in_array($validated['email'], $this->adminEmails) ? 'admin' : 'guest';

    $validated['password'] = Hash::make($validated['password']);

    event(new Registered(($user = User::create($validated))));

}
    public function render()
    {
        return view('livewire.modal-crear-usuarios-component');
    }
}
