<?php

namespace App\Livewire;

use App\Models\CuentaContable;
use Livewire\Attributes\Validate;
use Livewire\Component;

class ModalNuevoCcComponent extends Component
{

    #[Validate('required', message: 'El numero CC es obligatorio')]
    #[Validate('min:8', message: 'Minimo 8 caracteres')]
    #[Validate('numeric', message: 'Solo admite numeros')]
    public $numeroCC; 
    public $rubro = 'aranceles';
    #[Validate('required|min:5')]
    public $descripcion;
    public $tipo = 'in';



    public function crearCC(){

        $this->validate();

        CuentaContable::create([
            // casteo el string a numero
            $this->numeroCC = (float) $this->numeroCC,
            'numeroCC' => $this->numeroCC,
            'rubro' =>$this->rubro,
            'descripcion' =>strtolower($this->descripcion),
            'tipo' =>$this->tipo,
        ]);
        
        $this->reset(['numeroCC', 'rubro', 'descripcion', 'tipo' ]);

        session()->flash('msg_CC', 'Cuenta contable creada con exito!');
        $this->dispatch('msgCC_close'); 
        $this->dispatch('ccSelectRefresh');
    }
    


    public function render()
    {
        return view('livewire.modal-nuevo-cc-component');
    }
}
