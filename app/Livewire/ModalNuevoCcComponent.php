<?php

namespace App\Livewire;

use App\Models\CuentaContable;
use Livewire\Attributes\Validate;
use Livewire\Component;

class ModalNuevoCcComponent extends Component
{

    #[Validate('required', message: 'El numero CC es obligatorio')]
    #[Validate('numeric', message: 'Solo admite numeros')]
    #[Validate('digits:8', message: 'El numero CC debe tener exactamente 8 caracteres')]
    public $numeroCC;
    public $rubro = 'aranceles';
    #[Validate('required', message: 'El campo es obligatorio')]
    #[Validate('min:5', message: 'Minimo 5 caracteres')]
    public $descripcion;
    public $tipo = 'in';



    public function crearCC()
    {

        $this->validate();

        CuentaContable::create([
            // casteo el string a numero
            $this->numeroCC = (float) $this->numeroCC,
            'numeroCC' => $this->numeroCC,
            'rubro' => $this->rubro,
            'descripcion' => strtolower($this->descripcion),
            'tipo' => $this->tipo,
        ]);

        $this->reset(['numeroCC', 'rubro', 'descripcion', 'tipo']);

        session()->flash('msg_CC', 'Cuenta contable creada con exito!');
        $this->dispatch('msgCC_close');
        $this->dispatch('ccSelectRefresh');
    }



    public function render()
    {
        return view('livewire.modal-nuevo-cc-component');
    }
}
